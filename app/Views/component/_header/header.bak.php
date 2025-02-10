<?php
    $userId = 0;
    if(isset($_COOKIE['user_id'])){
        $userId = $_COOKIE['user_id'];
    }
    $isLoggedIn = isset($_COOKIE["user_id"]);

    //underline setting
    $currentUrl = $_SERVER['REQUEST_URI'];
    $lgBrandUrl = "hover-underline";
    $lgCommunityUrl = "hover-underline";
    $lgGalleryUrl = "hover-underline";
    $lgNoticeUrl = "hover-underline";
    $lgEventUrl = "hover-underline";
    $lgQnaUrl = "hover-underline";
    $lgLoginUrl = "hover-underline"; 
    $lgMypageUrl  = "hover-underline";

    if(strpos($currentUrl, 'brand')){
        $lgBrandUrl="text-decoration-underline";
    }
    if(strpos($currentUrl, 'gallery')){
        $lgGalleryUrl="text-decoration-underline";
    }
    //community/list/3
    if(strpos($currentUrl, 'community/notice')){
        $lgNoticeUrl="text-decoration-underline";
        $lgCommunityUrl = "text-decoration-underline";
    }
    if(strpos($currentUrl, 'community/event')){
        $lgCommunityUrl="text-decoration-underline";
        $lgEventUrl="text-decoration-underline";
    }
    if(strpos($currentUrl, 'community/qna')){
        $lgCommunityUrl="text-decoration-underline";
        $lgQnaUrl="text-decoration-underline";
    }

    if(strpos($currentUrl, 'my/')){
        $lgMypageUrl="text-decoration-underline";
    }
?>

    <!-- mobile header -webkit-fill-available;-->
    <div class="for-sm">
        <?= view('/component/_header/mobile', [
            'lgMypageUrl' => $lgMypageUrl,
            'lgBrandUrl' => $lgBrandUrl,
            'lgGalleryUrl' => $lgGalleryUrl,
            'lgCommunityUrl' => $lgCommunityUrl,
        ]) ?>
    </div>


    <!-- LG HEADER SECTION -->
    <div class="for-lg">
        <?= view('/component/_header/standard', [
            'lgMypageUrl' => $lgMypageUrl,
            'lgBrandUrl' => $lgBrandUrl,
            'lgGalleryUrl' => $lgGalleryUrl,
            'lgCommunityUrl' => $lgCommunityUrl,
            'lgNoticeUrl' => $lgNoticeUrl,
            'lgEventUrl' => $lgEventUrl,
            'lgQnaUrl' => $lgQnaUrl,
            'lgLoginUrl' => $lgLoginUrl,
            'lgMypageUrl' => $lgMypageUrl,
            'isLoggedIn' => $isLoggedIn
        ]) ?>
    </div>




