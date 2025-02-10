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
    function logout(event) {
        turnOnLoadingScreen();
        
        event.preventDefault();

        eraseCookie('user_id');
        eraseCookie('user_email');
        eraseCookie('user_name');

        location.reload();
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



</script>

<?= view('/auth/login-modal') ?>
