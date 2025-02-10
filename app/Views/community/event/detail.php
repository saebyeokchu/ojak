<?php
    // $post = $contents["post"];
    // $pageIndex = $contents["pageIndex"];
    // $gubunNum = $contents["gubunNum"];

    $userId=0;
    if(isset($_COOKIE['user_id'])){
        $userId = $_COOKIE['user_id'];
    }

    //check ownership
    $owned_by_user = false;

    if(isset( $_COOKIE['user_id'])){
        if($_COOKIE['user_id'] == $post['user_id']){
            $owned_by_user = true;
        }
    }

    $shareUrl =  "https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
    $returnUrl = "/community/list/2?pageIndex=".$pageIndex;
?>

<div class="for-lg">
    <div class="d-flex justify-content-center   " style="padding-top:100px; padding-bottom:100px;">
        <div class="d-flex flex-column px-5 w-100" style="max-width: 1440px;" >
            <!-- breadcrumb -->
            <?= view('/component/breadcrumb',[
                'breadsInput' => [ 
                    ['name' => '커뮤니티', 'url' => '/community/notice?pageIndex=1'], 
                    ['name' => '이벤트', 'url' => '/community/event?pageIndex=1'] 
                ] ]) ?>

            <!-- title and content -->
            <div class="grid gap-4 mt-70">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="/img/user/<?=$post['img_url']?>" class="img-fluid cursor-pointer w-100" />
                    </div>

                    <div class="d-flex flex-row col-sm-6">
                        <div class="d-flex flex-column text-center  " style="width: 650px;height: 680px;">
                            <p style="font-size:30px;" class="fw-bold"><?= $post['title'] ?></p> 
                            <div style="margin-top:30px;font-size: 20px; line-height: 35px;margin-bottom:20px;height:380px;">
                                <?= $post['content'] ?>
                            </div>
                        </div>
                       

                        <div class="d-flex flex-row gap-3 mt-2">
                            <?php if($owned_by_user) { ?>
                                <p class="cursor-pointer" onclick="onEventDeleteBtnClick(<?= $post['id'] ?>,<?= $pageIndex ?>)">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="26"
                                        height="28"
                                        viewBox="0 0 26 28"
                                    >
                                        <!-- Group with rotation -->
                                        <!-- Trash can base -->
                                        <rect x="7" y="4" width="20" height="20" rx="1" fill="black" />
                                        <!-- Trash can lid -->
                                        <rect x="6" y="6" width="24" height="2" fill="black" />
                                        <!-- Handles -->
                                        <rect x="12" y="0" width="8" height="8" rx="1" fill="black" />
                                    </svg>
                                </p>
                                <p class="cursor-pointer" >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="26"
                                        height="28"
                                        viewBox="0 0 26 28"
                                        data-bs-toggle="modal" data-bs-target="#addEventModal"
                                    >
                                        <g transform="rotate(30, 13, 14)"> 
                                            <!-- Pencil body -->
                                            <rect x="6" y="2" width="14" height="20" rx="2" fill="black" translate="" />
                                            <!-- Pencil tip -->
                                            <polygon points="8,22 18,22 13,28" fill="black" />
                                            <!-- Eraser -->
                                            <rect x="6" y="0" width="14" height="4" fill="black" />
                                        </g>
                                    </svg>
                                </p>
                            <?php } ?>
                            <p class="cursor-pointer" onclick="onShareEventBtnClick()">
                                <svg width="26" height="28" viewBox="0 0 26 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.6667 19.7912C20.5689 19.7912 19.5867 20.2129 18.8356 20.8735L8.53667 15.0402C8.60889 14.7169 8.66667 14.3936 8.66667 14.0562C8.66667 13.7189 8.60889 13.3956 8.53667 13.0723L18.72 7.29518C19.5 7.99799 20.5256 8.43373 21.6667 8.43373C24.0644 8.43373 26 6.5502 26 4.21687C26 1.88353 24.0644 0 21.6667 0C19.2689 0 17.3333 1.88353 17.3333 4.21687C17.3333 4.55422 17.3911 4.87751 17.4633 5.2008L7.28 10.9779C6.5 10.2751 5.47444 9.83936 4.33333 9.83936C1.93556 9.83936 0 11.7229 0 14.0562C0 16.3896 1.93556 18.2731 4.33333 18.2731C5.47444 18.2731 6.5 17.8373 7.28 17.1345L17.5644 22.9819C17.4922 23.2771 17.4489 23.5863 17.4489 23.8956C17.4489 26.1586 19.3411 28 21.6667 28C23.9922 28 25.8844 26.1586 25.8844 23.8956C25.8844 21.6325 23.9922 19.7912 21.6667 19.7912Z" fill="#17171B"/>
                                </svg>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            <!-- return text -->
            <div id="backToEventList" class="d-flex justify-content-start w-100 align-middle cursor-pointer mt-150" >
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.98 26L34.5 26L34.5 22L15.98 22L15.98 16L8 24L15.98 32L15.98 26Z" fill="#17171B"/>
                </svg>
                <p class="fw-bold " style="margin-top:12px;">목록으로</p>
            </div>
        </div>
    </div>
