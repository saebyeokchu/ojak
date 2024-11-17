<?php
    $count = 0;

    if(isset($contents)){
        $items = $contents['items'];
        $count = count($items);
    }

    $count = 0 ;
?>

<!-- Gallery -->
<div class="page-header d-flex justify-content-center text-center">
    <div class="title" data-aos="fade-up" data-aos-duration="1500">
        <p class="main-title">작품</p>
        <p class="sub-title sub-title-lg">오작의 커뮤니티 작가들이 제작한 작품을 한곳에서 만나보세요.</p>
        <p class="sub-title sub-title-sm">오작의 커뮤니티 작가들이 <br />제작한 작품을 한곳에서 만나보세요.</p>

    </div>
</div>

<!-- Gallery Contents -->
<?php if($count == 0){ ?>
    <div class="page-wrap d-flex flex-row align-items-center" style="min-height: 60vh;">
        <div class="container my-3">
            <div class="row justify-content-center text-center">
                <span class="h3">등록된 작품이 없습니다.</span>
            </div>
            <div class="row justify-content-center text-center mt-3 " >
                <button style="width:300px;" class="black-btn logged-out" data-bs-toggle="modal" data-bs-target="#loginModal">새로운 작품 등록하기</button>
                <a href="/gallery/new" class="logged-in">
                    <button id="createNewItemBtnLoggined" style="width:300px;" class="black-btn" >새로운 작품 등록하기</button>
                </a>
            </div>
        </div>
    </div>
<?php }else{ ?>


<div class="container pt-100" >
    <div class="d-flex justify-content-end">
        <span class="logged-out text-secondary no-text-decoration hover-underline cursor-pointer" data-bs-toggle="modal" data-bs-target="#loginModal">
            작품 등록하기
        </span>
        <a class="logged-in text-secondary no-text-decoration hover-underline" href="/gallery/new" >
            작품 등록하기
        </a>
    </div>
</div>

<div class="container pb-100" style="margin-top:15px;">
    <?php for($i=0;$i<$count;$i=$i+4) { ?>
        <div class="row pt-15 gy-4" data-aos="fade-up" data-aos-duration="1500" >
            <?php for($j=$i;$j<$i+4 && $j < $count;$j=$j+1) { ?>
                    <div class="col-lg-3 col-sm-6 col-xs-12"> 
                        <?= view('gallery/component/frame', array('item' => $items[$j])); ?>
                    </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>
<?php } ?>

<!-- Pagination -->
<!-- <div class="d-flex justify-content-center pt-30 pb-30">
    <nav class="pagination-outer" aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item">
                <a href="#" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item active"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
                <a href="#" class="page-link" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        </ul>
    </nav>
</div> -->


<?= view('/auth/loginModal',array('return_url' => '/gallery/new' )) ?>
