<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <?php
            for($i=1;$i<=3;$i=$i+1){
                $active = "";

                if($i == 1){
                    $active = 'active';
                }

                echo "<div class='carousel-item ".$active."' data-bs-interval='2000' >";
                echo "  <img src='img/carousel".$i.".jpg' class='d-block carousel-img' width='100%'/>";
                echo "</div>";

            }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="d-flex justify-content-center text-center"  style="height:800px; " >
    <div  style="margin-top:350px;">
        <!-- <p style="font-size: 56px">한지로 빚은</p> -->
        <img src="img/home-text-1.png" data-aos="fade-up" data-aos-duration="1500"/>
        <p class="h3" data-aos="fade-up" data-aos-duration="1500">한국인의 숨결</p>
        <p style="margin-top:30px;" data-aos="fade-up" data-aos-duration="1500">우리의 문화를 대변하는 뚜렷한 개성을 지는 공예품을 선사합니다</p>
    </div>
</div>

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
                    <?= view('/home/gallery-card') ?>
                </div>
                <div class="col carousel-inner-lg">
                    <?= view('/home/gallery-card') ?>
                </div>
                <div class="col carousel-inner-lg">
                    <?= view('/home/gallery-card') ?>
                </div>
            </div>
        </div>
        <div class="carousel-item ">
            <div class="row ">
                <div class="col">
                    <?= view('/home/gallery-card') ?>
                </div>
                <div class="col carousel-inner-lg">
                    <?= view('/home/gallery-card') ?>
                </div>
                <div class="col carousel-inner-lg">
                    <?= view('/home/gallery-card') ?>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="row ">
                <div class="col">
                    <?= view('/home/gallery-card') ?>
                </div>
                <div class="col carousel-inner-lg">
                    <?= view('/home/gallery-card') ?>
                </div>
                <div class="col carousel-inner-lg">
                    <?= view('/home/gallery-card') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container"  style="height:400px; margin-top:200px;" data-aos="fade-rifgt" data-aos-duration="1500">
    <div class="row gy-10">
        <div  class="col-lg-6 col-sm-12" >
            <p class="h1"><strong>한지세상</strong>은</p>
            <p class="h3">옛 기법과 현대적 감각의 조화를 바탕으로</p>
            <p>한지공예의 전통성을 이어나가기 위해 보존하고 발전시키고 대중화하고 있습니다.</p>
        </div>
        <div  class="col-lg-6 col-sm-12 d-flex justify-content-center pt-30" >
            <a href="brand"> 
                <svg height="60px" width="80px" viewBox="0 0 330 330"   xmlns="http://www.w3.org/2000/svg">
                <!-- First arrow icon with horizontal bounce animation -->
                    <g transform="translate(-40, 10)">
                        <path fill="#686868" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001
                            c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213
                            C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606
                            C255,161.018,253.42,157.202,250.606,154.389z">
                        <animateTransform 
                            attributeName="transform" 
                            type="translate" 
                            values="0,0; 50,0; 0,0" 
                            dur="3s" 
                            repeatCount="indefinite" 
                            begin="0s"/>
                        </path>
                    </g>

                    <!-- Second arrow icon with delayed horizontal bounce animation -->
                    <g transform="translate(110, 10)">
                        <path fill="#686868" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001
                            c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213
                            C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606
                            C255,161.018,253.42,157.202,250.606,154.389z">
                        <animateTransform 
                            attributeName="transform" 
                            type="translate" 
                            values="0,0; 30,0; 0,0" 
                            dur="3s" 
                            repeatCount="indefinite" 
                            begin="0s"/> <!-- Delayed animation for a different rhythm -->
                        </path>
                    </g>
                </svg>

            </a>
        </div>
    </div>
</div>



<div class="d-flex justify-content-center bg-white"  data-aos="fade-up" data-aos-duration="1500">
    <?= view('/home/instagram') ?? '' ?>
</div>
