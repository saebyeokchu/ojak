<header class="fixed-top bg-transparent text-white" id="lg-header" >
    <!-- toggle menu -->
    <?= view('/component/_header/_standard/toggle', [
        'lgMypageUrl' => $lgMypageUrl,
        'lgBrandUrl' => $lgBrandUrl,
        'lgGalleryUrl' => $lgGalleryUrl,
        'lgCommunityUrl' => $lgCommunityUrl,
        'lgNoticeUrl' => $lgNoticeUrl,
        'lgEventUrl' => $lgEventUrl,
        'lgQnaUrl' => $lgQnaUrl,
        'lgLoginUrl' => $lgLoginUrl,
        'lgMypageUrl' => $lgMypageUrl,
    ]) ?>
    
    <!-- top white header  -->
    <div id="whiteHeaderWrapper">
        <?= view('/component/_header/_standard/white', [
        'lgMypageUrl' => $lgMypageUrl,
        'lgBrandUrl' => $lgBrandUrl,
        'lgGalleryUrl' => $lgGalleryUrl,
        'lgCommunityUrl' => $lgCommunityUrl,
        'lgNoticeUrl' => $lgNoticeUrl,
        'lgEventUrl' => $lgEventUrl,
        'lgQnaUrl' => $lgQnaUrl,
        'lgLoginUrl' => $lgLoginUrl,
        'lgMypageUrl' => $lgMypageUrl,
        'isLoggedIn' => $isLoggedIn,
    ]) ?>
    </div>

    <!-- top black header (sm-logo)  -->
    <div id="blackHeaderSmLogoWrapper">
        <?= view('/component/_header/_standard/smLogoBlack', [
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

    <!-- top black header (lg-logo)  -->
    <div id="blackHeaderLgLogoWrapper">
        <?= view('/component/_header/_standard/lgLogoBlack', [
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

    <!-- top scroll header  -->
    <div id="scrollHeaderWrapper">
        <?= view('/component/_header/_standard/scroll', [
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
    
</header>

<script>

    function makeDynamicUrl(){
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
    }

    function makeScrollHeader(){
        console.log("[isScrollHeaderPage]");
        const scrollHeader = document.getElementById("scrollHeaderWrapper");
        const blackLargeLogoHeader = document.getElementById("blackHeaderLgLogoWrapper");
        const blackSmallLogoHeader = document.getElementById("blackHeaderSmLogoWrapper");
        const whiteHeader = document.getElementById("whiteHeaderWrapper")

        blackLargeLogoHeader.style.display = "none";
        blackSmallLogoHeader.style.display = "none";
        whiteHeader.style.display = "none";

        scrollHeader.style.display = "block";
    }

    function makeDynamicHeader(){
        const href = window.location.href;
        const isBlackLargeHeaderPage = href.includes('brand') ||  href.includes('community');
        const isBlackSmallHeaderPage = href.includes('gallery');
        const isScrollHeaderPage = href.includes("community/new") || href.includes("community/edit") || href.includes("auth/register-request-complete") || href.includes("contract") || href.includes("personalinfo");

        const scrollHeader = document.getElementById("scrollHeaderWrapper");
        const blackLargeLogoHeader = document.getElementById("blackHeaderLgLogoWrapper");
        const blackSmallLogoHeader = document.getElementById("blackHeaderSmLogoWrapper");
        const whiteHeader = document.getElementById("whiteHeaderWrapper");

        if(isScrollHeaderPage){
            makeScrollHeader();
        }else if(isBlackSmallHeaderPage){
            console.log("[isBlackSmallHeaderPage]");
            blackLargeLogoHeader.style.display = "none";
            whiteHeader.style.display = "none";
            scrollHeader.style.display = "none";

            blackSmallLogoHeader.style.display = "block";
        }else if(isBlackLargeHeaderPage){
            console.log("[isBlackLargeHeaderPage]");
            blackSmallLogoHeader.style.display = "none";
            whiteHeader.style.display = "none";
            scrollHeader.style.display = "none";

            blackLargeLogoHeader.style.display = "block";
        }else{
            console.log("[whiteHeader]");
            blackLargeLogoHeader.style.display = "none";
            blackSmallLogoHeader.style.display = "none";
            scrollHeader.style.display = "none";
            
            whiteHeader.style.display = "block";
        }
    }

    document.addEventListener("DOMContentLoaded", () => {
        //makeDynamicUrl();
        makeDynamicHeader();

        window.addEventListener("scroll", () => {
            if (window.scrollY > 30) { 
                makeScrollHeader();
            }else{
                makeDynamicHeader();
            }
        });
        
    });

</script>