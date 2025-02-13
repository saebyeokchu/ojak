<nav class="navbar navbar-expand-lg flex   justify-content-center ">
            <div class="w-100 d-flex justify-content-between  pt-5" id="header-inner-wrapper" style="padding-left: 48px;padding-right: 48px; max-width:1440px;">  
                <!-- 메뉴 -->
                <div class="d-flex gx-3 gap-4">
                    <!-- toggle -->
                    <a class="nav-link cursor-pointer" aria-current="page" onclick="openToggleDiv(event)">
                        <svg width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path id="lg-header-menu-icon" d="M5 6H12H19M5 12H19M5 18H19" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </a>
                    
                    <a 
                        id="lgHeaderBrandText" 
                        class="nav-link cursor-hover <?=$lgBrandUrl?>" 
                        aria-current="page" 
                        href="/brand" >
                        브랜드
                    </a>
                    <a 
                        id="lgHeaderGalleryText" 
                        class="nav-link cursor-hover <?=$lgGalleryUrl?>" 
                        href="/gallery?pageIndex=1"
                    >갤러리</a>
                    <div 
                        class="position-relative" 
                        onmouseenter="showcommunitydiv('lg-header-community-submenu');"  
                        onmouseleave="hidecommunitydiv('lg-header-community-submenu');">
                        <a 
                            id="lgHeaderCommunityText" 
                            href="/community/notice?pageIndex=1" 
                            class=" nav-link <?=$lgCommunityUrl?>" 
                        >
                            커뮤니티
                    </a>
                        <div 
                            id="lg-header-community-submenu" 
                            class="position-absolute d-flex flex-column gap-4 py-3 pe-5 ps-3 px bg-light text-left hide-y-gradually" style="top:35px; width:120px;">
                            <a 
                                class="nav-link cursor-hover <?=$lgNoticeUrl?> text-black" 
                                id="lgCommunityNotice" >공지사항</a>
                            <a 
                                class="nav-link cursor-hover <?=$lgEventUrl?> text-black" 
                                id="lgCommunityEvent"
                            >이벤트</a>
                            <a 
                                class="nav-link cursor-hover <?=$lgQnaUrl?> text-black" 
                                id="lgCommunityQna"
                            >Q&A</a>
                        </div>
                    </div>
                </div>
                
                <!-- 로고 -->
                <div class="d-flex navbar-brand " style="margin-left:<?=isset($_COOKIE["user_id"]) ? '100px' : '0px'?>;padding-right:55px;">
                    <a  href="/" id="white-header-scroll-logo"  class="text-black hide-item" style="text-decoration: none;">OJAK</a>
                    <a href="/" id="white-header-logo" >
                        <svg id="lgHeaderMiddleLogo" width="79" height="135" viewBox="0 0 79 135" fill="none" xmlns="http://www.w3.org/2000/svg" >
                            <g clip-path="url(#clip0_320_463)" id="lg-header-logo-white">
                                <path d="M45.9255 37.1691C45.0826 35.4672 44.2665 33.8135 43.4182 32.1008C47.0691 30.1841 49.5442 27.3118 50.6663 23.3388C51.4824 20.4449 51.3481 17.5725 50.2958 14.7646C48.1107 8.9232 42.4733 5.44951 36.6749 5.72869C30.0818 6.04009 25.1048 10.6896 23.7787 16.3538C22.2378 22.9468 25.4055 29.4808 31.7891 32.4176C31.059 34.1196 30.3288 35.8269 29.5986 37.5288C24.1653 35.6658 17.234 28.7345 17.6904 18.7054C18.1252 9.22386 25.1907 1.51409 34.4307 0.209441C45.1041 -1.29923 53.9574 5.54615 56.2929 14.7861C58.7035 24.3213 53.8232 33.4377 45.9255 37.1745V37.1691Z" fill="white"/>
                                <path d="M4.00522 97.6016C2.56634 96.1627 1.2617 94.8527 0 93.591C7.39837 86.2087 14.8451 78.7728 22.2273 71.4066C29.6794 78.8533 37.212 86.3805 44.7016 93.8648C43.4453 95.1265 42.146 96.4312 40.836 97.7465C34.7208 91.6313 28.5358 85.4463 22.3455 79.256C16.1658 85.441 10.0882 91.524 4.01058 97.6016H4.00522Z" fill="white"/>
                                <path d="M51.2836 134.55H45.7052V109.048H19.5693V103.368H51.2836V134.55Z" fill="white"/>
                                <path d="M34.2864 39.0697H40.0096V70.2685H8.2793V64.6526H34.2917V39.0643L34.2864 39.0697Z" fill="white"/>
                                <path d="M47.0537 96.0984V64.9479H52.7126V90.4503H78.8431V96.0984H47.0537Z" fill="white"/>
                                <path d="M67.5677 53.367C65.1194 54.8381 63.1652 54.763 61.8122 53.1952C60.3572 51.5094 60.3143 48.8196 61.7102 47.1122C63.0685 45.4479 64.9262 45.3244 67.4979 46.7525C67.5247 46.4948 67.5516 46.2479 67.5891 45.9472H69.4522V47.8371C69.4522 49.7645 69.4307 51.6919 69.4629 53.6194C69.4736 54.2153 69.3072 54.4355 68.6951 54.3979C68.0294 54.3603 67.2724 54.5375 67.5677 53.3778V53.367ZM67.5355 50.0813C67.5301 47.9552 65.6026 46.6613 63.8792 47.6277C62.7679 48.2505 62.2847 49.8343 62.784 51.2356C63.1598 52.2825 64.4 53.061 65.3986 52.8731C66.7516 52.6154 67.5408 51.5899 67.5355 50.0813Z" fill="white"/>
                                <path d="M73.4309 50.8061V54.3173H71.6699V43.0372H73.4041V49.437C74.2631 48.4169 75.0416 47.6062 75.6859 46.6988C76.153 46.0385 76.6738 45.7646 77.463 45.8667C77.8764 45.9203 78.3005 45.8774 78.9126 45.8774C77.5435 47.3699 76.3087 48.7229 75.047 50.1027C76.3248 51.4986 77.565 52.8516 78.9502 54.3657C78.0428 54.3657 77.3663 54.414 76.7006 54.3388C76.4536 54.312 76.2013 54.0274 76.0134 53.8073C75.1919 52.8731 74.392 51.9228 73.4309 50.8061Z" fill="white"/>
                                <path d="M51.252 54.4623C48.7715 54.4623 46.9568 52.6852 46.9837 50.1242C47.0105 47.3163 48.938 45.7324 51.2896 45.7271C53.8398 45.7271 55.5364 47.472 55.633 49.9846C55.7243 52.2396 54.0868 54.473 51.252 54.4623ZM48.8897 50.1564C48.895 51.8154 49.8453 52.9053 51.2627 52.8838C52.7177 52.8623 53.7915 51.649 53.7754 50.049C53.7593 48.4276 52.7338 47.3324 51.2466 47.3485C49.7379 47.3699 48.8789 48.3847 48.8897 50.1564Z" fill="white"/>
                                <path d="M55.7183 58.2904C55.7183 57.9522 55.7129 57.6515 55.7183 57.3508C55.7183 57.179 55.7505 57.0072 55.7666 56.8569C55.8417 56.814 55.8847 56.771 55.9276 56.7656C56.8296 56.6833 57.2806 56.1858 57.2806 55.2731C57.2806 52.4383 57.2806 49.5981 57.2806 46.7633C57.2806 46.4895 57.2806 46.2211 57.2806 45.915H59.106C59.106 46.1889 59.106 46.4573 59.106 46.7257C59.106 49.6411 59.0524 52.551 59.1222 55.4664C59.1705 57.5012 58.349 58.5696 55.7129 58.2958L55.7183 58.2904Z" fill="white"/>
                                <path d="M59.3371 43.644C59.3586 44.299 58.8807 44.7983 58.2204 44.8091C57.56 44.8198 57.0392 44.3527 57.0123 43.7138C56.9909 43.1071 57.5224 42.5488 58.1452 42.5273C58.7841 42.5058 59.3156 43.0051 59.3371 43.644Z" fill="white"/>
                            </g>
                            <g clip-path="url(#clip0_320_464)" id="lg-header-logo-black" class="hide-item">
                                <path d="M45.9255 37.1691C45.0826 35.4672 44.2665 33.8135 43.4182 32.1008C47.0691 30.1841 49.5442 27.3118 50.6663 23.3388C51.4824 20.4449 51.3481 17.5725 50.2958 14.7646C48.1107 8.9232 42.4733 5.44951 36.6749 5.72869C30.0818 6.04009 25.1048 10.6896 23.7787 16.3538C22.2378 22.9468 25.4055 29.4808 31.7891 32.4176C31.059 34.1196 30.3288 35.8269 29.5986 37.5288C24.1653 35.6658 17.234 28.7345 17.6904 18.7054C18.1252 9.22386 25.1907 1.51409 34.4307 0.209441C45.1041 -1.29923 53.9574 5.54615 56.2929 14.7861C58.7035 24.3213 53.8232 33.4377 45.9255 37.1745V37.1691Z" fill="black"/>
                                <path d="M4.00522 97.6016C2.56634 96.1627 1.2617 94.8527 0 93.591C7.39837 86.2087 14.8451 78.7728 22.2273 71.4066C29.6794 78.8533 37.212 86.3805 44.7016 93.8648C43.4453 95.1265 42.146 96.4312 40.836 97.7465C34.7208 91.6313 28.5358 85.4463 22.3455 79.256C16.1658 85.441 10.0882 91.524 4.01058 97.6016H4.00522Z" fill="black"/>
                                <path d="M51.2836 134.55H45.7052V109.048H19.5693V103.368H51.2836V134.55Z" fill="black"/>
                                <path d="M34.2864 39.0697H40.0096V70.2685H8.2793V64.6526H34.2917V39.0643L34.2864 39.0697Z" fill="black"/>
                                <path d="M47.0537 96.0984V64.9479H52.7126V90.4503H78.8431V96.0984H47.0537Z" fill="black"/>
                                <path d="M67.5677 53.367C65.1194 54.8381 63.1652 54.763 61.8122 53.1952C60.3572 51.5094 60.3143 48.8196 61.7102 47.1122C63.0685 45.4479 64.9262 45.3244 67.4979 46.7525C67.5247 46.4948 67.5516 46.2479 67.5891 45.9472H69.4522V47.8371C69.4522 49.7645 69.4307 51.6919 69.4629 53.6194C69.4736 54.2153 69.3072 54.4355 68.6951 54.3979C68.0294 54.3603 67.2724 54.5375 67.5677 53.3778V53.367ZM67.5355 50.0813C67.5301 47.9552 65.6026 46.6613 63.8792 47.6277C62.7679 48.2505 62.2847 49.8343 62.784 51.2356C63.1598 52.2825 64.4 53.061 65.3986 52.8731C66.7516 52.6154 67.5408 51.5899 67.5355 50.0813Z" fill="black"/>
                                <path d="M73.4309 50.8061V54.3173H71.6699V43.0372H73.4041V49.437C74.2631 48.4169 75.0416 47.6062 75.6859 46.6988C76.153 46.0385 76.6738 45.7646 77.463 45.8667C77.8764 45.9203 78.3005 45.8774 78.9126 45.8774C77.5435 47.3699 76.3087 48.7229 75.047 50.1027C76.3248 51.4986 77.565 52.8516 78.9502 54.3657C78.0428 54.3657 77.3663 54.414 76.7006 54.3388C76.4536 54.312 76.2013 54.0274 76.0134 53.8073C75.1919 52.8731 74.392 51.9228 73.4309 50.8061Z" fill="black"/>
                                <path d="M51.252 54.4623C48.7715 54.4623 46.9568 52.6852 46.9837 50.1242C47.0105 47.3163 48.938 45.7324 51.2896 45.7271C53.8398 45.7271 55.5364 47.472 55.633 49.9846C55.7243 52.2396 54.0868 54.473 51.252 54.4623ZM48.8897 50.1564C48.895 51.8154 49.8453 52.9053 51.2627 52.8838C52.7177 52.8623 53.7915 51.649 53.7754 50.049C53.7593 48.4276 52.7338 47.3324 51.2466 47.3485C49.7379 47.3699 48.8789 48.3847 48.8897 50.1564Z" fill="black"/>
                                <path d="M55.7183 58.2904C55.7183 57.9522 55.7129 57.6515 55.7183 57.3508C55.7183 57.179 55.7505 57.0072 55.7666 56.8569C55.8417 56.814 55.8847 56.771 55.9276 56.7656C56.8296 56.6833 57.2806 56.1858 57.2806 55.2731C57.2806 52.4383 57.2806 49.5981 57.2806 46.7633C57.2806 46.4895 57.2806 46.2211 57.2806 45.915H59.106C59.106 46.1889 59.106 46.4573 59.106 46.7257C59.106 49.6411 59.0524 52.551 59.1222 55.4664C59.1705 57.5012 58.349 58.5696 55.7129 58.2958L55.7183 58.2904Z" fill="black"/>
                                <path d="M59.3371 43.644C59.3586 44.299 58.8807 44.7983 58.2204 44.8091C57.56 44.8198 57.0392 44.3527 57.0123 43.7138C56.9909 43.1071 57.5224 42.5488 58.1452 42.5273C58.7841 42.5058 59.3156 43.0051 59.3371 43.644Z" fill="black"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_320_463">
                                    <rect width="78.95" height="134.551" fill="white"/> 
                                </clipPath>
                                <clipPath id="clip0_320_464">
                                    <rect width="78.95" height="134.551" fill="black"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>

                <div class="d-flex gx-3 gap-4">
                    <?php if(isset($_COOKIE["user_id"])) { ?>
                        <a 
                            id="lgHeaderLogOut"
                            class="nav-link cursor-pointer <?=$lgLoginUrl?> fs-6" 
                            href="" 
                            onclick="logout(event)"
                        >로그아웃</a>
                        <a 
                            id="lgHeaderMyPage"
                            class="nav-link cursor-hover <?=$lgMypageUrl?> " 
                            href="/my/home" 
    
                        >마이페이지</a>
                    <?php }else{ ?>
                        <!-- <a class="nav-link cursor-pointer mt-2 fs-6" data-bs-toggle="modal" data-bs-target="#login-modal">로그인</a> -->
                        <a 
                            id="lgHeaderLogIn"
                            class="nav-link cursor-pointer  <?=$lgLoginUrl?> fs-6" 
                            data-bs-toggle="modal"
                            data-bs-target="#openModal" 
                        >로그인</a>
                    <?php } ?>
                    <!-- naver blog -->
                    <svg id="headerNaverLogo" class="cursor-pointer" width="29" height="30" viewBox="0 0 29 30"  xmlns="http://www.w3.org/2000/svg" >
                        <path class="scrollIcon" fill="#fff" d="M6.96927 12.3663C6.67963 12.3663 6.42217 12.4844 6.22907 12.7037C6.01989 12.9229 5.92334 13.1928 5.92334 13.5133C5.92334 13.8337 6.01989 14.0867 6.22907 14.3229C6.43826 14.5421 6.67963 14.6602 6.96927 14.6602C7.25891 14.6602 7.51637 14.5421 7.72556 14.3229C7.93475 14.1036 8.04738 13.8337 8.04738 13.5133C8.04738 13.1928 7.93475 12.9229 7.72556 12.7037C7.51637 12.4675 7.275 12.3663 6.96927 12.3663Z" fill="white"/>
                        <path class="scrollIcon" fill="#fff" d="M15.9966 12.3491C15.707 12.3491 15.4495 12.4672 15.2564 12.6865C15.0472 12.9057 14.9507 13.1756 14.9507 13.496C14.9507 13.8165 15.0472 14.0695 15.2564 14.3056C15.4656 14.5249 15.707 14.643 15.9966 14.643C16.2863 14.643 16.5437 14.5249 16.7529 14.3056C16.9621 14.0864 17.0747 13.8165 17.0747 13.496C17.0747 13.1756 16.9621 12.9226 16.7529 12.6865C16.5598 12.4503 16.3023 12.3491 15.9966 12.3491Z" fill="white"/>
                        <path class="scrollIcon" fill="#fff" d="M22.0308 12.3663C21.7412 12.3663 21.4837 12.4844 21.2906 12.7037C21.0814 12.9229 20.9849 13.1928 20.9849 13.5133C20.9849 13.8337 21.0814 14.0867 21.2906 14.3229C21.4998 14.5421 21.7412 14.6602 22.0308 14.6602C22.3204 14.6602 22.5779 14.5421 22.7871 14.3229C22.9963 14.1036 23.1089 13.8337 23.1089 13.5133C23.1089 13.1928 22.9963 12.9229 22.7871 12.7037C22.5779 12.4675 22.3204 12.3663 22.0308 12.3663Z" fill="white"/>
                        <path class="scrollIcon" fill="#fff" d="M24.702 4.03418H4.29835C2.7375 4.03418 1.4502 5.38351 1.4502 7.01956V19.1129C1.4502 20.7489 2.7375 22.0983 4.29835 22.0983H12.3118C12.3118 22.0983 13.8565 26.5342 14.4197 26.5342C14.9829 26.5342 16.6564 22.0983 16.6564 22.0983H24.702C26.2629 22.0983 27.5502 20.7489 27.5502 19.1129V7.01956C27.5502 5.38351 26.2629 4.03418 24.702 4.03418ZM9.02917 15.1998C8.62689 15.6721 7.99933 15.8745 7.3235 15.8745C6.71203 15.8745 6.26148 15.689 5.93965 15.4191H5.92356V15.7564H4.39489V8.75682H5.92356V11.4386H5.95574C6.37412 11.0675 6.92122 10.9495 7.56487 10.9157C8.11197 10.8989 8.69126 11.2531 9.04526 11.6747C9.38318 12.0964 9.64064 12.7542 9.64064 13.4795C9.64064 14.2722 9.44755 14.7276 9.02917 15.1998ZM12.3279 15.8239H10.767C10.767 15.8239 10.767 12.147 10.767 11.4892C10.767 10.4941 10.0107 10.3591 10.0107 10.3591V8.62189C10.0107 8.62189 12.1991 8.75682 12.3279 11.5398C12.3279 12.3325 12.3279 15.8239 12.3279 15.8239ZM18.4586 14.4915C18.3299 14.8119 18.1368 15.0818 17.8794 15.3348C17.638 15.5709 17.3483 15.7564 17.0265 15.8914C16.7047 16.0263 16.3668 16.0938 16.0128 16.0938C15.6588 16.0938 15.3209 16.0263 15.0151 15.8914C14.6933 15.7564 14.4036 15.5709 14.1623 15.3348C13.9048 15.0818 13.7117 14.795 13.583 14.4915C13.4543 14.1879 13.3899 13.8505 13.3899 13.4963C13.3899 13.1421 13.4543 12.8217 13.583 12.5012C13.7117 12.1976 13.9048 11.9109 14.1623 11.6579C14.4197 11.4217 14.6933 11.2362 15.0151 11.1013C15.3369 10.9663 15.6749 10.8989 16.0128 10.8989C16.3668 10.8989 16.7047 10.9663 17.0265 11.1013C17.3483 11.2362 17.638 11.4217 17.8794 11.6579C18.1368 11.9109 18.3138 12.1807 18.4586 12.5012C18.5874 12.8217 18.6517 13.1421 18.6517 13.4963C18.6517 13.8505 18.5874 14.171 18.4586 14.4915ZM24.6055 15.183C24.6055 16.4142 24.3802 17.1564 23.8653 17.6792C23.2377 18.3033 22.3527 18.337 21.6125 18.2358V16.9708C22.2401 17.0383 23.0929 16.5998 23.0929 15.7564V15.436H23.0768C22.7228 15.942 22.224 16.1275 21.5321 16.1275C20.9045 16.1275 20.3574 15.8914 19.9873 15.436C19.6172 14.9806 19.4402 14.3734 19.4402 13.6144C19.4402 12.7542 19.6494 12.0795 20.0517 11.5735C20.47 11.0675 21.0493 10.8314 21.7252 10.8314C22.3205 10.8314 22.7067 10.9832 23.0768 11.3374H23.0929V10.9495H24.6216V15.183H24.6055Z" fill="white"/>
                    </svg>

                    <svg id="headerInstaLogo" class="cursor-pointer" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" >
                        <path class="scrollIcon" fill="#fff"id="lg-header-insta-icon1" d="M14.9998 11.0419C12.8602 11.0419 11.0415 12.8606 11.0415 15.0002C11.0415 17.1398 12.8602 18.9585 14.9998 18.9585C17.1395 18.9585 18.9582 17.1398 18.9582 15.0002C18.9582 12.8606 17.1395 11.0419 14.9998 11.0419Z" fill="white"/>
                        <path class="scrollIcon" fill="#fff"id="lg-header-insta-icon2" d="M20.0739 3.125H10.0341C6.14773 3.125 3.125 6.14773 3.125 9.92614V19.9659C3.125 23.8523 6.14773 26.875 10.0341 26.875H20.0739C23.8523 26.875 26.875 23.8523 26.875 19.9659V9.92614C26.875 6.14773 23.8523 3.125 20.0739 3.125ZM15 21.2614C11.5455 21.2614 8.84659 18.4545 8.84659 15.108C8.84659 11.7614 11.5455 8.84659 15 8.84659C18.4545 8.84659 21.1534 11.6534 21.1534 15C21.1534 18.3466 18.4545 21.2614 15 21.2614ZM21.3693 10.142C20.6136 10.142 19.9659 9.49432 19.9659 8.73864C19.9659 7.98295 20.6136 7.33523 21.3693 7.33523C22.125 7.33523 22.7727 7.98295 22.7727 8.73864C22.7727 9.49432 22.125 10.142 21.3693 10.142Z" fill="white"/>
                    </svg>

                    <!-- youtube -->
                    <svg id="headerYoutubeLogo" class="cursor-pointer" width="29" height="30" viewBox="0 0 29 30"  xmlns="http://www.w3.org/2000/svg">
                        <path class="scrollIcon" fill="#fff" fill-rule="evenodd" clip-rule="evenodd" d="M24.8892 5.89461C26.0334 6.20992 26.9337 7.14616 27.2385 8.33949C27.7918 10.4982 27.7871 14.9998 27.7871 14.9998C27.7871 14.9998 27.7871 19.5015 27.2338 21.6602C26.929 22.8487 26.0287 23.7849 24.8845 24.1051C22.8119 24.6823 14.4978 24.6823 14.4978 24.6823C14.4978 24.6823 6.18379 24.6823 4.11114 24.1051C2.96696 23.7897 2.06663 22.8535 1.76183 21.6602C1.2085 19.5015 1.2085 14.9998 1.2085 14.9998C1.2085 14.9998 1.2085 10.4982 1.76652 8.33464C2.07132 7.14616 2.97165 6.20992 4.11583 5.88976C6.18848 5.3125 14.5025 5.3125 14.5025 5.3125C14.5025 5.3125 22.8119 5.3125 24.8892 5.89461ZM18.7322 14.9999L11.7827 10.9105V19.0892L18.7322 14.9999Z" fill="white"/>
                    </svg>


                </div>

            </div>
        </nav> 