<?php
    $userId = 0;
    if(isset($_COOKIE['user_id'])){
        $userId = $_COOKIE['user_id'];
    }

    //underline setting
    $currentUrl = $_SERVER['REQUEST_URI'];
    $lgBrandUrl = "hover-underline";
    $lgGalleryUrl = "hover-underline";
    $lgNoticeUrl = "hover-underline";
    $lgEventUrl = "hover-underline";
    $lgQnaUrl = "hover-underline";
    $lgMypageUrl  = "hover-underline";

    if(strpos($currentUrl, 'brand')){
        $lgBrandUrl="text-decoration-underline";
    }
    if(strpos($currentUrl, 'gallery')){
        $lgGalleryUrl="text-decoration-underline";
    }

    //community/list/3
    if(strpos($currentUrl, 'community/list/1')){
        $lgNoticeUrl="text-decoration-underline";
    }
    if(strpos($currentUrl, 'community/list/2')){
        $lgEventUrl="text-decoration-underline";
    }
    if(strpos($currentUrl, 'community/list/3')){
        $lgQnaUrl="text-decoration-underline";
    }

    if(strpos($currentUrl, 'my/')){
        $lgMypageUrl="text-decoration-underline";
    }
?>



<!-- mobile header -webkit-fill-available;-->
<header class="fixed-top for-sm bg-transparent" id="smHeader">
    <div id="sm-header-toggle-div" class="mh-100 fixed-top z-3 d-flex flex-column bg-black text-white" style="width:300px; height: 100vh; transform: translateX(-100vh); transition: transform 0.8s ease-in-out;">
        <div class="d-flex justify-content-end p-3">
        <button onclick="closeToggleDivSm()" type="button" class="btn-close btn-close-white" aria-label="Close"></button>
        </div>
        <!-- logo -->
        <div class="mt-5 d-flex justify-content-center">
            <a href="/" >
                <svg data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="90" height="150" viewBox="0 0 543.16 940.44">
                    <g >
                        <path class="cls-1" fill="white" d="M315.95,255.73c-5.8-11.72-11.42-23.09-17.25-34.86,25.11-13.17,42.16-32.96,49.87-60.27,5.62-19.9,4.7-39.66-2.54-58.99-15.05-40.19-53.8-64.08-93.7-62.18-45.34,2.16-79.6,34.12-88.72,73.09-10.61,45.37,11.2,90.3,55.11,110.53-5.02,11.71-10.05,23.45-15.07,35.17-37.38-12.81-85.06-60.5-81.92-129.5C124.7,63.44,173.3,10.41,236.86,1.44c73.45-10.37,134.35,36.7,150.41,100.27,16.57,65.59-17,128.33-71.32,154.02Z"/>
                        <path class="cls-1" fill="white" d="M27.57,686.26c-9.9-9.92-18.89-18.91-27.57-27.61,50.88-50.79,102.12-101.93,152.91-152.64,51.27,51.23,103.11,103.04,154.61,154.5-8.63,8.67-17.59,17.67-26.61,26.72-42.09-42.08-84.62-84.62-127.21-127.21-42.53,42.56-84.32,84.39-126.13,126.23Z"/>
                        <path class="cls-1" fill="white" d="M352.83,940.44h-38.36v-175.45h-179.81v-39.06h218.18v214.51Z"/>
                        <path class="cls-1" fill="white"  d="M235.88,268.78h39.39v214.66H56.94v-38.62h178.94v-176.03Z"/>
                        <path class="cls-1" fill="white"  d="M323.7,675.9v-214.3h38.92v175.46h179.77v38.84h-218.69Z"/>
                        <path class="cls-1" fill="white" d="M464.84,367.14c-16.84,10.14-30.31,9.59-39.59-1.19-9.99-11.59-10.31-30.1-.71-41.87,9.34-11.45,22.14-12.29,39.83-2.48.2-1.78.38-3.46.61-5.56h12.82v12.99c0,13.26-.15,26.51.09,39.76.07,4.1-1.06,5.6-5.28,5.36-4.58-.26-9.8.96-7.78-7.02ZM464.62,344.53c-.04-14.65-13.29-23.53-25.16-16.87-7.66,4.29-10.96,15.19-7.53,24.83,2.57,7.21,11.12,12.56,18,11.26,9.3-1.76,14.72-8.84,14.69-19.21Z"/>
                        <path class="cls-1" fill="white" d="M505.18,349.55v24.15h-12.12v-77.61h11.95v44.03c5.92-7.01,11.25-12.6,15.69-18.83,3.22-4.53,6.8-6.44,12.22-5.72,2.84.38,5.77.07,9.97.07-9.4,10.28-17.91,19.59-26.58,29.08,8.81,9.61,17.32,18.91,26.87,29.33-6.23,0-10.91.34-15.49-.17-1.71-.19-3.42-2.15-4.74-3.65-5.65-6.41-11.15-12.95-17.75-20.67Z"/>
                        <path class="cls-1" fill="white" d="M352.59,374.67c-17.08.03-29.55-12.23-29.37-29.86.2-19.32,13.44-30.22,29.62-30.23,17.53-.02,29.2,11.99,29.88,29.28.61,15.53-10.65,30.89-30.13,30.81ZM336.36,345.08c.04,11.4,6.58,18.91,16.33,18.77,10-.14,17.39-8.48,17.29-19.51-.1-11.15-7.16-18.69-17.4-18.56-10.39.13-16.27,7.13-16.22,19.3Z"/>
                        <path class="cls-1" fill="white" d="M383.32,401.03c0-2.32-.04-4.39.02-6.45.03-1.19.22-2.37.32-3.41.53-.31.81-.6,1.12-.63q9.32-.86,9.33-10.27c0-19.52,0-39.04,0-58.55,0-1.87,0-3.74,0-5.85h12.56c0,1.89,0,3.73,0,5.57,0,20.04-.36,40.09.12,60.12.34,13.99-5.33,21.36-23.46,19.47Z"/>
                        <path class="cls-1" fill="white" d="M408.24,300.26c.15,4.51-3.13,7.93-7.7,8.02-4.56.09-8.14-3.16-8.31-7.54-.17-4.18,3.5-8.01,7.81-8.16,4.39-.16,8.05,3.28,8.2,7.68Z"/>
                    </g>
                    
                </svg>
            </a>
        </div>
        <!-- menu -->
        <div class="d-flex text-center cursor-pointer pt-3" >
            <div class="d-felx gap-3 gy-3" style="list-style: none;">
                <?php if(isset($_COOKIE["user_id"])) { ?>
                    <a class=" nav-link pt-3 toggle-header-menu <?=$lgMypageUrl?>" href="/my/home" style="height:60px;width:300px;"><span class="ps-3">마이페이지</span></a>
                <?php } ?>

                <a class=" nav-link pt-3 toggle-header-menu <?=$lgBrandUrl?>" href="/brand" style="height:60px;width:300px;">
                    <span class="ps-3">브랜드</span>
                </a>
                <a class=" nav-link pt-3 toggle-header-menu <?=$lgGalleryUrl?>" href="/gallery?pageIndex=1" style="height:60px;width:300px;"><span class="ps-3">작품</span></a>
                <div  onmouseenter="showcommunitydiv('mobile-header-community-submenu')"  onmouseleave="hidecommunitydiv('mobile-header-community-submenu')">
                    <span class="nav-link pt-3 toggle-header-menu" style="height:60px;width:300px;"><span class="ps-3">커뮤니티  <span id="mobileCommunityPlus" >+</span> <span id="mobileCommunityMinus" class="hide-item">-</span> </span>
                    <div id="mobile-header-community-submenu" class="hide-y-gradually mt-3" >
                        <a id="mobileNoticeMenu" class="nav-link pt-3 toggle-header-menu <?=$lgNoticeUrl?>" style="height:60px;width:300px;"><span class="ps-3">공지사항</span></a>
                        <a id="mobileEventMenu" class="nav-link pt-3 toggle-header-menu <?=$lgEventUrl?>" style="height:60px;width:300px;" ><span class="ps-3">이벤트</span></a>
                        <a id="mobileQnaMenu" class="nav-link pt-3 toggle-header-menu <?=$lgQnaUrl?>" style="height:60px;width:300px;" ><span class="ps-3">Q&A</span></a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="d-flex flex-row justify-content-between px-5 py-2 align-items-center">
        <div onclick="openToggleDivSm(event)" class="cursor-pointer"  >
            <svg width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path id="smHeaderMenuIcon" d="M5 6H12H19M5 12H19M5 18H19" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
        <div>
            <a class="navbar-brand " href="/">
                <svg  width="69" height="55" viewBox="0 0 63 108" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_137_154)">
                        <path class="cls-1 smHeaderLogoClass" d="M36.6499 29.3665C35.9777 28.0189 35.3277 26.7153 34.6499 25.3622C37.561 23.8496 39.5388 21.578 40.4332 18.4428C41.0832 16.1601 40.9777 13.8885 40.1388 11.6663C38.3943 7.05148 33.8999 4.30679 29.2721 4.5268C24.011 4.77432 20.0388 8.44308 18.9832 12.9204C17.7499 18.1292 20.2832 23.2886 25.3777 25.6153C24.7943 26.9629 24.211 28.3105 23.6277 29.6525C19.2888 28.1839 13.761 22.7056 14.1277 14.7795C14.4666 7.288 20.0999 1.19357 27.4721 0.165001C35.9888 -1.02308 43.0555 4.37829 44.9166 11.6828C46.8388 19.2128 42.9443 26.4183 36.6443 29.372L36.6499 29.3665Z" fill="white"/>
                        <path class="cls-1 smHeaderLogoClass" d="M3.2 78.8095C2.05 77.6709 1.01111 76.6369 0 75.6413C5.9 69.8109 11.8444 63.9365 17.7389 58.1116C23.6833 63.997 29.7 69.9429 35.6722 75.8558C34.6722 76.8514 33.6333 77.8854 32.5833 78.925C27.7 74.0902 22.7667 69.2058 17.8278 64.316C12.8944 69.2058 8.04445 74.0077 3.2 78.8095Z" fill="white"/>
                        <path class="cls-1 smHeaderLogoClass" d="M40.9278 108H36.4778V87.8521H15.6167V83.3638H40.9223V108H40.9278Z" fill="white"/>
                        <path class="cls-1 smHeaderLogoClass" d="M27.361 30.8682H31.9277V55.5209H6.60547V51.0876H27.361V30.8737V30.8682Z" fill="white"/>
                        <path class="cls-1 smHeaderLogoClass" d="M37.5444 77.6214V53.0127H42.0611V73.1606H62.9111V77.6214H37.5444Z" fill="white"/>
                        <path class="cls-1 smHeaderLogoClass" d="M53.9165 42.1605C51.9609 43.3266 50.3998 43.2606 49.322 42.023C48.1609 40.6919 48.1276 38.5687 49.2387 37.2156C50.322 35.901 51.8054 35.802 53.8609 36.9296C53.8832 36.7261 53.9054 36.5336 53.9332 36.2916H55.422V37.7822C55.422 39.3058 55.4054 40.8294 55.4332 42.3475C55.4443 42.8205 55.3109 42.991 54.822 42.9635C54.2887 42.936 53.6832 43.0735 53.922 42.155L53.9165 42.1605ZM53.8943 39.5643C53.8943 37.8812 52.3554 36.8636 50.9776 37.6282C50.0887 38.1232 49.7054 39.3718 50.1054 40.4774C50.4054 41.3079 51.3943 41.9185 52.1943 41.77C53.272 41.5664 53.8998 40.7524 53.8998 39.5643H53.8943Z" fill="white"/>
                        <path class="cls-1 smHeaderLogoClass" d="M58.5945 40.1418V42.914H57.189V34.0034H58.5723V39.0583C59.2612 38.2552 59.8779 37.6117 60.389 36.8966C60.7612 36.3741 61.1779 36.1541 61.8056 36.2421C62.1334 36.2861 62.4723 36.2476 62.9612 36.2476C61.8723 37.4302 60.8834 38.4972 59.8779 39.5863C60.9001 40.6919 61.889 41.759 62.9945 42.9525C62.2723 42.9525 61.7279 42.991 61.2001 42.9305C61.0001 42.9085 60.8056 42.683 60.6501 42.5125C59.9945 41.7755 59.3556 41.0274 58.589 40.1418H58.5945Z" fill="white"/>
                        <path class="cls-1 smHeaderLogoClass" d="M40.9 43.0294C38.9166 43.0294 37.4722 41.6268 37.4944 39.6027C37.5166 37.386 39.0555 36.132 40.9277 36.132C42.9611 36.132 44.3166 37.5071 44.3944 39.4927C44.4666 41.2748 43.1611 43.0404 40.9 43.0294ZM39.0166 39.6302C39.0166 40.9393 39.7777 41.8029 40.9111 41.7863C42.0722 41.7698 42.9277 40.8128 42.9166 39.5477C42.9055 38.2661 42.0833 37.4025 40.9 37.4135C39.6944 37.43 39.0111 38.2331 39.0166 39.6302Z" fill="white"/>
                        <path class="cls-1 smHeaderLogoClass" d="M44.4609 46.0547C44.4609 45.7907 44.4609 45.5487 44.4609 45.3122C44.4609 45.1746 44.4887 45.0426 44.4998 44.9216C44.5609 44.8886 44.5943 44.8501 44.6276 44.8501C45.3498 44.7841 45.7109 44.3918 45.7109 43.673C45.7109 41.4289 45.7109 39.1902 45.7109 36.9461C45.7109 36.7316 45.7109 36.517 45.7109 36.275H47.1665C47.1665 36.4895 47.1665 36.7041 47.1665 36.9131C47.1665 39.2122 47.122 41.5169 47.1832 43.8161C47.222 45.4222 46.5665 46.2692 44.4609 46.0492V46.0547Z" fill="white"/>
                        <path class="cls-1 smHeaderLogoClass" d="M47.3557 34.4819C47.3724 34.9989 46.9946 35.3949 46.4613 35.4004C45.9335 35.4114 45.5168 35.0374 45.4946 34.5369C45.478 34.0584 45.9002 33.6183 46.4002 33.6018C46.9113 33.5853 47.3335 33.9758 47.3502 34.4819H47.3557Z" fill="white"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_137_154">
                        <rect width="63" height="108" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </a>
        </div>
        <?php if(isset($_COOKIE["user_id"])) { ?>
            <div class="cursor-pointer" onclick="logout(event)">
                <svg width="30" height="30" viewBox="0 0 96 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_283_430)">
                <path id="mobileLogOutIcon" fill="white" d="M68 28L62.36 33.64L72.68 44H32V52H72.68L62.36 62.32L68 68L88 48L68 28ZM16 20H48V12H16C11.6 12 8 15.6 8 20V76C8 80.4 11.6 84 16 84H48V76H16V20Z" fill="black"/>
                </g>
                <defs>
                <clipPath id="clip0_283_430">
                <rect width="90" height="90" fill="white"/>
                </clipPath>
                </defs>
                </svg>
            </div>
        <?php }else{ ?>
            <div class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#openModal">
                <svg id="mobileLoginIcon" xmlns="http://www.w3.org/2000/svg" width="D" height="30" viewBox="0 0 24 24" fill="white">
                    <!-- Head -->
                    <circle cx="12" cy="8" r="4" />
                    <!-- Body -->
                    <path d="M12 14c-4 0-8 2-8 4v2h16v-2c0-2-4-4-8-4z" />
                </svg>
            </div>
        <?php } ?>
        
    </div>