</div>

<div class="for-sm">
    <div class="d-flex justify-content-center   " style="margin-top:100px; margin-bottom:100px;">
        <div class="d-flex flex-column px-5 w-100"  >
            <!-- breadcrumb -->
            <?= view('/component/breadcrumb',[
                'breadsInput' => [ 
                    ['name' => '커뮤니티', 'url' => '/community/notice?pageIndex=1'], 
                    ['name' => '이벤트', 'url' => '/community/event?pageIndex=1'] 
                ] ]) ?>


            <!-- content -->
            <div class="grid mt-50" >
                <div class="d-flex flex-column justify-content-center"  >
                <div class=" "> 
                        <div class="d-flex justify-content-end gap-3 ">
                            <?php if($owned_by_user) { ?>
                                <p class="cursor-pointer" onclick="onEventDeleteBtnClick(<?= $post['id'] ?>,<?= $pageIndex ?>)">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="26"
                                        height="28"
                                        viewBox="0 0 26 28"
                                    >
                                        <!-- Group with rotation -->
                                        <!-- Trash can base -->
                                        <rect x="7" y="4" width="20" height="20" rx="1" fill="black" />
                                        <!-- Trash can lid -->
                                        <rect x="6" y="6" width="24" height="2" fill="black" />
                                        <!-- Handles -->
                                        <rect x="12" y="0" width="8" height="8" rx="1" fill="black" />
                                    </svg>
                                </p>
                                <p class="cursor-pointer" >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="26"
                                        height="28"
                                        viewBox="0 0 26 28"
                                        data-bs-toggle="modal" data-bs-target="#addEventModal"
                                    >
                                        <g transform="rotate(30, 13, 14)"> 
                                            <!-- Pencil body -->
                                            <rect x="6" y="2" width="14" height="20" rx="2" fill="black" translate="" />
                                            <!-- Pencil tip -->
                                            <polygon points="8,22 18,22 13,28" fill="black" />
                                            <!-- Eraser -->
                                            <rect x="6" y="0" width="14" height="4" fill="black" />
                                        </g>
                                    </svg>
                                </p>
                            <?php } ?>
                            <p class="cursor-pointer" onclick="onShareEventBtnClick()">
                                <svg width="26" height="28" viewBox="0 0 26 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.6667 19.7912C20.5689 19.7912 19.5867 20.2129 18.8356 20.8735L8.53667 15.0402C8.60889 14.7169 8.66667 14.3936 8.66667 14.0562C8.66667 13.7189 8.60889 13.3956 8.53667 13.0723L18.72 7.29518C19.5 7.99799 20.5256 8.43373 21.6667 8.43373C24.0644 8.43373 26 6.5502 26 4.21687C26 1.88353 24.0644 0 21.6667 0C19.2689 0 17.3333 1.88353 17.3333 4.21687C17.3333 4.55422 17.3911 4.87751 17.4633 5.2008L7.28 10.9779C6.5 10.2751 5.47444 9.83936 4.33333 9.83936C1.93556 9.83936 0 11.7229 0 14.0562C0 16.3896 1.93556 18.2731 4.33333 18.2731C5.47444 18.2731 6.5 17.8373 7.28 17.1345L17.5644 22.9819C17.4922 23.2771 17.4489 23.5863 17.4489 23.8956C17.4489 26.1586 19.3411 28 21.6667 28C23.9922 28 25.8844 26.1586 25.8844 23.8956C25.8844 21.6325 23.9922 19.7912 21.6667 19.7912Z" fill="#17171B"/>
                                </svg>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex flex-column text-center mt-3 " >
                    <img src="/img/user/<?=$post['img_url']?>" alt="display-mobile-1" class="img-fluid" style="object-fit: cover; "/>
                    </div>


                    <div class="d-flex flex-column text-center mt-3 " >
                        <p style="font-size:24px;" class="fw-bold"><?= $post['title'] ?></p>

                        <div style="margin-top:30px;font-size: 16px; line-height: 35px;margin-bottom:20px;height:220px;">
                            <?= $post['content'] ?>
                        </div>

                    </div>
                    
                </div>


                 <!-- return text -->
                <div id="backToEventList2" class="d-flex justify-content-start w-100 align-middle cursor-pointer mt-150" >
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.98 26L34.5 26L34.5 22L15.98 22L15.98 16L8 24L15.98 32L15.98 26Z" fill="#17171B"/>
                    </svg>
                    <p class="fw-bold " style="margin-top:12px;">목록으로</p>
                </div>
            </div>

        </div>
    </div>
</div>

<?= view('/community/modal/eventModal', [ 'item' => $post ])?>

<script>
    window.addEventListener('load', () => {
        document.getElementById('backToEventList').onclick = () => location.href = getUrl(0,0,<?=$pageIndex?>).communityEvent;
        document.getElementById('backToEventList2').onclick = () => location.href = getUrl(0,0,<?=$pageIndex?>).communityEvent;
    });

    function onShareEventBtnClick(){
        navigator.clipboard.writeText('<?=$shareUrl?>');
        window.alert("링크 복사가 완료되었습니다.");
    }
</script>