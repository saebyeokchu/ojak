<?php
    if(isset($contents)){
        $pageIndex = $contents['pageIndex'];
        $item = $contents['item'][0];
    }else{
        return;
    }

    //check ownership
    $owned_by_user = false;

    if(isset( $_COOKIE['user_id'])){
        if($_COOKIE['user_id'] == $item->user_id){
            $owned_by_user = true;
        }
    }

    //make share url
    $shareUrl =  "https://ojak.co.kr".$_SERVER["REQUEST_URI"];
    $returnUrl = "/gallery?pageIndex=".$pageIndex;

?>

<div class="for-lg">
    <div class="d-flex justify-content-center   " style="margin-top:100px; margin-bottom:100px;">
        <div class="d-flex flex-column px-5 w-100" style="max-width: 1440px;" >
            
            <!-- breadcrumb -->
            <?= view('/component/breadcrumb',[
                'breadsInput' => [ ['name' => '작품', 'url' => $returnUrl ] ]
            ]) ?>


            <!-- content -->
            <div class="grid mt-100" >
                <div class="d-flex flex-row justify-content-center"  style="min-height:700px;">
                    <div class="  d-flex flex-column"> 
                        <img id="galleryDetailMainImg" src="/img/user/<?=$item->img_url?>" class="object-fit-cover" width="650" height="680" />
                        <div class="row mt-3"> 
                            <div class="col-3 hovereffect" onclick="changeGalleryDetailMainImg('<?=$item->img_url?>')">
                                <img src="/img/user/<?=$item->img_url?>" class="object-fit-cover cursor-pointer " width="145" height="180"/>
                                <div class="overlay cursor-pointer"></div>
                            </div>
                            <div class="col-3 hovereffect" onclick="changeGalleryDetailMainImg('<?=$item->img_url2?>')">
                                <?php if($item->img_url2){ ?>
                                    <img src="/img/user/<?=$item->img_url2?>" class="object-fit-cover cursor-pointer" width="145" height="180"/>
                                    <div class="overlay cursor-pointer"></div>
                                <?php } ?>
                            </div>
                            <div class="col-3 hovereffect" onclick="changeGalleryDetailMainImg('<?=$item->img_url3?>')">
                                <?php if($item->img_url3){ ?>
                                    <img src="/img/user/<?=$item->img_url3?>" class="object-fit-cover cursor-pointer" width="145" height="180"/>
                                    <div class="overlay cursor-pointer"></div>
                                <?php } ?>
                            </div>
                            <div class="col-3 hovereffect" onclick="changeGalleryDetailMainImg('<?=$item->img_url4?>')">
                                <?php if($item->img_url4){ ?>
                                    <img src="/img/user/<?=$item->img_url4?>" class="object-fit-cover cursor-pointer" width="145" height="180"/>
                                    <div class="overlay cursor-pointer"></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column text-center  " style="width: 650px;height: 680px;">
                        <p style="font-size:30px;" class="fw-bold"><?=$item->title?><br /><span style="color:#8C8C8C;font-size:18px;"><?=$item->sub_title?></span></p>

                        <div class="for-lg" style="margin-top:70px;font-size: 20px; line-height: 35px;margin-bottom:20px;height:380px;">
                            <?=$item->content?>
                        </div>
                        <div class="for-sm" style="margin-top:30px;font-size: 20px; line-height: 35px;margin-bottom:20px;height:380px;">
                            <?=$item->content?>
                        </div>

                        <?php if(isset($item->buy_link) && $item->buy_link != ''){ ?>
                            <div class="d-flex justify-content-center mt-20" onclick="window.open('<?=$item->buy_link?>','_blank');">
                                <span  class="fw-bold px-4 py-2 cursor-pointer bs-button"> 작품 구매하러 가기 </span>
                            </div>
                        <?php } ?>
                    </div>

                    <div class=" "> 
                        <div class="d-flex flex-row gap-3 mt-2">
                            <?php if($owned_by_user) { ?>
                            <p class="cursor-pointer" onclick="onDeleteBtnClick(<?= $item -> id ?>)">
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
                            <p class="cursor-pointer" onclick="openEditModal(<?= $item -> id?>)">
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
                            <p class="cursor-pointer" onclick="onShareBtnClick()">
                                <svg width="26" height="28" viewBox="0 0 26 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.6667 19.7912C20.5689 19.7912 19.5867 20.2129 18.8356 20.8735L8.53667 15.0402C8.60889 14.7169 8.66667 14.3936 8.66667 14.0562C8.66667 13.7189 8.60889 13.3956 8.53667 13.0723L18.72 7.29518C19.5 7.99799 20.5256 8.43373 21.6667 8.43373C24.0644 8.43373 26 6.5502 26 4.21687C26 1.88353 24.0644 0 21.6667 0C19.2689 0 17.3333 1.88353 17.3333 4.21687C17.3333 4.55422 17.3911 4.87751 17.4633 5.2008L7.28 10.9779C6.5 10.2751 5.47444 9.83936 4.33333 9.83936C1.93556 9.83936 0 11.7229 0 14.0562C0 16.3896 1.93556 18.2731 4.33333 18.2731C5.47444 18.2731 6.5 17.8373 7.28 17.1345L17.5644 22.9819C17.4922 23.2771 17.4489 23.5863 17.4489 23.8956C17.4489 26.1586 19.3411 28 21.6667 28C23.9922 28 25.8844 26.1586 25.8844 23.8956C25.8844 21.6325 23.9922 19.7912 21.6667 19.7912Z" fill="#17171B"/>
                                </svg>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- <div class=" for-lg">
                    <div class="row row-cols-1 row-cols-md-2  mt-3">
                        <div class="col-sm-6">
                            <div class="d-flex justify-content-between gap-2">
                                <div class="w-100" style="background-color: gray;min-height:100px;">
                                </div>
                                <div class="w-100"  style="background-color: gray;min-height:100px;">
                                </div>
                                <div class="w-100"  style="background-color: gray;min-height:100px;">
                                </div>
                                <div class="w-100"  style="background-color: gray;min-height:100px;">
                                </div>
                                <div class="w-100"  style="background-color: gray;min-height:100px;">
                                </div>
                                <div class="w-100"  style="background-color: gray;min-height:100px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="d-flex justify-content-start w-100 mt-70 align-middle cursor-pointer" onclick="location.href='<?=$returnUrl?>'">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.98 26L34.5 26L34.5 22L15.98 22L15.98 16L8 24L15.98 32L15.98 26Z" fill="#17171B"/>
                    </svg>
                    <p class="fw-bold " style="margin-top:12px;">목록으로</p>
                </div>

            </div>

        </div>
    </div>
</div>

<div class="for-sm">
    <div class="d-flex justify-content-center   " style="margin-top:100px; margin-bottom:100px;">
        <div class="d-flex flex-column px-5 w-100"  >
            
            <!-- breadcrumb -->
            <?= view('/component/breadcrumb',[
                'breadsInput' => [ ['name' => '작품', 'url' => $returnUrl ] ]
            ]) ?>


            <!-- content -->
            <div class="grid mt-50" >
                <div class="d-flex flex-column justify-content-center"  >
                <div class=" "> 
                        <div class="d-flex justify-content-end gap-3 ">
                            <?php if($owned_by_user) { ?>
                            <p class="cursor-pointer" onclick="onDeleteBtnClick(<?= $item -> id ?>)">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="18"
                                    height="20"
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
                            <p class="cursor-pointer" onclick="openEditModal(<?= $item -> id?>)">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="18"
                                    height="20"
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
                            <p class="cursor-pointer" onclick="onShareBtnClick()">
                                <svg width="18" height="20" viewBox="0 0 26 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.6667 19.7912C20.5689 19.7912 19.5867 20.2129 18.8356 20.8735L8.53667 15.0402C8.60889 14.7169 8.66667 14.3936 8.66667 14.0562C8.66667 13.7189 8.60889 13.3956 8.53667 13.0723L18.72 7.29518C19.5 7.99799 20.5256 8.43373 21.6667 8.43373C24.0644 8.43373 26 6.5502 26 4.21687C26 1.88353 24.0644 0 21.6667 0C19.2689 0 17.3333 1.88353 17.3333 4.21687C17.3333 4.55422 17.3911 4.87751 17.4633 5.2008L7.28 10.9779C6.5 10.2751 5.47444 9.83936 4.33333 9.83936C1.93556 9.83936 0 11.7229 0 14.0562C0 16.3896 1.93556 18.2731 4.33333 18.2731C5.47444 18.2731 6.5 17.8373 7.28 17.1345L17.5644 22.9819C17.4922 23.2771 17.4489 23.5863 17.4489 23.8956C17.4489 26.1586 19.3411 28 21.6667 28C23.9922 28 25.8844 26.1586 25.8844 23.8956C25.8844 21.6325 23.9922 19.7912 21.6667 19.7912Z" fill="#17171B"/>
                                </svg>
                            </p>
                        </div>
                    </div>

                    <div class="owl-carousel detail-sm-carousel overflow-hidden bg-dark">
                        <div class="item">
                            <img src="/img/user/<?=$item->img_url?>" alt="display-mobile-1" width="300" height="350" style="object-fit: cover; "/>
                        </div>
                        <?php if($item->img_url2) { ?>
                            <div class="item">
                                <img src="/img/user/<?=$item->img_url2?>" alt="display-mobile-2" width="300" height="350"  style="object-fit: cover; " />
                            </div>
                        <?php }?>
                        <?php if($item->img_url3) { ?>
                            <div class="item">
                                <img src="/img/user/<?=$item->img_url3?>" alt="display-mobile-3"  style="object-fit: cover; " />
                            </div>
                        <?php }?>
                        <?php if($item->img_url4) { ?>
                            <div class="item">
                                <img src="/img/user/<?=$item->img_url4?>" alt="display-mobile-4"  style="object-fit: cover; " />
                            </div>
                        <?php }?>
                        
                    </div>
                  

                    <div class="d-flex flex-column text-center mt-3 " >
                        <p style="font-size:24px;" class="fw-bold"><?=$item->title?><br /><span style="color:#8C8C8C;font-size:16px;"><?=$item->sub_title?></span></p>

                        <div style="margin-top:30px;font-size: 16px; line-height: 35px;margin-bottom:20px;height:220px;">
                            <?=$item->content?>
                        </div>

                        <?php if(isset($item->buy_link) && $item->buy_link != ''){ ?>
                            <div class="d-flex justify-content-center mt-20" onclick="window.open('<?=$item->buy_link?>','_blank');">
                                <span  class="fw-bold px-4 py-2 cursor-pointer bs-button-sm"> 작품 구매하러 가기 </span>
                            </div>
                        <?php } ?>
                    </div>

                    
                </div>

                <!-- <div class=" for-lg">
                    <div class="row row-cols-1 row-cols-md-2  mt-3">
                        <div class="col-sm-6">
                            <div class="d-flex justify-content-between gap-2">
                                <div class="w-100" style="background-color: gray;min-height:100px;">
                                </div>
                                <div class="w-100"  style="background-color: gray;min-height:100px;">
                                </div>
                                <div class="w-100"  style="background-color: gray;min-height:100px;">
                                </div>
                                <div class="w-100"  style="background-color: gray;min-height:100px;">
                                </div>
                                <div class="w-100"  style="background-color: gray;min-height:100px;">
                                </div>
                                <div class="w-100"  style="background-color: gray;min-height:100px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="d-flex justify-content-start w-100 mt-70 align-middle cursor-pointer" onclick="location.href='<?=$returnUrl?>'">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.98 26L34.5 26L34.5 22L15.98 22L15.98 16L8 24L15.98 32L15.98 26Z" fill="#17171B"/>
                    </svg>
                    <p class="fw-bold " style="margin-top:12px;">목록으로</p>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
    window.addEventListener('load', () => {
        document.body.classList.add('loaded');
    });
    
    function onDeleteBtnClick(targetId){
        if(window.confirm("게시글을 영구히 삭제하시겠습니까?")){
            turnOnLoadingScreen();

            try {

                var postData = new FormData();
                postData.append('id',targetId);

                axios.post('/api/deleteGallery', postData).then(function(response){
                    console.log("success:", response);
                    window.alert(response.data.message);
                    location.href='<?=$returnUrl?>';
                    return;
                }).catch(function(error){
                    console.log("error:", error);
                });
                
            } catch (error) {
                console.error('Error deleting data:', error);
                window.alert("게시물을 삭제할 수 없습니다. 잠시 후 다시 시도하여 주세요.")
            }

            turnOffLoadingScreen();
        }
    }

    function onShareBtnClick(){
        navigator.clipboard.writeText('<?=$shareUrl?>');
        window.alert("링크 복사가 완료되었습니다.");
    }

    //changeGalleryDetailMainImg galleryDetailMainImg
    function changeGalleryDetailMainImg(targetImgUrl){
        if(targetImgUrl){
            document.getElementById('galleryDetailMainImg').setAttribute("src", '/img/user/'+targetImgUrl);
        }
    }

    $(document).ready(function () {
    $(".detail-sm-carousel").owlCarousel({
      loop: true, // Enable looping
      margin: 0, // Margin between items
      animateOut: 'fadeOut',
      autoplay:true,
      autoplayTimeout:8000,
      autoplayHoverPause:false,
      smartSpeed: 2000,          // Smooth transition speed (1 second)
      dots: true,
      responsive: {
        0: {
          items: 1 // 1 item for small screens
        },
        600: {
          items: 1 // 2 items for medium screens
        },
        1000: {
          items: 1 // 3 items for large screens
        }
      }
    });
  });

</script>