</header>


<!-- LG HEADER SECTION -->
<header class="fixed-top for-lg bg-transparent text-white fw-bold" id="lg-header" >
    <!-- toggle menu -->
    <div id="lg-header-toggle-div" class=" mh-100 fixed-top z-3 d-flex flex-column bg-black text-white" style="width:211px; height: -webkit-fill-available; transform: translateX(-100vh); transition: transform 0.8s ease-in-out;">
        <!-- close button -->
        <div class="d-flex justify-content-end " data-bs-theme="dark">
            <div type="button" class="btn-close btn-white p-3 cursor-pointer" aria-label="Close" onclick="closeToggleDiv()"></div>
        </div>
        <!-- logo -->
        <div class="d-flex justify-content-center pt-70 cursor-pointer" >
            <a href="/">
                <svg width="63" height="108" viewBox="0 0 63 108" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_137_154)">
                    <path d="M36.6499 29.3665C35.9777 28.0189 35.3277 26.7153 34.6499 25.3622C37.561 23.8496 39.5388 21.578 40.4332 18.4428C41.0832 16.1601 40.9777 13.8885 40.1388 11.6663C38.3943 7.05148 33.8999 4.30679 29.2721 4.5268C24.011 4.77432 20.0388 8.44308 18.9832 12.9204C17.7499 18.1292 20.2832 23.2886 25.3777 25.6153C24.7943 26.9629 24.211 28.3105 23.6277 29.6525C19.2888 28.1839 13.761 22.7056 14.1277 14.7795C14.4666 7.288 20.0999 1.19357 27.4721 0.165001C35.9888 -1.02308 43.0555 4.37829 44.9166 11.6828C46.8388 19.2128 42.9443 26.4183 36.6443 29.372L36.6499 29.3665Z" fill="white"/>
                    <path d="M3.2 78.8095C2.05 77.6709 1.01111 76.6369 0 75.6413C5.9 69.8109 11.8444 63.9365 17.7389 58.1116C23.6833 63.997 29.7 69.9429 35.6722 75.8558C34.6722 76.8514 33.6333 77.8854 32.5833 78.925C27.7 74.0902 22.7667 69.2058 17.8278 64.316C12.8944 69.2058 8.04445 74.0077 3.2 78.8095Z" fill="white"/>
                    <path d="M40.9278 108H36.4778V87.8521H15.6167V83.3638H40.9223V108H40.9278Z" fill="white"/>
                    <path d="M27.361 30.8682H31.9277V55.5209H6.60547V51.0876H27.361V30.8737V30.8682Z" fill="white"/>
                    <path d="M37.5444 77.6214V53.0127H42.0611V73.1606H62.9111V77.6214H37.5444Z" fill="white"/>
                    <path d="M53.9165 42.1605C51.9609 43.3266 50.3998 43.2606 49.322 42.023C48.1609 40.6919 48.1276 38.5687 49.2387 37.2156C50.322 35.901 51.8054 35.802 53.8609 36.9296C53.8832 36.7261 53.9054 36.5336 53.9332 36.2916H55.422V37.7822C55.422 39.3058 55.4054 40.8294 55.4332 42.3475C55.4443 42.8205 55.3109 42.991 54.822 42.9635C54.2887 42.936 53.6832 43.0735 53.922 42.155L53.9165 42.1605ZM53.8943 39.5643C53.8943 37.8812 52.3554 36.8636 50.9776 37.6282C50.0887 38.1232 49.7054 39.3718 50.1054 40.4774C50.4054 41.3079 51.3943 41.9185 52.1943 41.77C53.272 41.5664 53.8998 40.7524 53.8998 39.5643H53.8943Z" fill="white"/>
                    <path d="M58.5945 40.1418V42.914H57.189V34.0034H58.5723V39.0583C59.2612 38.2552 59.8779 37.6117 60.389 36.8966C60.7612 36.3741 61.1779 36.1541 61.8056 36.2421C62.1334 36.2861 62.4723 36.2476 62.9612 36.2476C61.8723 37.4302 60.8834 38.4972 59.8779 39.5863C60.9001 40.6919 61.889 41.759 62.9945 42.9525C62.2723 42.9525 61.7279 42.991 61.2001 42.9305C61.0001 42.9085 60.8056 42.683 60.6501 42.5125C59.9945 41.7755 59.3556 41.0274 58.589 40.1418H58.5945Z" fill="white"/>
                    <path d="M40.9 43.0294C38.9166 43.0294 37.4722 41.6268 37.4944 39.6027C37.5166 37.386 39.0555 36.132 40.9277 36.132C42.9611 36.132 44.3166 37.5071 44.3944 39.4927C44.4666 41.2748 43.1611 43.0404 40.9 43.0294ZM39.0166 39.6302C39.0166 40.9393 39.7777 41.8029 40.9111 41.7863C42.0722 41.7698 42.9277 40.8128 42.9166 39.5477C42.9055 38.2661 42.0833 37.4025 40.9 37.4135C39.6944 37.43 39.0111 38.2331 39.0166 39.6302Z" fill="white"/>
                    <path d="M44.4609 46.0547C44.4609 45.7907 44.4609 45.5487 44.4609 45.3122C44.4609 45.1746 44.4887 45.0426 44.4998 44.9216C44.5609 44.8886 44.5943 44.8501 44.6276 44.8501C45.3498 44.7841 45.7109 44.3918 45.7109 43.673C45.7109 41.4289 45.7109 39.1902 45.7109 36.9461C45.7109 36.7316 45.7109 36.517 45.7109 36.275H47.1665C47.1665 36.4895 47.1665 36.7041 47.1665 36.9131C47.1665 39.2122 47.122 41.5169 47.1832 43.8161C47.222 45.4222 46.5665 46.2692 44.4609 46.0492V46.0547Z" fill="white"/>
                    <path d="M47.3557 34.4819C47.3724 34.9989 46.9946 35.3949 46.4613 35.4004C45.9335 35.4114 45.5168 35.0374 45.4946 34.5369C45.478 34.0584 45.9002 33.6183 46.4002 33.6018C46.9113 33.5853 47.3335 33.9758 47.3502 34.4819H47.3557Z" fill="white"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_137_154">
                    <rect width="63" height="108" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>
            </a>
        </div>
        <!-- menu -->
        <div class="d-flex justify-content-center text-center cursor-pointer pt-15" >
            <div class="d-felx mt-4 g-3" style="list-style: none;">
                <?php if(isset($_COOKIE["user_id"])) { ?>
                    <a class="mt-2 nav-link toggle-header-menu " href="/my/home">마이페이지</a>
                <?php } ?>

                <a class="mt-2 nav-link toggle-header-menu <?=$lgBrandUrl?>" href="/brand">브랜드</a>
                <a class="mt-2 nav-link toggle-header-menu <?=$lgGalleryUrl?>" href="/gallery?pageIndex=1">작품</a>
                <div onmouseenter="showcommunitydiv('sm-header-community-submenu')"  onmouseleave="hidecommunitydiv('sm-header-community-submenu')">
                    <span class="mt-2 nav-link toggle-header-menu" >커뮤니티</span>
                    <div id="sm-header-community-submenu" class="hide-y-gradually mt-2 ">
                        <a class="nav-link cursor-hover <?=$lgNoticeUrl?>" id="lgToggleCommunityNotice">공지사항</a>
                        <a class="nav-link cursor-hover <?=$lgEventUrl?> mt-2" id="lgToggleCommunityEvent">이벤트</a>
                        <a class="nav-link cursor-hover <?=$lgQnaUrl?> mt-2" id="lgToggleCommunityQna">Q&A</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg px-5">
    <!-- align-items-start  pt-5 header-inner-wrapper  align-items-center  -->
        <div class="w-100 d-flex justify-content-between  pt-5" id="header-inner-wrapper" > 
            <!-- 메뉴 -->
            <div class="d-flex gx-3 gap-4">
                <!-- toggle -->
                <a class="nav-link cursor-pointer" aria-current="page" onclick="openToggleDiv(event)">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path id="lg-header-menu-icon" d="M5 6H12H19M5 12H19M5 18H19" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </a>
                
                <a class="nav-link cursor-hover <?=$lgBrandUrl?>" aria-current="page" href="/brand">브랜드</a>
                <a class="nav-link cursor-hover <?=$lgGalleryUrl?>" href="/gallery?pageIndex=1">작품</a>
                <div class="position-relative nav-link cursor-hover nav-link cursor-pointer"  onmouseenter="showcommunitydiv('lg-header-community-submenu')"  onmouseleave="hidecommunitydiv('lg-header-community-submenu')">
                    커뮤니티
                    <div id="lg-header-community-submenu" class="position-absolute d-flex gap-4 hide-x-gradually" style="top:0px; padding-left:80px;">
                        <a class="nav-link cursor-hover <?=$lgNoticeUrl?>" id="lgCommunityNotice">공지사항</a>
                        <a class="nav-link cursor-hover <?=$lgEventUrl?>" id="lgCommunityEvent">이벤트</a>
                        <a class="nav-link cursor-hover <?=$lgQnaUrl?> " id="lgCommunityQna">Q&A</a>
                    </div>
                </div>
            </div>
            
            <!-- 로고 -->
            <div class="d-flex navbar-brand " style="margin-left:<?=isset($_COOKIE["user_id"]) ? '100px' : '0'?>;">
                <a  href="/" id="white-header-scroll-logo"  class="text-black hide-item" style="text-decoration: none;">OJAK</a>
                <a href="/" id="white-header-logo" >
                    <svg data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="90" height="150" viewBox="0 0 543.16 940.44">
                        <g id="lg-header-logo-white">
                            <path class="cls-1" fill="white" d="M315.95,255.73c-5.8-11.72-11.42-23.09-17.25-34.86,25.11-13.17,42.16-32.96,49.87-60.27,5.62-19.9,4.7-39.66-2.54-58.99-15.05-40.19-53.8-64.08-93.7-62.18-45.34,2.16-79.6,34.12-88.72,73.09-10.61,45.37,11.2,90.3,55.11,110.53-5.02,11.71-10.05,23.45-15.07,35.17-37.38-12.81-85.06-60.5-81.92-129.5C124.7,63.44,173.3,10.41,236.86,1.44c73.45-10.37,134.35,36.7,150.41,100.27,16.57,65.59-17,128.33-71.32,154.02Z"/>
                            <path class="cls-1" fill="white" d="M27.57,686.26c-9.9-9.92-18.89-18.91-27.57-27.61,50.88-50.79,102.12-101.93,152.91-152.64,51.27,51.23,103.11,103.04,154.61,154.5-8.63,8.67-17.59,17.67-26.61,26.72-42.09-42.08-84.62-84.62-127.21-127.21-42.53,42.56-84.32,84.39-126.13,126.23Z"/>
                            <path class="cls-1" fill="white" d="M352.83,940.44h-38.36v-175.45h-179.81v-39.06h218.18v214.51Z"/>
                            <path class="cls-1" fill="white"  d="M235.88,268.78h39.39v214.66H56.94v-38.62h178.94v-176.03Z"/>
                            <path class="cls-1" fill="white"  d="M323.7,675.9v-214.3h38.92v175.46h179.77v38.84h-218.69Z"/>
                            <path class="cls-1" fill="white" d="M464.84,367.14c-16.84,10.14-30.31,9.59-39.59-1.19-9.99-11.59-10.31-30.1-.71-41.87,9.34-11.45,22.14-12.29,39.83-2.48.2-1.78.38-3.46.61-5.56h12.82v12.99c0,13.26-.15,26.51.09,39.76.07,4.1-1.06,5.6-5.28,5.36-4.58-.26-9.8.96-7.78-7.02ZM464.62,344.53c-.04-14.65-13.29-23.53-25.16-16.87-7.66,4.29-10.96,15.19-7.53,24.83,2.57,7.21,11.12,12.56,18,11.26,9.3-1.76,14.72-8.84,14.69-19.21Z"/>
                            <path class="cls-1" fill="white" d="M505.18,349.55v24.15h-12.12v-77.61h11.95v44.03c5.92-7.01,11.25-12.6,15.69-18.83,3.22-4.53,6.8-6.44,12.22-5.72,2.84.38,5.77.07,9.97.07-9.4,10.28-17.91,19.59-26.58,29.08,8.81,9.61,17.32,18.91,26.87,29.33-6.23,0-10.91.34-15.49-.17-1.71-.19-3.42-2.15-4.74-3.65-5.65-6.41-11.15-12.95-17.75-20.67Z"/>
                            <path class="cls-1" fill="white" d="M352.59,374.67c-17.08.03-29.55-12.23-29.37-29.86.2-19.32,13.44-30.22,29.62-30.23,17.53-.02,29.2,11.99,29.88,29.28.61,15.53-10.65,30.89-30.13,30.81ZM336.36,345.08c.04,11.4,6.58,18.91,16.33,18.77,10-.14,17.39-8.48,17.29-19.51-.1-11.15-7.16-18.69-17.4-18.56-10.39.13-16.27,7.13-16.22,19.3Z"/>
                            <path class="cls-1" fill="white" d="M383.32,401.03c0-2.32-.04-4.39.02-6.45.03-1.19.22-2.37.32-3.41.53-.31.81-.6,1.12-.63q9.32-.86,9.33-10.27c0-19.52,0-39.04,0-58.55,0-1.87,0-3.74,0-5.85h12.56c0,1.89,0,3.73,0,5.57,0,20.04-.36,40.09.12,60.12.34,13.99-5.33,21.36-23.46,19.47Z"/>
                            <path class="cls-1" fill="white" d="M408.24,300.26c.15,4.51-3.13,7.93-7.7,8.02-4.56.09-8.14-3.16-8.31-7.54-.17-4.18,3.5-8.01,7.81-8.16,4.39-.16,8.05,3.28,8.2,7.68Z"/>
                        </g>
                        <g id="lg-header-logo-black" class="hide-item">
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
                </a>
            </div>

            <div class="d-flex gx-3 gap-4">
                <?php if(isset($_COOKIE["user_id"])) { ?>
                    <a class="nav-link cursor-pointer hover-underline fs-6" href="" onclick="logout(event)">로그아웃</a>
                    <a class="nav-link cursor-hover hover-underline" href="/my/home">마이페이지</a>
                <?php }else{ ?>
                    <!-- <a class="nav-link cursor-pointer mt-2 fs-6" data-bs-toggle="modal" data-bs-target="#login-modal">로그인</a> -->
                    <a class="nav-link cursor-pointer hover-underline fs-6" data-bs-toggle="modal" data-bs-target="#openModal" >로그인</a>
                <?php } ?>
                <!-- naver blog -->
                <svg id="headerNaverLogo" class="cursor-pointer" width="29" height="30" viewBox="0 0 29 30"  xmlns="http://www.w3.org/2000/svg" >
                    <path class="scrollIcon" fill="#fff" d="M6.96927 12.3663C6.67963 12.3663 6.42217 12.4844 6.22907 12.7037C6.01989 12.9229 5.92334 13.1928 5.92334 13.5133C5.92334 13.8337 6.01989 14.0867 6.22907 14.3229C6.43826 14.5421 6.67963 14.6602 6.96927 14.6602C7.25891 14.6602 7.51637 14.5421 7.72556 14.3229C7.93475 14.1036 8.04738 13.8337 8.04738 13.5133C8.04738 13.1928 7.93475 12.9229 7.72556 12.7037C7.51637 12.4675 7.275 12.3663 6.96927 12.3663Z" fill="white"/>
                    <path class="scrollIcon" fill="#fff" d="M15.9966 12.3491C15.707 12.3491 15.4495 12.4672 15.2564 12.6865C15.0472 12.9057 14.9507 13.1756 14.9507 13.496C14.9507 13.8165 15.0472 14.0695 15.2564 14.3056C15.4656 14.5249 15.707 14.643 15.9966 14.643C16.2863 14.643 16.5437 14.5249 16.7529 14.3056C16.9621 14.0864 17.0747 13.8165 17.0747 13.496C17.0747 13.1756 16.9621 12.9226 16.7529 12.6865C16.5598 12.4503 16.3023 12.3491 15.9966 12.3491Z" fill="white"/>
                    <path class="scrollIcon" fill="#fff" d="M22.0308 12.3663C21.7412 12.3663 21.4837 12.4844 21.2906 12.7037C21.0814 12.9229 20.9849 13.1928 20.9849 13.5133C20.9849 13.8337 21.0814 14.0867 21.2906 14.3229C21.4998 14.5421 21.7412 14.6602 22.0308 14.6602C22.3204 14.6602 22.5779 14.5421 22.7871 14.3229C22.9963 14.1036 23.1089 13.8337 23.1089 13.5133C23.1089 13.1928 22.9963 12.9229 22.7871 12.7037C22.5779 12.4675 22.3204 12.3663 22.0308 12.3663Z" fill="white"/>
                    <path class="scrollIcon" fill="#fff" d="M24.702 4.03418H4.29835C2.7375 4.03418 1.4502 5.38351 1.4502 7.01956V19.1129C1.4502 20.7489 2.7375 22.0983 4.29835 22.0983H12.3118C12.3118 22.0983 13.8565 26.5342 14.4197 26.5342C14.9829 26.5342 16.6564 22.0983 16.6564 22.0983H24.702C26.2629 22.0983 27.5502 20.7489 27.5502 19.1129V7.01956C27.5502 5.38351 26.2629 4.03418 24.702 4.03418ZM9.02917 15.1998C8.62689 15.6721 7.99933 15.8745 7.3235 15.8745C6.71203 15.8745 6.26148 15.689 5.93965 15.4191H5.92356V15.7564H4.39489V8.75682H5.92356V11.4386H5.95574C6.37412 11.0675 6.92122 10.9495 7.56487 10.9157C8.11197 10.8989 8.69126 11.2531 9.04526 11.6747C9.38318 12.0964 9.64064 12.7542 9.64064 13.4795C9.64064 14.2722 9.44755 14.7276 9.02917 15.1998ZM12.3279 15.8239H10.767C10.767 15.8239 10.767 12.147 10.767 11.4892C10.767 10.4941 10.0107 10.3591 10.0107 10.3591V8.62189C10.0107 8.62189 12.1991 8.75682 12.3279 11.5398C12.3279 12.3325 12.3279 15.8239 12.3279 15.8239ZM18.4586 14.4915C18.3299 14.8119 18.1368 15.0818 17.8794 15.3348C17.638 15.5709 17.3483 15.7564 17.0265 15.8914C16.7047 16.0263 16.3668 16.0938 16.0128 16.0938C15.6588 16.0938 15.3209 16.0263 15.0151 15.8914C14.6933 15.7564 14.4036 15.5709 14.1623 15.3348C13.9048 15.0818 13.7117 14.795 13.583 14.4915C13.4543 14.1879 13.3899 13.8505 13.3899 13.4963C13.3899 13.1421 13.4543 12.8217 13.583 12.5012C13.7117 12.1976 13.9048 11.9109 14.1623 11.6579C14.4197 11.4217 14.6933 11.2362 15.0151 11.1013C15.3369 10.9663 15.6749 10.8989 16.0128 10.8989C16.3668 10.8989 16.7047 10.9663 17.0265 11.1013C17.3483 11.2362 17.638 11.4217 17.8794 11.6579C18.1368 11.9109 18.3138 12.1807 18.4586 12.5012C18.5874 12.8217 18.6517 13.1421 18.6517 13.4963C18.6517 13.8505 18.5874 14.171 18.4586 14.4915ZM24.6055 15.183C24.6055 16.4142 24.3802 17.1564 23.8653 17.6792C23.2377 18.3033 22.3527 18.337 21.6125 18.2358V16.9708C22.2401 17.0383 23.0929 16.5998 23.0929 15.7564V15.436H23.0768C22.7228 15.942 22.224 16.1275 21.5321 16.1275C20.9045 16.1275 20.3574 15.8914 19.9873 15.436C19.6172 14.9806 19.4402 14.3734 19.4402 13.6144C19.4402 12.7542 19.6494 12.0795 20.0517 11.5735C20.47 11.0675 21.0493 10.8314 21.7252 10.8314C22.3205 10.8314 22.7067 10.9832 23.0768 11.3374H23.0929V10.9495H24.6216V15.183H24.6055Z" fill="white"/>
                </svg>

                <!-- instagram icon href="https://www.instagram.com/ko_jeong_suk/" -->
                <svg id="headerInstaLogo" class="cursor-pointer" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" >
                    <path class="scrollIcon" fill="#fff"id="lg-header-insta-icon1" d="M14.9998 11.0419C12.8602 11.0419 11.0415 12.8606 11.0415 15.0002C11.0415 17.1398 12.8602 18.9585 14.9998 18.9585C17.1395 18.9585 18.9582 17.1398 18.9582 15.0002C18.9582 12.8606 17.1395 11.0419 14.9998 11.0419Z" fill="white"/>
                    <path class="scrollIcon" fill="#fff"id="lg-header-insta-icon2" d="M20.0739 3.125H10.0341C6.14773 3.125 3.125 6.14773 3.125 9.92614V19.9659C3.125 23.8523 6.14773 26.875 10.0341 26.875H20.0739C23.8523 26.875 26.875 23.8523 26.875 19.9659V9.92614C26.875 6.14773 23.8523 3.125 20.0739 3.125ZM15 21.2614C11.5455 21.2614 8.84659 18.4545 8.84659 15.108C8.84659 11.7614 11.5455 8.84659 15 8.84659C18.4545 8.84659 21.1534 11.6534 21.1534 15C21.1534 18.3466 18.4545 21.2614 15 21.2614ZM21.3693 10.142C20.6136 10.142 19.9659 9.49432 19.9659 8.73864C19.9659 7.98295 20.6136 7.33523 21.3693 7.33523C22.125 7.33523 22.7727 7.98295 22.7727 8.73864C22.7727 9.49432 22.125 10.142 21.3693 10.142Z" fill="white"/>
                </svg>

                <!-- youtube -->
                <!-- <svg class="cursor-pointer" width="29" height="30" viewBox="0 0 29 30"  xmlns="http://www.w3.org/2000/svg">
                    <path class="scrollIcon" fill="#fff" fill-rule="evenodd" clip-rule="evenodd" d="M24.8892 5.89461C26.0334 6.20992 26.9337 7.14616 27.2385 8.33949C27.7918 10.4982 27.7871 14.9998 27.7871 14.9998C27.7871 14.9998 27.7871 19.5015 27.2338 21.6602C26.929 22.8487 26.0287 23.7849 24.8845 24.1051C22.8119 24.6823 14.4978 24.6823 14.4978 24.6823C14.4978 24.6823 6.18379 24.6823 4.11114 24.1051C2.96696 23.7897 2.06663 22.8535 1.76183 21.6602C1.2085 19.5015 1.2085 14.9998 1.2085 14.9998C1.2085 14.9998 1.2085 10.4982 1.76652 8.33464C2.07132 7.14616 2.97165 6.20992 4.11583 5.88976C6.18848 5.3125 14.5025 5.3125 14.5025 5.3125C14.5025 5.3125 22.8119 5.3125 24.8892 5.89461ZM18.7322 14.9999L11.7827 10.9105V19.0892L18.7322 14.9999Z" fill="white"/>
                </svg> -->


            </div>

        </div>
    </nav> 
