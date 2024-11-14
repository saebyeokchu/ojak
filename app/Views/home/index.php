
<!-- Carousel -->
<?= view('/home/carousel') ?? '' ?>

<div class="container">
    <!-- Introduction1 -->
    <div class="d-flex justify-content-center text-center"  style="height:500px; " >
        <div class="for-sm" style="margin-top:200px;">
            <!-- <p style="font-size: 56px">한지로 빚은</p> -->
            <img src="img/home-text-1.png" class="img-fluid" data-aos="fade-up" data-aos-duration="1500"/>
            <img src="img/home-text-2.png" class="img-fluid" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="400"/>
            <!-- <p class="h3" data-aos="fade-up" data-aos-duration="1500">한국인의 숨결</p> -->
            <!-- <small><div style="margin-top:30px;" data-aos="fade-up" data-aos-duration="1500"  data-aos-delay="1300">
                <span>우리의 문화를 대변하는</span><br />
                <span>뚜렷한 개성을 지닌 </span><br />
                <span>공예품을 선사합니다</span>
            </div></small> -->
        </div>
        <div class="for-lg" style="margin-top:150px; ">
            <!-- <p style="font-size: 56px">한지로 빚은</p> -->
            <div class=" row">
                <img src="img/home-text-1.png" class="img-fluid" data-aos="fade-up" data-aos-duration="1500"/>
            </div>
            <div class=" row">
                <img src="img/home-text-2.png" class="img-fluid" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="400"/>
            </div>
            <!-- <p class="h3" data-aos="fade-up" data-aos-duration="1500">한국인의 숨결</p> -->
            <!-- <small><div style="margin-top:30px;" data-aos="fade-up" data-aos-duration="1500"  data-aos-delay="1300">
                <span>우리의 문화를 대변하는</span><br />
                <span>뚜렷한 개성을 지닌 </span><br />
                <span>공예품을 선사합니다</span>
            </div></small> -->
        </div>
    </div>
</div>

    <!-- Arts -->
    <?= view('/home/arts') ?? '' ?>


