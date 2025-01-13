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
        if($_COOKIE['user_id'] == $post['id']){
            $owned_by_user = true;
        }
    }

    $shareUrl =  "https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
    $returnUrl = "/community/list/2?pageIndex=".$pageIndex;
?>

<div class="d-flex flex-column ms-5 me-5" style="margin-top:200px; margin-bottom:100px;">

    <!-- breadcrumb -->
    <nav class="text-black d-flex flex-row gap-3" >
        <div>
            <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 0L0 4V12H3.125V7.33333H6.875V12H10V4L5 0Z" fill="#17171B"/>
            </svg>
        </div>
        <div>
            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.58525 0.237468L7.79724 5.55673C7.87097 5.62005 7.92307 5.68865 7.95355 5.76253C7.98452 5.83641 8 5.91557 8 6C8 6.08443 7.98452 6.16359 7.95355 6.23747C7.92307 6.31135 7.87097 6.37995 7.79724 6.44327L1.58525 11.7784C1.41321 11.9261 1.19816 12 0.940091 12C0.682026 12 0.460828 11.9208 0.276496 11.7625C0.0921646 11.6042 -9.02928e-07 11.4195 -8.84474e-07 11.2084C-8.66021e-07 10.9974 0.0921646 10.8127 0.276497 10.6544L5.69585 6L0.276497 1.34565C0.104455 1.19789 0.0184326 1.01594 0.0184326 0.79979C0.0184327 0.58322 0.110599 0.395779 0.294931 0.237468C0.479262 0.0791562 0.694316 3.14991e-07 0.940092 3.36477e-07C1.18587 3.57964e-07 1.40092 0.0791563 1.58525 0.237468Z" fill="#17171B"/>
            </svg>
        </div>
        <div class="fw-bold" style="padding-top:1px;">
            커뮤니티
        </div>
        <div>
            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.58525 0.237468L7.79724 5.55673C7.87097 5.62005 7.92307 5.68865 7.95355 5.76253C7.98452 5.83641 8 5.91557 8 6C8 6.08443 7.98452 6.16359 7.95355 6.23747C7.92307 6.31135 7.87097 6.37995 7.79724 6.44327L1.58525 11.7784C1.41321 11.9261 1.19816 12 0.940091 12C0.682026 12 0.460828 11.9208 0.276496 11.7625C0.0921646 11.6042 -9.02928e-07 11.4195 -8.84474e-07 11.2084C-8.66021e-07 10.9974 0.0921646 10.8127 0.276497 10.6544L5.69585 6L0.276497 1.34565C0.104455 1.19789 0.0184326 1.01594 0.0184326 0.79979C0.0184327 0.58322 0.110599 0.395779 0.294931 0.237468C0.479262 0.0791562 0.694316 3.14991e-07 0.940092 3.36477e-07C1.18587 3.57964e-07 1.40092 0.0791563 1.58525 0.237468Z" fill="#17171B"/>
            </svg>
        </div>
        <div class="fw-bold" style="padding-top:1px;">
            이벤트
        </div>
    </nav>

     <!-- title and content -->
     <div class="grid gap-4 mt-150">
        <div class="row">
            <div class="col-sm-6">
                <img src="/img/user/<?=$post['img_url']?>" class="img-fluid cursor-pointer w-100" />
            </div>
            <div class="d-flex flex-column col-sm-6">
                <div>
                    <span class="d-flex justify-content-between">
                        <p style="font-size:30px;" class="fw-bold"><?= $post['title'] ?></p>
                        <div class="d-flex flex-row gap-3 mt-2">
                        <?php if($owned_by_user) { ?>
                            <p class="cursor-pointer" onclick="onEventDeleteBtnClick(<?= $post['id'] ?>)">
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
                            <p class="cursor-pointer" id="openEditEventModalBtn">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="26"
                                    height="28"
                                    viewBox="0 0 26 28"
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
                    </span>
                </div>

                <div style="margin-top:70px;font-size: 20px; line-height: 35px;">
                    <?= $post['content'] ?>
                </div>
            </div>
        </div>
    </div>

    <!-- return text -->
    <div class="d-flex justify-content-start w-100 align-middle cursor-pointer mt-150" onclick="location.href='/community/list/2?pageIndex=<?=$pageIndex?>'">
        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.98 26L34.5 26L34.5 22L15.98 22L15.98 16L8 24L15.98 32L15.98 26Z" fill="#17171B"/>
        </svg>
        <p class="fw-bold " style="margin-top:12px;">목록으로</p>
    </div>
</div>

<?= view('/community/modal/eventModal', [ 'item' => $post ])?>

<script>
    function onEventDeleteBtnClick(targetId){
        if(window.confirm("이벤트를 영구히 삭제하시겠습니까?")){
            turnOnLoadingScreen();

            try {
                var postData = new FormData();
                postData.append('id',targetId);

                axios.post('/api/deletePost', postData).then(function(response){
                    console.log("success:", response);
                    window.alert(response.data.message)
                    location.href="<?=$returnUrl?>";
                    return;
                }).catch(function(error){
                    console.log("error:", error);
                });
                
            } catch (error) {
                console.error('Error deleting data:', error);
                window.alert("이벤트를 삭제할 수 없습니다. 잠시 후 다시 시도하여 주세요.")
            }

            turnOffLoadingScreen();
        }
    }

    function onShareEventBtnClick(){
        navigator.clipboard.writeText('<?=$shareUrl?>');
        window.alert("링크 복사가 완료되었습니다.");
    }
</script>