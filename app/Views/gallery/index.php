<?php
    $count = 0;
    $itemPerPage = 8;
    $paginationRange = 5;

    if(isset($contents)){
        $pageIndex = $contents['pageIndex'];
        $items = $contents['items'];
        $count = count($items);
    }

    $userId = 0;
    if(isset($_COOKIE['user_id'])){
        $userId = $_COOKIE['user_id'];
    }

    $galleryCounter = 0;
    
    //count page index
    //8 gallery items per page
    if(isset($items)){
        $totalPageIndex = floor(count($items) / $itemPerPage) + 1;

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
            작품
        </div>
    </nav>


    <!-- content -->
    <div class="grid  mt-150" >
        <div class="d-flex justify-content-center">
            <p class="fw-bold" style="font-size: 32px;">작품</p>
        </div>
        
        <div style="margin-top:100px; ">
            <!-- user gallery control class="logged-in"-->
            <div class="d-flex justify-content-end text-end logged-in mb-3" onclick="openEditModal()">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="plus-icon cursor-pointer"
                    viewBox="0 0 24 24"
                    width=24 height=24
                    data-bs-toggle="modal" data-bs-target="#addGalleryModal"
                >
                    <circle cx="12" cy="12" r="11" stroke="black" stroke-width="2" fill="black" />
                    <line x1="12" y1="6" x2="12" y2="18" stroke="white" stroke-width="2" />
                    <line x1="6" y1="12" x2="18" y2="12" stroke="white" stroke-width="2" />
                </svg>
            </div>

            
            
            <!-- 한줄 설명은 23자 -->
                <?php if(count($items) > 0){
                    foreach($items as $item){ ?>
                    <?php if($galleryCounter % 4 == 0) { ?> <div class='row row-cols-1 row-cols-md-4 g-4 <?=$galleryCounter > 3 ?? 'mt-70' ?>'> <?php } ?>
                        <div class="col"> 
                            <a href="gallery/<?=$item["id"]?>?pageIndex=<?=$pageIndex?>">
                                <img src="/img/user/<?=$item["img_url"]?>" class="w-100 hover-saturate cursor-pointer" style="min-height: 380px;object-fit:cover;" />
                            </a>
                            <div style="font-size: 24px;" class="fw-bold mt-2">
                                <?=$item["title"]?>
                            </div>
                            <div style="font-size: 20px;" class="mt-2">
                            <?=$item["sub_title"]?>
                            </div>
                        </div>
                    <?php if($galleryCounter % 4 == 3 || $galleryCounter + 1 == count($items)) { ?> </div> <?php } ?>
                <?php $galleryCounter = $galleryCounter+1; } } else { ?>
                    <div style="font-size: 32px;min-height:200px;" class="d-flex justify-content-center">
                        현재 등록된 작품이 없습니다.
                    </div>    
                <?php } ?>


            


            <!-- <div class="row row-cols-1 row-cols-md-4 g-4 mt-1"  >
                <div class="col">
                    <img src="/img/resource/gallery/1.png" class="img-fluid hover-saturate cursor-pointer" />
                    <div style="font-size: 24px;" class="fw-bold mt-2">
                        작품 이름_1
                    </div>
                    <div style="font-size: 20px;" class="mt-2">
                        작품에 대한 한줄 설명입니다
                    </div>
                </div>
                <div class="col">
                    <img src="/img/resource/gallery/2.png" class="img-fluid hover-saturate cursor-pointer" />
                    <div style="font-size: 24px;" class="fw-bold mt-2">
                        작품 이름_1
                    </div>
                    <div style="font-size: 20px;" class="mt-2">
                        작품에 대한 한줄 설명입니다
                    </div>
                </div>
                <div class="col">
                    <img src="/img/resource/gallery/3.png" class="img-fluid hover-saturate cursor-pointer" />
                    <div style="font-size: 24px;" class="fw-bold mt-2">
                        작품 이름_1
                    </div>
                    <div style="font-size: 20px;" class="mt-2">
                        작품에 대한 한줄 설명입니다
                    </div>
                </div>
                <div class="col">
                    <img src="/img/resource/gallery/4.png" class="img-fluid hover-saturate cursor-pointer" />
                    <div style="font-size: 24px;" class="fw-bold mt-2">
                        작품 이름_1
                    </div>
                    <div style="font-size: 20px;" class="mt-2">
                        작품에 대한 한줄 설명입니다
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-4 g-4"  style="margin-top:70px;">
                <div class="col">
                    <a href="gallery/1">
                        <img src="/img/resource/gallery/1.png" class="img-fluid hover-saturate cursor-pointer" />
                    </a>
                    <div style="font-size: 24px;" class="fw-bold mt-2">
                        작품 이름_1
                    </div>
                    <div style="font-size: 20px;" class="mt-2">
                        작품에 대한 한줄 설명입니다 작품에 대한 한줄 설명(23자)
                    </div>
                </div>
                <div class="col">
                    <img src="/img/resource/gallery/2.png" class="img-fluid hover-saturate cursor-pointer" />
                    <div style="font-size: 24px;" class="fw-bold mt-2">
                        작품 이름_1
                    </div>
                    <div style="font-size: 20px;" class="mt-2">
                        작품에 대한 한줄 설명입니다
                    </div>
                </div>
                <div class="col">
                    <img src="/img/resource/gallery/3.png" class="img-fluid hover-saturate cursor-pointer" />
                    <div style="font-size: 24px;" class="fw-bold mt-2">
                        작품 이름_1
                    </div>
                    <div style="font-size: 20px;" class="mt-2">
                        작품에 대한 한줄 설명입니다
                    </div>
                </div>
                <div class="col">
                    <img src="/img/resource/gallery/4.png" class="img-fluid hover-saturate cursor-pointer" />
                    <div style="font-size: 24px;" class="fw-bold mt-2">
                        작품 이름_1
                    </div>
                    <div style="font-size: 20px;" class="mt-2">
                        작품에 대한 한줄 설명입니다
                    </div>
                </div>
            </div> -->

            <!-- pagination -->
            <?php if(count($items) > 0){ ?>
            <div class="d-flex flex-row justify-content-center gap-4" style="margin-top:43px;">
                <div>
                    <?php if($pageIndex == $startPage){ ?>
                        <svg  width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg" >
                            <path d="M8.01844 15.6834L0.253458 8.59103C0.161292 8.50659 0.0961612 8.41513 0.058066 8.31662C0.0193563 8.21812 1.41845e-06 8.11258 1.39876e-06 8C1.37908e-06 7.88742 0.0193562 7.78188 0.0580659 7.68338C0.0961611 7.58487 0.161292 7.4934 0.253458 7.40897L8.01843 0.295513C8.23349 0.0985033 8.50231 -1.48659e-06 8.82489 -1.54299e-06C9.14747 -1.59939e-06 9.42396 0.105539 9.65438 0.316621C9.88479 0.527703 10 0.773965 10 1.05541C10 1.33685 9.88479 1.58311 9.65438 1.79419L2.88019 8L9.65438 14.2058C9.86943 14.4028 9.97696 14.6454 9.97696 14.9336C9.97696 15.2224 9.86176 15.4723 9.63134 15.6834C9.40093 15.8945 9.13211 16 8.82489 16C8.51767 16 8.24885 15.8945 8.01844 15.6834Z" fill="#17171B"/>
                        </svg>
                    <?php }else{ ?>
                        <svg onclick="location.href=/gallery?pageIndex=<?=$startPage?>" width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                            <path d="M8.01844 15.6834L0.253458 8.59103C0.161292 8.50659 0.0961612 8.41513 0.058066 8.31662C0.0193563 8.21812 1.41845e-06 8.11258 1.39876e-06 8C1.37908e-06 7.88742 0.0193562 7.78188 0.0580659 7.68338C0.0961611 7.58487 0.161292 7.4934 0.253458 7.40897L8.01843 0.295513C8.23349 0.0985033 8.50231 -1.48659e-06 8.82489 -1.54299e-06C9.14747 -1.59939e-06 9.42396 0.105539 9.65438 0.316621C9.88479 0.527703 10 0.773965 10 1.05541C10 1.33685 9.88479 1.58311 9.65438 1.79419L2.88019 8L9.65438 14.2058C9.86943 14.4028 9.97696 14.6454 9.97696 14.9336C9.97696 15.2224 9.86176 15.4723 9.63134 15.6834C9.40093 15.8945 9.13211 16 8.82489 16C8.51767 16 8.24885 15.8945 8.01844 15.6834Z" fill="#17171B"/>
                        </svg>
                    <?php } ?>
                </div>

                <?php for($i=$startPage ; $i <= $endPage ; $i ++ ){ ?>
                    <div style="font-size:20px;" class="cursor-pointer <?=$pageIndex != $i ? ' hover-underline' : 'text-decoration-underline ' ?>">
                        <a class=" <?=$pageIndex == $i ? "text-dark" : "ojak-light-gray"?>" href=""><?=$i?></a>
                    </div>
                <?php } ?>

                <div>
                    <?php if($pageIndex == $startPage){ ?>
                        <svg  width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg" >
                            <path d="M1.98157 0.316623L9.74654 7.40897C9.83871 7.49341 9.90384 7.58487 9.94194 7.68338C9.98065 7.78188 10 7.88742 10 8C10 8.11258 9.98065 8.21812 9.94194 8.31662C9.90384 8.41513 9.83871 8.5066 9.74654 8.59103L1.98157 15.7045C1.76651 15.9015 1.4977 16 1.17511 16C0.852534 16 0.576036 15.8945 0.345621 15.6834C0.115206 15.4723 -8.86012e-07 15.226 -8.61408e-07 14.9446C-8.36803e-07 14.6631 0.115206 14.4169 0.345621 14.2058L7.11982 8L0.345622 1.7942C0.130569 1.59719 0.0230411 1.35458 0.0230411 1.06639C0.0230411 0.777625 0.138249 0.527705 0.368664 0.316623C0.599079 0.105541 0.867896 1.5532e-07 1.17512 1.82178e-07C1.48234 2.09036e-07 1.75115 0.105541 1.98157 0.316623Z" fill="#17171B"/>
                        </svg>
                    <?php }else{ ?>
                        <svg onclick="location.href=/gallery?pageIndex=<?=$endPage?>" width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                            <path d="M1.98157 0.316623L9.74654 7.40897C9.83871 7.49341 9.90384 7.58487 9.94194 7.68338C9.98065 7.78188 10 7.88742 10 8C10 8.11258 9.98065 8.21812 9.94194 8.31662C9.90384 8.41513 9.83871 8.5066 9.74654 8.59103L1.98157 15.7045C1.76651 15.9015 1.4977 16 1.17511 16C0.852534 16 0.576036 15.8945 0.345621 15.6834C0.115206 15.4723 -8.86012e-07 15.226 -8.61408e-07 14.9446C-8.36803e-07 14.6631 0.115206 14.4169 0.345621 14.2058L7.11982 8L0.345622 1.7942C0.130569 1.59719 0.0230411 1.35458 0.0230411 1.06639C0.0230411 0.777625 0.138249 0.527705 0.368664 0.316623C0.599079 0.105541 0.867896 1.5532e-07 1.17512 1.82178e-07C1.48234 2.09036e-07 1.75115 0.105541 1.98157 0.316623Z" fill="#17171B"/>
                        </svg>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>

        </div>

    </div>

</div>


<!-- Gallery Contents -->
<!-- <?php //if($count == 0){ ?>
    <div class="page-wrap d-flex flex-row align-items-center" style="min-height: 60vh;">
        <div class="container my-3">
            <div class="row justify-content-center text-center">
                <span class="h3">등록된 작품이 없습니다.</span>
            </div>
            <div class="row justify-content-center text-center mt-3 " >
                <?php //if( $userId > 0 ) { ?>
                    <a href="/gallery/new" class="logged-in">
                        <button id="createNewItemBtnLoggined" type="button" class="btn btn-dark btn-lg" style="width:300px;">새로운 작품 등록하기</button>
                    </a>
                <?php //} ?>
            </div>
        </div>
    </div>
<?php //}else{ ?>

    

    <div class="container pt-70 pb-100" >
        <?php //if( $userId > 0 ) { ?>
            <div class="d-flex justify-content-end">
                <a class="no-text-decoration" href="/gallery/new" >
                    <button class="btn btn-dark">작품 등록하기</button>
                </a>
            </div>
        <?php //} ?>
        <?php //for($i=0;$i<$count;$i=$i+4) { ?>
            <div class="row pt-15 gy-4" data-aos="fade-up" data-aos-duration="1500" >
                <?php //for($j=$i;$j<$i+4 && $j < $count;$j=$j+1) { ?>
                        <div class="col-lg-3 col-sm-6 col-xs-12"> 
                            /view('gallery/component/frame', array('item' => $items[$j])); 
                        </div>
                <?php // } ?>
            </div>
        <?php //} ?>
    </div>

<?php //} ?>
 -->

<script>
        window.addEventListener('load', () => {
        document.body.classList.add('loaded');
    });
</script>