
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
        <div class="carousel-item active">
            <div class="row">
                <div class="col">
                    <?= view('/home/component/gallery-card') ?>
                </div>
                <div class="col carousel-inner-lg">
                    <?= view('/home/component/gallery-card') ?>
                </div>
                <div class="col carousel-inner-lg">
                    <?= view('/home/component/gallery-card') ?>
                </div>
            </div>
        </div>
        <div class="carousel-item ">
            <div class="row ">
                <div class="col">
                    <?= view('/home/component/gallery-card') ?>
                </div>
                <div class="col carousel-inner-lg">
                    <?= view('/home/component/gallery-card') ?>
                </div>
                <div class="col carousel-inner-lg">
                    <?= view('/home/component/gallery-card') ?>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="row ">
                <div class="col">
                    <?= view('/home/component/gallery-card') ?>
                </div>
                <div class="col carousel-inner-lg">
                    <?= view('/home/component/gallery-card') ?>
                </div>
                <div class="col carousel-inner-lg">
                    <?= view('/home/component/gallery-card') ?>
                </div>
            </div>
        </div>
    </div>
</div>