<?php
    $count=0;

    if(isset($contents)){
        $items = $contents['items'];
        $count = count($items);
    }
?>

<?php if($count == 0){ ?>
    <div class="page-wrap d-flex flex-row align-items-center bg-light " style="min-height: 40vh; border:1px solid gray;" data-aos="fade-up" data-aos-duration="1500">
        <div class="container my-3">
            <div class="row justify-content-center text-center">
                <span class="h3">현재 전시중인 작품이 없습니다.</span>
            </div>
        </div>
    </div>
<?php }else{ ?>
<!-- Carousel Button -->
<div id="carouselExampleIndicators2" class="carousel slide"  data-aos="fade-up" data-aos-duration="1500">
    <div class="d-flex justify-content-center py-5">
        <button class="slider-btn" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon text-black" style="width: 64px;height: 64px;" data-bs-target="#carouselExampleIndicators2" aria-hidden="true"> </span>
        </button>
        <div style="width:100px;"></div>
        <button class="slider-btn" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
            <span class="carousel-control-next-icon text-black" style="width: 64px;height: 64px;" data-bs-target="#carouselExampleIndicators2" aria-hidden="true" ></span>
        </button>
    </div>

    <div class="carousel-inner p-3">
        <?php if($count <= 3) { ?>
            <div class="carousel-item active">
                <div class="row">
                    <?php foreach($items as $item) { ?>
                        <div class="col">
                            <?= view('/home/component/gallery-card') ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php }else{ ?>
            <?php for($i=0;$i < $count; $i = $i + 3){ ?>
                <div class="carousel-item <?= ($i==0) ? 'active' : '' ?>">
                    <div class="row gy-5">
                        <?php for($j=$i;$j < $i + 3 && $j < $count; $j = $j + 1) { ?>
                            <div class="col-lg-4 col-sm-12">
                                <?= view('/home/component/gallery-card',array('item' => $items[$j] )) ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>

    
</div>
<?php } ?>