<div class="container">
    <!-- Introduction2 -->
    <div style="padding-top:100px;padding-bottom:100px;" >
        <div class="row gy-5 text-center">
            <div  class="col-lg-6 col-sm-12 mt-5" data-aos="fade-up" data-aos-duration="1500" >
                <svg id="intro2-logo" fill="#234521" data-name="intro2-logo" xmlns="http://www.w3.org/2000/svg" 
                    viewBox="0 0 113.4 196.35" width="250" height="250">
                    <g id="intro2-logo" data-name="intro2-logo">
                        <g>
                        <path class="cls-1" d="M65.97,53.39c-1.21-2.45-2.38-4.82-3.6-7.28,5.24-2.75,8.8-6.88,10.41-12.58,1.17-4.15.98-8.28-.53-12.32-3.14-8.39-11.23-13.38-19.56-12.98-9.47.45-16.62,7.12-18.52,15.26-2.22,9.47,2.34,18.85,11.51,23.08-1.05,2.45-2.1,4.9-3.15,7.34-7.81-2.67-17.76-12.63-17.1-27.04C26.04,13.25,36.18,2.17,49.45.3c15.33-2.16,28.05,7.66,31.4,20.94,3.46,13.69-3.55,26.79-14.89,32.16Z"/>
                        <path class="cls-1" d="M5.76,143.28c-2.07-2.07-3.94-3.95-5.76-5.76,10.62-10.6,21.32-21.28,31.93-31.87,10.7,10.7,21.53,21.51,32.28,32.26-1.8,1.81-3.67,3.69-5.56,5.58-8.79-8.79-17.67-17.67-26.56-26.56-8.88,8.89-17.61,17.62-26.33,26.35Z"/>
                        <path class="cls-1" d="M73.67,196.35h-8.01v-36.63H28.11v-8.16h45.55v44.79Z"/>
                        <path class="cls-1" d="M49.25,56.12h8.22v44.82H11.89v-8.06h37.36v-36.75Z"/>
                        <path class="cls-1" d="M67.58,141.12v-44.74h8.13v36.63h37.53v8.11h-45.66Z"/>
                        <path class="cls-1" d="M97.05,76.65c-3.52,2.12-6.33,2-8.27-.25-2.09-2.42-2.15-6.28-.15-8.74,1.95-2.39,4.62-2.57,8.32-.52.04-.37.08-.72.13-1.16h2.68v2.71c0,2.77-.03,5.54.02,8.3.02.86-.22,1.17-1.1,1.12-.96-.05-2.05.2-1.62-1.47ZM97.01,71.93c0-3.06-2.77-4.91-5.25-3.52-1.6.9-2.29,3.17-1.57,5.18.54,1.51,2.32,2.62,3.76,2.35,1.94-.37,3.07-1.85,3.07-4.01Z"/>
                        <path class="cls-1" d="M105.47,72.98v5.04h-2.53v-16.2h2.49v9.19c1.24-1.46,2.35-2.63,3.27-3.93.67-.95,1.42-1.35,2.55-1.19.59.08,1.2.01,2.08.01-1.96,2.15-3.74,4.09-5.55,6.07,1.84,2.01,3.62,3.95,5.61,6.12-1.3,0-2.28.07-3.23-.04-.36-.04-.71-.45-.99-.76-1.18-1.34-2.33-2.7-3.71-4.31Z"/>
                        <path class="cls-1" d="M73.62,78.23c-3.57,0-6.17-2.55-6.13-6.23.04-4.03,2.81-6.31,6.18-6.31,3.66,0,6.1,2.5,6.24,6.11.13,3.24-2.22,6.45-6.29,6.43ZM70.23,72.05c0,2.38,1.37,3.95,3.41,3.92,2.09-.03,3.63-1.77,3.61-4.07-.02-2.33-1.5-3.9-3.63-3.88-2.17.03-3.4,1.49-3.39,4.03Z"/>
                        <path class="cls-1" d="M80.03,83.73c0-.48,0-.92,0-1.35,0-.25.05-.49.07-.71.11-.06.17-.13.23-.13q1.95-.18,1.95-2.14c0-4.08,0-8.15,0-12.23,0-.39,0-.78,0-1.22h2.62c0,.39,0,.78,0,1.16,0,4.18-.08,8.37.03,12.55.07,2.92-1.11,4.46-4.9,4.06Z"/>
                        <path class="cls-1" d="M85.24,62.69c.03.94-.65,1.66-1.61,1.67-.95.02-1.7-.66-1.74-1.57-.03-.87.73-1.67,1.63-1.7.92-.03,1.68.68,1.71,1.6Z"/>
                        </g>
                    </g>
                </svg>
            </div>
                
            <div  class="col-lg-6 col-sm-12 d-flex flex-column justify-content-center pt-30"  data-aos="fade-up" data-aos-duration="1500" >
                <div class="home-intro2-text-lg">
                    <p class="h1"><strong>옛 기법과 현대적 감각의 조화</strong></p>
                    <p class="h5 mt-3">오작은 한지공예의 전통성을 이어나가기 위해</p>
                    <p class="h5 ">보존하고 발전시키고 대중화하고 있습니다.</p>
                </div>
                <div class="home-intro2-text-sm">
                    <p class="h1"><strong>옛 기법과 현대적<br /> 감각의 조화</strong></p>
                    <p class="h5 mt-3">오작은 한지공예의 전통성을 이어나가기 위해 보존하고 발전시키고 대중화하고 있습니다.</p>
                </div>
                <div class="mt-3">
                    <a href="/brand"><button class="black-btn">더 알아보기</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Instagram -->
<div class="d-flex justify-content-center bg-white"  data-aos="fade-up" data-aos-duration="1500">
    <?= view('/home/instagram'); ?>
</div> 



