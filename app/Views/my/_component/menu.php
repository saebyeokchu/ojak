<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
    <div>
        <svg data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="45" height="90" viewBox="0 0 543.16 940.44">
            <g  class="">
                <path class="cls-7" fill="black" d="M315.95,255.73c-5.8-11.72-11.42-23.09-17.25-34.86,25.11-13.17,42.16-32.96,49.87-60.27,5.62-19.9,4.7-39.66-2.54-58.99-15.05-40.19-53.8-64.08-93.7-62.18-45.34,2.16-79.6,34.12-88.72,73.09-10.61,45.37,11.2,90.3,55.11,110.53-5.02,11.71-10.05,23.45-15.07,35.17-37.38-12.81-85.06-60.5-81.92-129.5C124.7,63.44,173.3,10.41,236.86,1.44c73.45-10.37,134.35,36.7,150.41,100.27,16.57,65.59-17,128.33-71.32,154.02Z"/>
                <path class="cls-7" fill="black" d="M27.57,686.26c-9.9-9.92-18.89-18.91-27.57-27.61,50.88-50.79,102.12-101.93,152.91-152.64,51.27,51.23,103.11,103.04,154.61,154.5-8.63,8.67-17.59,17.67-26.61,26.72-42.09-42.08-84.62-84.62-127.21-127.21-42.53,42.56-84.32,84.39-126.13,126.23Z"/>
                <path class="cls-7" fill="black" d="M352.83,940.44h-38.36v-175.45h-179.81v-39.06h218.18v214.51Z"/>
                <path class="cls-7" fill="black"  d="M235.88,268.78h39.39v214.66H56.94v-38.62h178.94v-176.03Z"/>
                <path class="cls-7" fill="black"  d="M323.7,675.9v-214.3h38.92v175.46h179.77v38.84h-218.69Z"/>
                <path class="cls-7" fill="black" d="M464.84,367.14c-16.84,10.14-30.31,9.59-39.59-1.19-9.99-11.59-10.31-30.1-.71-41.87,9.34-11.45,22.14-12.29,39.83-2.48.2-1.78.38-3.46.61-5.56h12.82v12.99c0,13.26-.15,26.51.09,39.76.07,4.1-1.06,5.6-5.28,5.36-4.58-.26-9.8.96-7.78-7.02ZM464.62,344.53c-.04-14.65-13.29-23.53-25.16-16.87-7.66,4.29-10.96,15.19-7.53,24.83,2.57,7.21,11.12,12.56,18,11.26,9.3-1.76,14.72-8.84,14.69-19.21Z"/>
                <path class="cls-7" fill="black" d="M505.18,349.55v24.15h-12.12v-77.61h11.95v44.03c5.92-7.01,11.25-12.6,15.69-18.83,3.22-4.53,6.8-6.44,12.22-5.72,2.84.38,5.77.07,9.97.07-9.4,10.28-17.91,19.59-26.58,29.08,8.81,9.61,17.32,18.91,26.87,29.33-6.23,0-10.91.34-15.49-.17-1.71-.19-3.42-2.15-4.74-3.65-5.65-6.41-11.15-12.95-17.75-20.67Z"/>
                <path class="cls-7" fill="black" d="M352.59,374.67c-17.08.03-29.55-12.23-29.37-29.86.2-19.32,13.44-30.22,29.62-30.23,17.53-.02,29.2,11.99,29.88,29.28.61,15.53-10.65,30.89-30.13,30.81ZM336.36,345.08c.04,11.4,6.58,18.91,16.33,18.77,10-.14,17.39-8.48,17.29-19.51-.1-11.15-7.16-18.69-17.4-18.56-10.39.13-16.27,7.13-16.22,19.3Z"/>
                <path class="cls-7" fill="black" d="M383.32,401.03c0-2.32-.04-4.39.02-6.45.03-1.19.22-2.37.32-3.41.53-.31.81-.6,1.12-.63q9.32-.86,9.33-10.27c0-19.52,0-39.04,0-58.55,0-1.87,0-3.74,0-5.85h12.56c0,1.89,0,3.73,0,5.57,0,20.04-.36,40.09.12,60.12.34,13.99-5.33,21.36-23.46,19.47Z"/>
                <path class="cls-7" fill="black" d="M408.24,300.26c.15,4.51-3.13,7.93-7.7,8.02-4.56.09-8.14-3.16-8.31-7.54-.17-4.18,3.5-8.01,7.81-8.16,4.39-.16,8.05,3.28,8.2,7.68Z"/>
            </g>
        </svg>  
    </div>
    <div class="d-flex flex-column ps-2 pt-4 gap-4 text-dark">
        <div class="d-flex flex-column gap-3">
            <div class="fw-bold">
                게시물 관리
            </div>
            <div class="cursor-pointer">
                <a href="/my/gallery" class="no-text-decoration text-dark hover-underline">작품 관리</a>
            </div>
            <div class="cursor-pointer">
                <a href="/my/community?gubun=0" class="no-text-decoration text-dark hover-underline">커뮤니티 관리</a>
            </div>
        </div>
        <div class="d-flex flex-column gap-3">
            <div class="fw-bold">
                개인정보 관리
            </div>
            <div class="cursor-pointer">
                <a href="/my/info" class="no-text-decoration text-dark hover-underline">개인정보 관리</a>
            </div>
            <?php if($isAdmin) { ?>
                <div class="cursor-pointer">
                    <a href="/my/busniess" class="no-text-decoration text-dark hover-underline">사업자 정보 관리</a>
                </div>
                <!-- <div class="cursor-pointer">
                    <a href="/my/social" class="no-text-decoration text-dark hover-underline">소셜 미디어 관리</a>
                </div> -->
            <?php } ?>
        </div>
        <?php if($isAdmin) { ?>
            <div class="d-flex flex-column gap-3">
                <div class="fw-bold">
                    홈페이지 관리
                </div> 
                <div class="cursor-pointer">
                    <a href="/my/represent-gallery" class="no-text-decoration text-dark hover-underline">슬라이드 작품 관리</a>
                </div>
                <!-- <div class="cursor-pointer">
                    <a href="/my/social" class="no-text-decoration text-dark hover-underline">소셜사이트 관리</a>
                </div> -->
            </div>
            <div class="d-flex flex-column gap-3">
                <div class="fw-bold">
                    조합원 관리
                </div> 
                <div class="cursor-pointer">
                    <a href="/my/user-management" class="no-text-decoration text-dark hover-underline">조합원 관리</a>
                </div>
                
            </div>
        <?php } ?>
        <div class="d-flex flex-column gap-3">
            <div class="fw-bold">
                <a href="/" class="no-text-decoration text-dark hover-underline">나가기</a>
            </div>
        </div>
    </div>
</div>