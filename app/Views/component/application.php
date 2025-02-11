<!DOCTYPE html>
<html lang="en" translate="no">
<head>
    <meta charset="UTF-8">
    <title>오작 - 전통 한지의 현대적 재해석</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <meta name="description" content="오작(Ojak)은 전통과 현대적 감각을 결합한 창조적인 브랜드입니다. 다양한 공예품과 디자인을 만나보세요.">
    <meta name="keywords" content="오작, Ojak, 전통 공예, 디자인, 현대 공예, 한지">
    <meta name="author" content="Ojak">
    <meta name="robots" content="index, follow">

    <!-- Open Graph (SNS 공유용) -->
    <meta property="og:title" content="오작(Ojak) - 전통과 현대가 조화를 이루는 브랜드">
    <meta property="og:description" content="오작(Ojak)은 전통과 현대적 감각을 결합한 창조적인 브랜드입니다. 다양한 공예품과 디자인을 만나보세요.">
    <meta property="og:url" content="https://ojak.co.kr">
    
    <meta name="naver-site-verification" content="55d14f2064a5c0020f085ad8d741f211bf313c48" />

    <link itemprop="url" href="https://ojak.co.kr/">
    <a itemprop="sameAs" href="https://blog.naver.com/ojak_kjs"></a>
    <a itemprop="sameAs" href="https://www.instagram.com/ko_jeong_suk/"></a>
    </span>

    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- AOS - Scroll Anime -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/color.css">
    <link rel="stylesheet" href="/css/image.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link rel="stylesheet" href="/css/table.css">
    <link rel="stylesheet" href="/css/animation.css">
         
    <link href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css" rel="stylesheet"> <!-- pretandard -->
    <link href="https://hangeul.pstatic.net/hangeul_static/css/maru-buri.css" rel="stylesheet"> <!-- Maru Buri Font -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/moonspam/NanumSquareNeo@1.0/nanumsquareneo.css"> <!-- NanumSquareNeo -->

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/pell/dist/pell.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Helper js -->
    <script src="/js/common.js"></script>
    <script src="/js/gallery.js"></script>
    <script src="/js/post.js"></script>
    <script src="/js/event.js"></script>
</head>
<body class="position-relative" style="font-family: 'Pretendard', sans-serif!important;" >
    <div id="loading-screen" class="loading-screen hide-item">
        <div class="spinner-border text-light" role="status" aria-hidden="true"></div>
    </div>

    <!-- HEADER  -->
    <?= (isset($view_header) ? ( $view_header == true && view('/component/header') ) : view('/component/header') ) ?? '' ?> 

    <!-- CONTENT -->
    <?= ( isset($contents) ? view($yield, $contents) : view($yield) ) ?? '' ?>

    <!-- FOOTER -->
    <?= (isset($view_footer) ? ( $view_footer == true && view('/component/footer') ) : view('/component/footer') ) ?? '' ?>
<!--      
    <div class="position-absolute start-0 top-0 loading-spinner hide-item" style="width:100%;height:100%;background-color:rgb(0,0,0,0.3);z-index:9999;"></div>
    <div class="spinner-border position-absolute start-50 loading-spinner hide-item" style="top:100px;z-index:9999;" role="status" >
        <span class="visually-hidden">Loading...</span>
    </div> -->

    <!-- modals -->
    <?= view('/gallery/modal/update') ?>

    <!-- SCRIPTS -->
    <script>
        AOS.init();

        window.addEventListener('load', () => {
            document.body.classList.add('loaded');

            //get social info
            // axios.get('/api/getSocialInfo').then(function(response){
            //     if(response['data']['status']=='success'){
            //         const data = response['data']['data'];

            //         const headerNaverLogo = document.getElementById("headerNaverLogo");
            //         const headerInstaLogo = document.getElementById("headerInstaLogo");
            //         const headerYoutubeLogo = document.getElementById("headerYoutubeLogo");

            //         const footerNaverLogo = document.getElementById("footerNaverLogo");
            //         const footerInstaLogo = document.getElementById("footerInstaLogo");
            //         const footerYoutubeLogo = document.getElementById("footerYoutubeLogo");

            //         const footerNaverLogoLg = document.getElementById("footerNaverLogoLg");
            //         const footerInstaLogoLg = document.getElementById("footerInstaLogoLg");
            //         const footerYoutubeLogoLg = document.getElementById("footerYoutubeLogoLg");

            //         //headerNaverLogo headerInstaLogo footerNaverLogo footerInstaLogo
            //         // data.forEach(e => {
            //         //     switch(e.name){
            //         //         case "네이버 블로그" : {
            //         //             footerNaverLogo.onclick = () => window.open(
            //         //                                                 e.value,
            //         //                                                 '_blank' 
            //         //                                             );

            //         //             footerNaverLogoLg.onclick = () => window.open(
            //         //                                                 e.value,
            //         //                                                 '_blank' 
            //         //                                             );
                                
            //         //             //header
            //         //             headerNaverLogo.onclick = () => window.open(
            //         //                                                 e.value,
            //         //                                                 '_blank' 
            //         //                                             );
            //         //             break;
            //         //         }
            //         //         case "인스타그램" : {
            //         //             footerInstaLogo.onclick = () => window.open(
            //         //                                                 e.value,
            //         //                                                 '_blank' 
            //         //                                             );
                                                                
            //         //             footerInstaLogoLg.onclick = () => window.open(
            //         //                                                 e.value,
            //         //                                                 '_blank' 
            //         //                                             );

            //         //             headerInstaLogo.onclick = () => window.open(
            //         //                                                 e.value,
            //         //                                                 '_blank' 
            //         //                                             );
            //         //             break;
            //         //         }
            //         //         case "유튜브" : {
            //         //             footerYoutubeLogo.onclick = () => window.open(
            //         //                                                 e.value,
            //         //                                                 '_blank' 
            //         //                                             );
                                
            //         //             footerYoutubeLogoLg.onclick = () => window.open(
            //         //                                                 e.value,
            //         //                                                 '_blank' 
            //         //                                             );

            //         //             headerYoutubeLogo.onclick = () => window.open(
            //         //                                                 e.value,
            //         //                                                 '_blank' 
            //         //                                             );
            //         //             break;
            //         //         }
            //         //     }
            //         // });
            //     }
            // }).catch(function(error){
            //     console.log("error:", error);
            // });
                
        });

        // Function to show the loading screen
        function turnOnLoadingScreen() {
            const loadingScreen = document.getElementById('loading-screen');
            loadingScreen.classList.add('show-item');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }

        // Function to hide the loading screen
        function turnOffLoadingScreen() {
            const loadingScreen = document.getElementById('loading-screen');
            loadingScreen.classList.remove('show-item');
            document.body.style.overflow = ''; // Restore scrolling
        }

        //get socials

    </script>
    <!-- -->

</body>
</html>