</header>

<!-- Dim background -->



<script>

    function showcommunitydiv(id){
        const communitySubMenu = document.getElementById(id);

        if(communitySubMenu){
            if(id.includes('lg')){
                communitySubMenu.classList.add('visible-x-gradually');
            }else{
                communitySubMenu.classList.add('visible-y-gradually');
            }

            if(id.includes('mobile')){
                const communityPlus = document.getElementById('mobileCommunityPlus');
                const communityMinus = document.getElementById('mobileCommunityMinus');

                communityPlus.classList.add("hide-item");
                communityMinus.classList.remove("hide-item");
            }
        }
    }

    function hidecommunitydiv(id){
        const communitySubMenu = document.getElementById(id);

        if(communitySubMenu){
            if(id.includes('lg')){
                communitySubMenu.classList.remove('visible-x-gradually');
            }else{
                communitySubMenu.classList.remove('visible-y-gradually');
            }

            //모바일 커뮤니티 설정
            if(id.includes('mobile')){
                const communityPlus = document.getElementById('mobileCommunityPlus');
                const communityMinus = document.getElementById('mobileCommunityMinus');
                communityMinus.classList.add("hide-item");
                communityPlus.classList.remove("hide-item");
            }
        }
    }

    function logout(event) {
        turnOnLoadingScreen();
        
        event.preventDefault();

        eraseCookie('user_id');
        eraseCookie('user_email');
        eraseCookie('user_name');

        location.reload();
    }

    const smToggleDiv = document.getElementById('sm-header-toggle-div');
    function openToggleDivSm(event){
        event.preventDefault();

        if(smToggleDiv){
            smToggleDiv.style.transform = "translateX(0vh)"; 
        }
    }

    

    function openToggleDiv(event){
        event.preventDefault();

        const lgToggleDiv = document.getElementById('lg-header-toggle-div');
        if(lgToggleDiv){
            lgToggleDiv.style.transform = "translateX(0vh)"; 
        }
    }

    function closeToggleDiv(){
        const lgToggleDiv = document.getElementById('lg-header-toggle-div');
        if(lgToggleDiv){
            lgToggleDiv.style.transform = "translateX(-100vh)"; 
        }
    }

    function closeToggleDivSm(){
        const lgToggleDiv = document.getElementById('sm-header-toggle-div');
        if(lgToggleDiv){
            lgToggleDiv.style.transform = "translateX(-100vh)"; 
        }
    }

    function makeBlackHeader(
            lgHeader, 
            menuIcon, 
            scrollIconClass, 
            headerLogo, 
            headerScrollLogo, 
            innerWrapper, 
            headerLgBlakcLogo, 
            headerLgWhiteLogo, 
            headerLogoClass,
        ){
        //adjust padding
        innerWrapper.classList.remove("align-items-center");
        innerWrapper.classList.add("align-items-start");
        innerWrapper.classList.add("pt-5");

        lgHeader.classList.remove("bg-light");
        lgHeader.classList.add("bg-transparent");

        lgHeader.classList.remove("text-white");
        lgHeader.classList.add("text-black");

        // smHeader.classList.remove("hide-item");
        // smScrollHeader.classList.add("hide-item");

        //setting large header
        headerLgWhiteLogo.classList.add("hide-item");
        headerScrollLogo.classList.add("hide-item");
        headerLogo.classList.remove("hide-item");
        headerLgBlakcLogo.classList.remove("hide-item");

        if (menuIcon) {
            menuIcon.setAttribute("stroke", "black"); 
        }

        if (headerLogoClass) {
            Array.from(headerLogoClass).forEach( el => {
                el.setAttribute("fill", "black"); 
            });
        }

        if (scrollIconClass) {
            Array.from(scrollIconClass).forEach( el => {
                el.setAttribute("fill", "black"); 
            });
        }

        const smHeaderMenuIcon = document.getElementById("smHeaderMenuIcon");
        const smHeader = document.getElementById("smHeader");
        const smHeaderLogoClass = document.getElementsByClassName("smHeaderLogoClass");
        const mobileLoginIcon =document.getElementById("mobileLoginIcon");
        const mobileLogOutIcon =document.getElementById("mobileLogOutIcon");
        if(mobileLoginIcon) mobileLoginIcon.setAttribute("fill", "black");
        if(mobileLogOutIcon) mobileLogOutIcon.setAttribute("fill", "black");
        
        smHeaderMenuIcon.setAttribute("stroke", "black");
        smHeader.classList.remove("bg-light");
        smHeader.classList.add("bg-transparent"); 
        if (smHeaderLogoClass) {
            Array.from(smHeaderLogoClass).forEach( el => {
                el.classList.remove("cls-1");
                el.classList.add("cls-7");
            });
        }

    }
    
    function makeWhiteHeader(
        lgHeader,
         menuIcon, 
         scrollIconClass, 
         headerLogo, 
         headerScrollLogo, 
         innerWrapper, 
         headerLgBlakcLogo, 
         headerLgWhiteLogo,
        ){
        innerWrapper.classList.remove("align-items-center");
        innerWrapper.classList.add("align-items-start");
        innerWrapper.classList.add("pt-5");

        lgHeader.classList.remove("bg-light");
        lgHeader.classList.remove("text-black");

        lgHeader.classList.add("bg-transparent");
        lgHeader.classList.add("text-white");

        //setting header
        headerLgWhiteLogo.classList.remove("hide-item");
        headerLogo.classList.remove("hide-item");
        headerLgBlakcLogo.classList.add("hide-item");
        headerScrollLogo.classList.add("hide-item");

        // smHeader.classList.remove("hide-item");
        // smScrollHeader.classList.add("hide-item");
        const smHeaderMenuIcon = document.getElementById("smHeaderMenuIcon");
        const smHeader = document.getElementById("smHeader");
        const smHeaderLogoClass = document.getElementsByClassName("smHeaderLogoClass");
        const mobileLoginIcon =document.getElementById("mobileLoginIcon");
        const mobileLogOutIcon =document.getElementById("mobileLogOutIcon");
        if(mobileLoginIcon) mobileLoginIcon.setAttribute("fill", "white");
        if(mobileLogOutIcon) mobileLogOutIcon.setAttribute("fill", "white");

        smHeaderMenuIcon.setAttribute("stroke", "white");
        smHeader.classList.remove("bg-light");
        smHeader.classList.add("bg-transparent"); 
        if (smHeaderLogoClass) {
            Array.from(smHeaderLogoClass).forEach( el => {
                el.classList.remove("cls-7");
                el.classList.add("cls-1");
            });
        }


        if (menuIcon) {
            menuIcon.setAttribute("stroke", "white"); 
        }

        if (scrollIconClass) {
            Array.from(scrollIconClass).forEach( el => {
                el.setAttribute("fill", "white"); 
            });
        }
    }

    function makeScrolledHedaer(lgHeader, menuIcon, scrollIconClass, headerLogo, headerScrollLogo, innerWrapper){
        //adjust padding
        innerWrapper.classList.remove("align-items-start");
        innerWrapper.classList.remove("pt-5");
        innerWrapper.classList.add("align-items-center");

        lgHeader.classList.add("bg-light");
        lgHeader.classList.add("text-black");

        lgHeader.classList.remove("bg-transparent");
        lgHeader.classList.remove("text-white");
        
        headerLogo.classList.add("hide-item");
        headerScrollLogo.classList.remove("hide-item");

        // smHeader.classList.add("hide-item");
        // smScrollHeader.classList.remove("hide-item");

        if (menuIcon) {
            menuIcon.setAttribute("stroke", "black"); 
        }

        if (scrollIconClass) {
            Array.from(scrollIconClass).forEach( el => {
                el.setAttribute("fill", "black"); 
            });
        }

        const smHeaderMenuIcon = document.getElementById("smHeaderMenuIcon");
        const smHeader = document.getElementById("smHeader");
        const smHeaderLogoClass = document.getElementsByClassName("smHeaderLogoClass");
        const mobileLoginIcon =document.getElementById("mobileLoginIcon");
        const mobileLogOutIcon =document.getElementById("mobileLogOutIcon");
        if(mobileLoginIcon) mobileLoginIcon.setAttribute("fill", "black");
        if(mobileLogOutIcon) mobileLogOutIcon.setAttribute("fill", "black");
        smHeaderMenuIcon.setAttribute("stroke", "black");
        smHeader.classList.remove("bg-transparent"); 
        smHeader.classList.add("bg-light");
        if (smHeaderLogoClass) {
            Array.from(smHeaderLogoClass).forEach( el => {
                el.classList.remove("cls-1");
                el.classList.add("cls-7");
            });
        }

    }

    // script.js
    document.addEventListener("DOMContentLoaded", () => {
        //set mobile menu link
        const mobileNoticeMenu = document.getElementById("mobileNoticeMenu");
        const mobileEventMenu = document.getElementById("mobileEventMenu");
        const mobileQnaMenu = document.getElementById("mobileQnaMenu");

        mobileNoticeMenu.href = getAllUrl().communityNotice;
        mobileEventMenu.href = getAllUrl().communityEvent;
        mobileQnaMenu.href = getAllUrl().communityQna;

        //set lg header link
        const lgCommunityNotice = document.getElementById("lgCommunityNotice");
        const lgCommunityEvent = document.getElementById("lgCommunityEvent");
        const lgCommunityQna = document.getElementById("lgCommunityQna");

        lgCommunityNotice.href = getAllUrl().communityNotice;
        lgCommunityEvent.href = getAllUrl().communityEvent;
        lgCommunityQna.href = getAllUrl().communityQna;

        //set lg toggle header link
        const lgToggleCommunityNotice = document.getElementById("lgToggleCommunityNotice");
        const lgToggleCommunityEvent = document.getElementById("lgToggleCommunityEvent");
        const lgToggleCommunityQna = document.getElementById("lgToggleCommunityQna");
        lgToggleCommunityNotice.href = getAllUrl().communityNotice;
        lgToggleCommunityEvent.href = getAllUrl().communityEvent;
        lgToggleCommunityQna.href = getAllUrl().communityQna;

        //set header design
        const lgHeader = document.getElementById("lg-header");

        const menuIcon = document.getElementById("lg-header-menu-icon");
        const scrollIconClass = document.getElementsByClassName("scrollIcon");

        //logs
        const headerLogo = document.getElementById("white-header-logo");
        const headerScrollLogo = document.getElementById("white-header-scroll-logo");
        const headerLogoClass = document.getElementsByClassName("cls-1");
        const headerLgBlakcLogo = document.getElementById("lg-header-logo-black");
        const headerLgWhiteLogo = document.getElementById("lg-header-logo-white");

        // align-items-start  pt-5 
        const innerWrapper = document.getElementById("header-inner-wrapper");

        const href = window.location.href;
        const isBlackHeaderPage = href.includes('brand') || href.includes('gallery') || href.includes('community')

        //initial setting
        if(isBlackHeaderPage){
            makeBlackHeader(
                lgHeader, 
                menuIcon, 
                scrollIconClass, 
                headerLogo, 
                headerScrollLogo, 
                innerWrapper, 
                headerLgBlakcLogo, 
                headerLgWhiteLogo, 
                headerLogoClass
            );
        }

        //scroll menu setting
        if(href.includes("community/new") || href.includes("community/edit") || href.includes("auth/register-request-complete") || href.includes("contract") || href.includes("personalinfo")){
            makeScrolledHedaer(
                        lgHeader, 
                        menuIcon, 
                        scrollIconClass, 
                        headerLogo, 
                        headerScrollLogo, 
                        innerWrapper,
                    );
        }else{
            window.addEventListener("scroll", () => {
                if (window.scrollY > 50) { 
                    makeScrolledHedaer(
                        lgHeader, 
                        menuIcon, 
                        scrollIconClass, 
                        headerLogo, 
                        headerScrollLogo, 
                        innerWrapper,
                    );
                } else { 
                    if(isBlackHeaderPage){
                        makeBlackHeader(
                            lgHeader, 
                            menuIcon, 
                            scrollIconClass, 
                            headerLogo, 
                            headerScrollLogo, 
                            innerWrapper, 
                            headerLgBlakcLogo, 
                            headerLgWhiteLogo, 
                            headerLogoClass,
                        );
                    }else{
                        makeWhiteHeader(
                            lgHeader, 
                            menuIcon, 
                            scrollIconClass, 
                            headerLogo, 
                            headerScrollLogo, 
                            innerWrapper, 
                            headerLgBlakcLogo, 
                            headerLgWhiteLogo,
                        );
                    }
                }
        });
        }
        
    });

    

</script>

<?= view('/auth/login-modal') ?>