<script>

    function showcommunitydiv(id){
        const communitySubMenu = document.getElementById(id);

        if(communitySubMenu){
            if(id.includes('lg')){
                communitySubMenu.classList.add('visible-y-gradually');
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
                communitySubMenu.classList.remove('visible-y-gradually');
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

        //community sub 설정
        const communitySubMenu = document.getElementById("lg-header-community-submenu");
        communitySubMenu.classList.remove("bg-light");
        communitySubMenu.classList.add("bg-dark");
        document.getElementById("lgCommunityNotice").classList.add("text-white");
        document.getElementById("lgCommunityEvent").classList.add("text-white");
        document.getElementById("lgCommunityQna").classList.add("text-white");
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

        //커뮤니티 아래 스크롤 색깔설정
        const communitySubMenu = document.getElementById("lg-header-community-submenu");
        document.getElementById("lgCommunityNotice").classList.remove("text-white");
        document.getElementById("lgCommunityEvent").classList.remove("text-white");
        document.getElementById("lgCommunityQna").classList.remove("text-white");
        communitySubMenu.classList.remove("bg-dark");
        communitySubMenu.classList.add("bg-light");

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

         //community sub 설정
         const communitySubMenu = document.getElementById("lg-header-community-submenu");
         document.getElementById("lgCommunityNotice").classList.add("text-white");
        document.getElementById("lgCommunityEvent").classList.add("text-white");
        document.getElementById("lgCommunityQna").classList.add("text-white");
        communitySubMenu.classList.remove("bg-light");
        communitySubMenu.classList.add("bg-dark");

    }

    

    // script.js
    document.addEventListener("DOMContentLoaded", () => {
        //set mobile menu link
        // const mobileNoticeMenu = document.getElementById("mobileNoticeMenu");
        // const mobileEventMenu = document.getElementById("mobileEventMenu");
        // const mobileQnaMenu = document.getElementById("mobileQnaMenu");

        // mobileNoticeMenu.href = getAllUrl().communityNotice;
        // mobileEventMenu.href = getAllUrl().communityEvent;
        // mobileQnaMenu.href = getAllUrl().communityQna;

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

        // //initial setting
        // if(isBlackHeaderPage){
        //     makeBlackHeader(
        //         lgHeader, 
        //         menuIcon, 
        //         scrollIconClass, 
        //         headerLogo, 
        //         headerScrollLogo, 
        //         innerWrapper, 
        //         headerLgBlakcLogo, 
        //         headerLgWhiteLogo, 
        //         headerLogoClass
        //     );
        // }

        // //scroll menu setting
        // if(href.includes("community/new") || href.includes("community/edit") || href.includes("auth/register-request-complete") || href.includes("contract") || href.includes("personalinfo")){
        //     makeScrolledHedaer(
        //                 lgHeader, 
        //                 menuIcon, 
        //                 scrollIconClass, 
        //                 headerLogo, 
        //                 headerScrollLogo, 
        //                 innerWrapper,
        //             );
        // }else{
        //     window.addEventListener("scroll", () => {

        //         const scrollHeader = docuemnt.getElementById("scrollHeaderWrapper");
        //         const blackLargetLogoHeader = docuemnt.getElementById("blackHeaderLgLogoWrapper");
        //         const blackSmallLogoHeader = docuemnt.getElementById("blackHeaderLgLogoWrapper");
        //         const whiteHeader = docuemnt.getElementById("whiteHeaderWrapper");

        //         if (window.scrollY > 50) { 

        //             makeScrolledHedaer(
        //                 lgHeader, 
        //                 menuIcon, 
        //                 scrollIconClass, 
        //                 headerLogo, 
        //                 headerScrollLogo, 
        //                 innerWrapper,
        //             );
        //         } else { 
        //             if(isBlackHeaderPage){
        //                 makeBlackHeader(
        //                     lgHeader, 
        //                     menuIcon, 
        //                     scrollIconClass, 
        //                     headerLogo, 
        //                     headerScrollLogo, 
        //                     innerWrapper, 
        //                     headerLgBlakcLogo, 
        //                     headerLgWhiteLogo, 
        //                     headerLogoClass,
        //                 );
        //             }else{
        //                 makeWhiteHeader(
        //                     lgHeader, 
        //                     menuIcon, 
        //                     scrollIconClass, 
        //                     headerLogo, 
        //                     headerScrollLogo, 
        //                     innerWrapper, 
        //                     headerLgBlakcLogo, 
        //                     headerLgWhiteLogo,
        //                 );
        //             }
        //         }
        // });
        // }
        
       

        makeDynamicHeader();

        const href = window.location.href;
        const isBlackLargeHeaderPage = href.includes('brand') ||  href.includes('community');
        const isBlackSmallHeaderPage = href.includes('gallery');
        const isScrollHeaderPage = href.includes("community/new") || href.includes("community/edit") || href.includes("auth/register-request-complete") || href.includes("contract") || href.includes("personalinfo");

        const scrollHeader = docuemnt.getElementById("scrollHeaderWrapper");
        const blackLargeLogoHeader = docuemnt.getElementById("blackHeaderLgLogoWrapper");
        const blackSmallLogoHeader = docuemnt.getElementById("blackHeaderSmLogoWrapper");
        const whiteHeader = docuemnt.getElementById("whiteHeaderWrapper");

        if(isScrollHeaderPage){
            blackLargeLogoHeader.style.visibility = "hidden";
            blackSmallLogoHeader.style.visibility = "hidden";
            whiteHeader.style.visibility = "hidden";

            scrollHeader.style.visibility = "visible";
        }else if(isBlackSmallHeaderPage){
            blackLargeLogoHeader.style.visibility = "hidden";
            whiteHeader.style.visibility = "hidden";
            scrollHeader.style.visibility = "hidden";

            blackSmallLogoHeader.style.visibility = "visible";
        }else if(isBlackLargeHeaderPage){
            blackSmallLogoHeader.style.visibility = "hidden";
            whiteHeader.style.visibility = "hidden";
            scrollHeader.style.visibility = "hidden";

            blackLargeLogoHeader.style.visibility = "visible";
        }else{
            blackLargeLogoHeader.style.visibility = "hidden";
            blackSmallLogoHeader.style.visibility = "hidden";
            scrollHeader.style.visibility = "hidden";

            whiteHeader.style.visibility = "visible";
        }

        window.addEventListener("scroll", () => {
            if (window.scrollY > 30) { 

            }
        });

        //gallery 만 로고 크기 줄이기
        const logo1 = document.getElementById('clip0_320_463');
            const logo2 = document.getElementById('clip0_320_464');
            const lgHeaderMiddleLogo = document.getElementById('lgHeaderMiddleLogo');

        if(href.includes('gallery')){
            logo1.style.width = 68.92;
            logo1.style.height = 117.45; 

            logo2.style.width = 68.92;
            logo2.style.height = 117.45;

            lgHeaderMiddleLogo.style.width = 68.92;
            lgHeaderMiddleLogo.style.height = 117.45;
        }else{
            logo1.style.width = 78.95;
            logo1.style.height = 134.551;

            logo2.style.width = 78.95;
            logo2.style.height = 134.551;

            lgHeaderMiddleLogo.style.width = 78.95;
            lgHeaderMiddleLogo.style.height = 134.551;
        }
        
    });
    
</script>

<?= view('/auth/login-modal') ?>
