<?php
    $totalCount = 0;
    $itemPerPage = 8;
    $paginationRange = 5;
    $startPage = 1;
    $endPage = 1;

    if(isset($contents)){
        $pageIndex = $contents['pageIndex'];
        $items = $contents['items'];
        $totalCount = $contents['totalCount'];
    }

    $userId = 0;
    if(isset($_COOKIE['user_id'])){
        $userId = $_COOKIE['user_id'];
    }

    $galleryCounter = 0;
    
    //count page index
    //8 gallery items per page
    if(isset($items)){
        $totalPageIndex = floor($totalCount / $itemPerPage) ;

        if($totalCount % $itemPerPage > 0){
            $totalPageIndex ++;
        }

        //현재 시작페이지랑 종료 페이지 계산
        $startPage = floor($pageIndex / 5) * 5 + 1;
        $endPage = $startPage + 4;

        //종료페이지가 실재갯수를 넘어가는지 체크
        if($endPage > $totalPageIndex){
            $endPage = $totalPageIndex;
        }
    }else{
        $items = [];
    }

?>

<div class="d-flex justify-content-center   w-full" style="margin-top:100px; margin-bottom:100px;">

    <div class="d-flex flex-column mx-5   " style="max-width:1440px;">
    
        <!-- breadcrumb -->
        <?= view('/component/breadcrumb',[
            'breadsInput' => [ 
                ['name' => '갤러리', 'url' => '/gallery?pageIndex=1'], 
            ] ]) ?>


        <!-- content -->
        <div class="grid " id="galleryOuterWrapper" >
            <!-- <div class="d-flex justify-content-center">
                <p class="fw-bold" style="font-size: 32px;">갤러리</p>
            </div> -->
            
            <div id="galleryWrapper">
                <!-- user gallery control class="logged-in"-->
                <div class="d-flex justify-content-end text-end logged-in" onclick="openEditModal()">
                    <!-- <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="plus-icon cursor-pointer"
                        viewBox="0 0 24 24"
                        width=24 height=24
                        data-bs-toggle="modal" data-bs-target="#addGalleryModal"
                    >
                        <circle cx="12" cy="12" r="11" stroke="black" stroke-width="2" fill="black" />
                        <line x1="12" y1="6" x2="12" y2="18" stroke="white" stroke-width="2" />
                        <line x1="6" y1="12" x2="18" y2="12" stroke="white" stroke-width="2" />
                    </svg> -->
                    <span class="bs-button cursor-pointer"> 작품 추가하기</span>
                </div>

                
                <!-- 한줄 설명은 20자 -->
                <?php if(count($items) > 0){
                    foreach($items as $item){ ?>
                    <?php if($galleryCounter % 4 == 0) { ?> <div class='row row-cols-1 row-cols-md-4 pt-4 <?=$galleryCounter > 3 ?? 'mt-70' ?>'> <?php } ?>
                        <div class="col"> 
                            <a href="gallery/<?=$item["id"]?>?pageIndex=<?=$pageIndex?>">
                                <img src="/img/user/<?=$item["img_url"]?>" class="w-100 hover-saturate cursor-pointer" style="height: 240px;object-fit:cover;" />
                            </a>
                            <div style="font-size: 22px;font-weight:700" class="mt-2">
                                <?=$item["title"]?>
                            </div>
                            <div style="font-size: 17px;" class="mt-2">
                            <?=$item["sub_title"]?>
                            </div>
                        </div>
                    <?php if($galleryCounter % 4 == 3 || $galleryCounter + 1 == count($items)) { ?> </div> <?php } ?>
                <?php $galleryCounter = $galleryCounter+1; } } else { ?>
                    <div style="font-size: 32px;min-height:200px;" class="d-flex justify-content-center">
                        현재 등록된 작품이 없습니다.
                    </div>    
                <?php } ?>

                <!-- pagination -->
                <?php if(count($items) > 0){ ?>
                <div class="d-flex flex-row justify-content-center gap-4" style="margin-top:43px;">
                    <!-- left arrow -->
                    <div>
                        <?php if($pageIndex == $startPage){ ?>
                            <svg  width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                <path d="M8.01844 15.6834L0.253458 8.59103C0.161292 8.50659 0.0961612 8.41513 0.058066 8.31662C0.0193563 8.21812 1.41845e-06 8.11258 1.39876e-06 8C1.37908e-06 7.88742 0.0193562 7.78188 0.0580659 7.68338C0.0961611 7.58487 0.161292 7.4934 0.253458 7.40897L8.01843 0.295513C8.23349 0.0985033 8.50231 -1.48659e-06 8.82489 -1.54299e-06C9.14747 -1.59939e-06 9.42396 0.105539 9.65438 0.316621C9.88479 0.527703 10 0.773965 10 1.05541C10 1.33685 9.88479 1.58311 9.65438 1.79419L2.88019 8L9.65438 14.2058C9.86943 14.4028 9.97696 14.6454 9.97696 14.9336C9.97696 15.2224 9.86176 15.4723 9.63134 15.6834C9.40093 15.8945 9.13211 16 8.82489 16C8.51767 16 8.24885 15.8945 8.01844 15.6834Z" fill="#17171B"/>
                            </svg>
                        <?php }else{ ?>
                            <svg onclick="location.href='/gallery?pageIndex=<?=$pageIndex - 1?>'" width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                                <path d="M8.01844 15.6834L0.253458 8.59103C0.161292 8.50659 0.0961612 8.41513 0.058066 8.31662C0.0193563 8.21812 1.41845e-06 8.11258 1.39876e-06 8C1.37908e-06 7.88742 0.0193562 7.78188 0.0580659 7.68338C0.0961611 7.58487 0.161292 7.4934 0.253458 7.40897L8.01843 0.295513C8.23349 0.0985033 8.50231 -1.48659e-06 8.82489 -1.54299e-06C9.14747 -1.59939e-06 9.42396 0.105539 9.65438 0.316621C9.88479 0.527703 10 0.773965 10 1.05541C10 1.33685 9.88479 1.58311 9.65438 1.79419L2.88019 8L9.65438 14.2058C9.86943 14.4028 9.97696 14.6454 9.97696 14.9336C9.97696 15.2224 9.86176 15.4723 9.63134 15.6834C9.40093 15.8945 9.13211 16 8.82489 16C8.51767 16 8.24885 15.8945 8.01844 15.6834Z" fill="#17171B"/>
                            </svg>
                        <?php } ?>
                    </div>
                        
                    <!-- middle numbers -->
                    <?php for($i=$startPage ; $i <= $endPage ; $i ++ ){ ?>
                        <a 
                            href="/gallery?pageIndex=<?=$i?>"
                            style="font-size:20px;"  
                            class="
                                cursor-pointer 
                                <?=$pageIndex == $i ? "text-dark text-decoration-underline" : "ojak-light-gray no-text-decoration hover-underline"?>"
                        ><?=$i?></a>
                    <?php } ?>
                    
                    <!-- right arrow -->
                    <div>
                        <?php if($pageIndex == $endPage){ ?>
                            <svg  width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                <path d="M1.98157 0.316623L9.74654 7.40897C9.83871 7.49341 9.90384 7.58487 9.94194 7.68338C9.98065 7.78188 10 7.88742 10 8C10 8.11258 9.98065 8.21812 9.94194 8.31662C9.90384 8.41513 9.83871 8.5066 9.74654 8.59103L1.98157 15.7045C1.76651 15.9015 1.4977 16 1.17511 16C0.852534 16 0.576036 15.8945 0.345621 15.6834C0.115206 15.4723 -8.86012e-07 15.226 -8.61408e-07 14.9446C-8.36803e-07 14.6631 0.115206 14.4169 0.345621 14.2058L7.11982 8L0.345622 1.7942C0.130569 1.59719 0.0230411 1.35458 0.0230411 1.06639C0.0230411 0.777625 0.138249 0.527705 0.368664 0.316623C0.599079 0.105541 0.867896 1.5532e-07 1.17512 1.82178e-07C1.48234 2.09036e-07 1.75115 0.105541 1.98157 0.316623Z" fill="#17171B"/>
                            </svg>
                        <?php }else{ ?>
                            <svg onclick="location.href='/gallery?pageIndex=<?=$pageIndex + 1?>'" width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                                <path d="M1.98157 0.316623L9.74654 7.40897C9.83871 7.49341 9.90384 7.58487 9.94194 7.68338C9.98065 7.78188 10 7.88742 10 8C10 8.11258 9.98065 8.21812 9.94194 8.31662C9.90384 8.41513 9.83871 8.5066 9.74654 8.59103L1.98157 15.7045C1.76651 15.9015 1.4977 16 1.17511 16C0.852534 16 0.576036 15.8945 0.345621 15.6834C0.115206 15.4723 -8.86012e-07 15.226 -8.61408e-07 14.9446C-8.36803e-07 14.6631 0.115206 14.4169 0.345621 14.2058L7.11982 8L0.345622 1.7942C0.130569 1.59719 0.0230411 1.35458 0.0230411 1.06639C0.0230411 0.777625 0.138249 0.527705 0.368664 0.316623C0.599079 0.105541 0.867896 1.5532e-07 1.17512 1.82178e-07C1.48234 2.09036e-07 1.75115 0.105541 1.98157 0.316623Z" fill="#17171B"/>
                            </svg>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>

            </div>

        </div>
    </div>

</div>



<script>
        window.addEventListener('load', () => {
        document.body.classList.add('loaded');
    });

    document.addEventListener("DOMContentLoaded", () => {
        //layout
        const galleryOuterWrapper  = document.getElementById("galleryOuterWrapper");
        const galleryWrapper = document.getElementById("galleryWrapper");
        const innerWidth = window.innerWidth;

        if(galleryWrapper){
            if(innerWidth < 700){
                galleryOuterWrapper.style.marginTop = "20px";
            }else{
                galleryOuterWrapper.style.marginTop = "30px";
            }
        }
    });
</script>