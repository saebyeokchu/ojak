<?php if($isLoggedIn) { ?>
    <nav class="navbar navbar-expand-lg flex justify-content-center bg-light text-black">
        <div class="w-100 d-flex justify-content-between pt-2 px-5"  style="max-width:1440px;">
            <!-- 메뉴 -->
            <div class="d-flex">
                <!-- toggle -->
                <a class="nav-link cursor-pointer me-4" aria-current="page" onclick="openToggleDiv(event)">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path id="lg-header-menu-icon" d="M5 6H12H19M5 12H19M5 18H19" stroke="#000" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </a>
                
                <a 
                    class="nav-link cursor-hover <?=$lgBrandUrl?> me-4" 
                    aria-current="page" 
                    href="/brand"
                    style="padding-top: 1px;" >
                    브랜드
                </a>
                <a 
                    class="nav-link cursor-hover <?=$lgGalleryUrl?> me-4" 
                    href="/gallery?pageIndex=1"
                    style="padding-top: 1px;"
                >갤러리</a>
                <div 
                    class="position-relative" 
                    onmouseenter="showcommunitydiv('scrollCommunity');"  
                    onmouseleave="hidecommunitydiv('scrollCommunity');"
                    style="padding-top: 1px;">
                    <a 
                        href="/community/notice?pageIndex=1" 
                        class=" nav-link <?=$lgCommunityUrl?>" 
                    >
                        커뮤니티
                </a>
                    <div 
                        id="scrollCommunity" 
                        class="position-absolute d-flex flex-column gap-4 py-3 pe-5 ps-3 px bg-light text-left hide-y-gradually" style="top:35px; width:120px;">
                        <a 
                            class="nav-link cursor-pointer <?=$lgNoticeUrl?> text-black" 
                            href="/community/notice?pageIndex=1"
                        >공지사항</a>
                        <a 
                            class="nav-link cursor-pointer <?=$lgEventUrl?> text-black" 
                            href="/community/event?pageIndex=1"

                        >이벤트</a>
                        <a 
                            class="nav-link cursor-pointer <?=$lgQnaUrl?> text-black" 
                            href="/community/qna?pageIndex=1"
                        >Q&A</a>
                    </div>
                </div>
            </div>
            
            <!-- 로고 -->
            <div class="d-flex navbar-brand " >
                <a href="/"  class="text-black" style="text-decoration: none;">OJAK</a>
            </div>

            <div class="d-flex">
                <a 
                    class="nav-link cursor-pointer fs-6 me-3" 
                    href="" 
                    onclick="logout(event)"
                    style="padding-top: 1px;"
                >로그아웃</a>
                <a 
                    href="/my/home" 
                    class="nav-link cursor-pointer me-3" 
                >
                    <svg fill="#000" height="25" width="25"  version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 446.389 446.389" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M431.555,171.557L228.993,5.554c-3.374-2.771-8.24-2.771-11.614,0l-88.784,72.77V63.331c0-10.966-8.89-19.855-19.856-19.855 H53.876c-10.966,0-19.855,8.89-19.855,19.855v92.501l-19.179,15.719C5.447,179.25,0,190.756,0,202.902v218.109 c0,12.097,9.806,21.902,21.902,21.902h132.771V313.203c0-22.337,18.107-40.445,40.445-40.445h56.138 c22.337,0,40.445,18.108,40.445,40.445v129.711h132.78c12.1,0,21.909-9.809,21.909-21.908V202.902 C446.389,190.759,440.943,179.251,431.555,171.557z"></path> </g></svg>
                </a>
                <!-- naver blog -->
                <svg class="cursor-pointer  me-3" width="29" height="30" viewBox="0 0 29 30"  xmlns="http://www.w3.org/2000/svg" 
                    onclick="window.open(
                            'https://blog.naver.com/ojak_kjs',
                            '_blank' 
                    );"
                >
                    <path class="scrollIcon" fill="#000" d="M6.96927 12.3663C6.67963 12.3663 6.42217 12.4844 6.22907 12.7037C6.01989 12.9229 5.92334 13.1928 5.92334 13.5133C5.92334 13.8337 6.01989 14.0867 6.22907 14.3229C6.43826 14.5421 6.67963 14.6602 6.96927 14.6602C7.25891 14.6602 7.51637 14.5421 7.72556 14.3229C7.93475 14.1036 8.04738 13.8337 8.04738 13.5133C8.04738 13.1928 7.93475 12.9229 7.72556 12.7037C7.51637 12.4675 7.275 12.3663 6.96927 12.3663Z" fill="white"/>
                    <path class="scrollIcon" fill="#000" d="M15.9966 12.3491C15.707 12.3491 15.4495 12.4672 15.2564 12.6865C15.0472 12.9057 14.9507 13.1756 14.9507 13.496C14.9507 13.8165 15.0472 14.0695 15.2564 14.3056C15.4656 14.5249 15.707 14.643 15.9966 14.643C16.2863 14.643 16.5437 14.5249 16.7529 14.3056C16.9621 14.0864 17.0747 13.8165 17.0747 13.496C17.0747 13.1756 16.9621 12.9226 16.7529 12.6865C16.5598 12.4503 16.3023 12.3491 15.9966 12.3491Z" fill="white"/>
                    <path class="scrollIcon" fill="#000" d="M22.0308 12.3663C21.7412 12.3663 21.4837 12.4844 21.2906 12.7037C21.0814 12.9229 20.9849 13.1928 20.9849 13.5133C20.9849 13.8337 21.0814 14.0867 21.2906 14.3229C21.4998 14.5421 21.7412 14.6602 22.0308 14.6602C22.3204 14.6602 22.5779 14.5421 22.7871 14.3229C22.9963 14.1036 23.1089 13.8337 23.1089 13.5133C23.1089 13.1928 22.9963 12.9229 22.7871 12.7037C22.5779 12.4675 22.3204 12.3663 22.0308 12.3663Z" fill="white"/>
                    <path class="scrollIcon" fill="#000" d="M24.702 4.03418H4.29835C2.7375 4.03418 1.4502 5.38351 1.4502 7.01956V19.1129C1.4502 20.7489 2.7375 22.0983 4.29835 22.0983H12.3118C12.3118 22.0983 13.8565 26.5342 14.4197 26.5342C14.9829 26.5342 16.6564 22.0983 16.6564 22.0983H24.702C26.2629 22.0983 27.5502 20.7489 27.5502 19.1129V7.01956C27.5502 5.38351 26.2629 4.03418 24.702 4.03418ZM9.02917 15.1998C8.62689 15.6721 7.99933 15.8745 7.3235 15.8745C6.71203 15.8745 6.26148 15.689 5.93965 15.4191H5.92356V15.7564H4.39489V8.75682H5.92356V11.4386H5.95574C6.37412 11.0675 6.92122 10.9495 7.56487 10.9157C8.11197 10.8989 8.69126 11.2531 9.04526 11.6747C9.38318 12.0964 9.64064 12.7542 9.64064 13.4795C9.64064 14.2722 9.44755 14.7276 9.02917 15.1998ZM12.3279 15.8239H10.767C10.767 15.8239 10.767 12.147 10.767 11.4892C10.767 10.4941 10.0107 10.3591 10.0107 10.3591V8.62189C10.0107 8.62189 12.1991 8.75682 12.3279 11.5398C12.3279 12.3325 12.3279 15.8239 12.3279 15.8239ZM18.4586 14.4915C18.3299 14.8119 18.1368 15.0818 17.8794 15.3348C17.638 15.5709 17.3483 15.7564 17.0265 15.8914C16.7047 16.0263 16.3668 16.0938 16.0128 16.0938C15.6588 16.0938 15.3209 16.0263 15.0151 15.8914C14.6933 15.7564 14.4036 15.5709 14.1623 15.3348C13.9048 15.0818 13.7117 14.795 13.583 14.4915C13.4543 14.1879 13.3899 13.8505 13.3899 13.4963C13.3899 13.1421 13.4543 12.8217 13.583 12.5012C13.7117 12.1976 13.9048 11.9109 14.1623 11.6579C14.4197 11.4217 14.6933 11.2362 15.0151 11.1013C15.3369 10.9663 15.6749 10.8989 16.0128 10.8989C16.3668 10.8989 16.7047 10.9663 17.0265 11.1013C17.3483 11.2362 17.638 11.4217 17.8794 11.6579C18.1368 11.9109 18.3138 12.1807 18.4586 12.5012C18.5874 12.8217 18.6517 13.1421 18.6517 13.4963C18.6517 13.8505 18.5874 14.171 18.4586 14.4915ZM24.6055 15.183C24.6055 16.4142 24.3802 17.1564 23.8653 17.6792C23.2377 18.3033 22.3527 18.337 21.6125 18.2358V16.9708C22.2401 17.0383 23.0929 16.5998 23.0929 15.7564V15.436H23.0768C22.7228 15.942 22.224 16.1275 21.5321 16.1275C20.9045 16.1275 20.3574 15.8914 19.9873 15.436C19.6172 14.9806 19.4402 14.3734 19.4402 13.6144C19.4402 12.7542 19.6494 12.0795 20.0517 11.5735C20.47 11.0675 21.0493 10.8314 21.7252 10.8314C22.3205 10.8314 22.7067 10.9832 23.0768 11.3374H23.0929V10.9495H24.6216V15.183H24.6055Z" fill="white"/>
                </svg>

                <svg class="cursor-pointer  me-3" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" 
                    onclick="window.open(
                            'https://www.instagram.com/ko_jeong_suk/',
                            '_blank' 
                    );"
                >
                    <path class="scrollIcon" fill="#000" d="M14.9998 11.0419C12.8602 11.0419 11.0415 12.8606 11.0415 15.0002C11.0415 17.1398 12.8602 18.9585 14.9998 18.9585C17.1395 18.9585 18.9582 17.1398 18.9582 15.0002C18.9582 12.8606 17.1395 11.0419 14.9998 11.0419Z" fill="white"/>
                    <path class="scrollIcon" fill="#000" d="M20.0739 3.125H10.0341C6.14773 3.125 3.125 6.14773 3.125 9.92614V19.9659C3.125 23.8523 6.14773 26.875 10.0341 26.875H20.0739C23.8523 26.875 26.875 23.8523 26.875 19.9659V9.92614C26.875 6.14773 23.8523 3.125 20.0739 3.125ZM15 21.2614C11.5455 21.2614 8.84659 18.4545 8.84659 15.108C8.84659 11.7614 11.5455 8.84659 15 8.84659C18.4545 8.84659 21.1534 11.6534 21.1534 15C21.1534 18.3466 18.4545 21.2614 15 21.2614ZM21.3693 10.142C20.6136 10.142 19.9659 9.49432 19.9659 8.73864C19.9659 7.98295 20.6136 7.33523 21.3693 7.33523C22.125 7.33523 22.7727 7.98295 22.7727 8.73864C22.7727 9.49432 22.125 10.142 21.3693 10.142Z" fill="white"/>
                </svg>

                <!-- youtube -->
                <svg class="cursor-pointer" width="29" height="30" viewBox="0 0 29 30"  xmlns="http://www.w3.org/2000/svg" onclick="window.open(
                            'https://www.youtube.com/@ojak_kjs',
                            '_blank' 
                    );">
                    <path class="scrollIcon" fill="#000" fill-rule="evenodd" clip-rule="evenodd" d="M24.8892 5.89461C26.0334 6.20992 26.9337 7.14616 27.2385 8.33949C27.7918 10.4982 27.7871 14.9998 27.7871 14.9998C27.7871 14.9998 27.7871 19.5015 27.2338 21.6602C26.929 22.8487 26.0287 23.7849 24.8845 24.1051C22.8119 24.6823 14.4978 24.6823 14.4978 24.6823C14.4978 24.6823 6.18379 24.6823 4.11114 24.1051C2.96696 23.7897 2.06663 22.8535 1.76183 21.6602C1.2085 19.5015 1.2085 14.9998 1.2085 14.9998C1.2085 14.9998 1.2085 10.4982 1.76652 8.33464C2.07132 7.14616 2.97165 6.20992 4.11583 5.88976C6.18848 5.3125 14.5025 5.3125 14.5025 5.3125C14.5025 5.3125 22.8119 5.3125 24.8892 5.89461ZM18.7322 14.9999L11.7827 10.9105V19.0892L18.7322 14.9999Z" fill="white"/>
                </svg>


            </div>

        </div>
    </nav> 
<?php }else{ ?>
    <nav class="navbar navbar-expand-lg flex justify-content-center bg-light text-black">
        <div class="w-100 d-flex justify-content-between pt-2 px-5"  style="max-width:1440px;">
            <!-- 메뉴 -->
            <div class="d-flex">
                <!-- toggle -->
                <a class="nav-link cursor-pointer me-4" aria-current="page" onclick="openToggleDiv(event)">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path id="lg-header-menu-icon" d="M5 6H12H19M5 12H19M5 18H19" stroke="#000" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </a>
                
                <a 
                    id="lgHeaderBrandText" 
                    class="nav-link cursor-hover <?=$lgBrandUrl?> me-4" 
                    aria-current="page" 
                    href="/brand"
                    style="padding-top: 2px;" >
                    브랜드
                </a>
                <a 
                    id="lgHeaderGalleryText" 
                    class="nav-link cursor-hover <?=$lgGalleryUrl?> me-4 " 
                    href="/gallery?pageIndex=1"
                    style="padding-top: 2px;"
                >갤러리</a>
                <div 
                    class="position-relative" 
                    onmouseenter="showcommunitydiv('scrollCommunity');"  
                    onmouseleave="hidecommunitydiv('scrollCommunity');"
                    style="padding-top: 2px;">
                    <a 
                        id="lgHeaderCommunityText" 
                        href="/community/notice?pageIndex=1" 
                        class=" nav-link <?=$lgCommunityUrl?>" 
                    >
                        커뮤니티
                </a>
                    <div 
                        id="scrollCommunity" 
                        class="position-absolute d-flex flex-column gap-4 py-3 pe-5 ps-3 px bg-light text-left hide-y-gradually" style="top:35px; width:120px;">
                        <a 
                            class="nav-link cursor-pointer <?=$lgNoticeUrl?> text-black" 
                            href="/community/notice?pageIndex=1"   
                        >공지사항</a>
                        <a 
                            class="nav-link cursor-pointer <?=$lgEventUrl?> text-black" 
                            href="/community/event?pageIndex=1"
                        >이벤트</a>
                        <a 
                            class="nav-link cursor-pointer <?=$lgQnaUrl?> text-black" 
                            href="/community/qna?pageIndex=1"
                        >Q&A</a>
                    </div>
                </div>
            </div>
            
            <!-- 로고 -->
            <div class="d-flex navbar-brand " >
                <a href="/"  class="text-black" style="text-decoration: none;">OJAK</a>
            </div>

            <div class="d-flex">
                <a 
                    id="lgHeaderLogIn"
                    class="nav-link cursor-pointer  <?=$lgLoginUrl?> fs-6 me-4" 
                    data-bs-toggle="modal"
                    data-bs-target="#openModal" 
                    style="padding-top: 2px;"
                >로그인</a>
                <!-- naver blog -->
                <svg  class="cursor-pointer  me-4" width="29" height="30" viewBox="0 0 29 30"  xmlns="http://www.w3.org/2000/svg" 
                    onclick="window.open(
                            'https://blog.naver.com/ojak_kjs',
                            '_blank' 
                    );"
                >
                    <path class="scrollIcon" fill="#000" d="M6.96927 12.3663C6.67963 12.3663 6.42217 12.4844 6.22907 12.7037C6.01989 12.9229 5.92334 13.1928 5.92334 13.5133C5.92334 13.8337 6.01989 14.0867 6.22907 14.3229C6.43826 14.5421 6.67963 14.6602 6.96927 14.6602C7.25891 14.6602 7.51637 14.5421 7.72556 14.3229C7.93475 14.1036 8.04738 13.8337 8.04738 13.5133C8.04738 13.1928 7.93475 12.9229 7.72556 12.7037C7.51637 12.4675 7.275 12.3663 6.96927 12.3663Z" fill="white"/>
                    <path class="scrollIcon" fill="#000" d="M15.9966 12.3491C15.707 12.3491 15.4495 12.4672 15.2564 12.6865C15.0472 12.9057 14.9507 13.1756 14.9507 13.496C14.9507 13.8165 15.0472 14.0695 15.2564 14.3056C15.4656 14.5249 15.707 14.643 15.9966 14.643C16.2863 14.643 16.5437 14.5249 16.7529 14.3056C16.9621 14.0864 17.0747 13.8165 17.0747 13.496C17.0747 13.1756 16.9621 12.9226 16.7529 12.6865C16.5598 12.4503 16.3023 12.3491 15.9966 12.3491Z" fill="white"/>
                    <path class="scrollIcon" fill="#000" d="M22.0308 12.3663C21.7412 12.3663 21.4837 12.4844 21.2906 12.7037C21.0814 12.9229 20.9849 13.1928 20.9849 13.5133C20.9849 13.8337 21.0814 14.0867 21.2906 14.3229C21.4998 14.5421 21.7412 14.6602 22.0308 14.6602C22.3204 14.6602 22.5779 14.5421 22.7871 14.3229C22.9963 14.1036 23.1089 13.8337 23.1089 13.5133C23.1089 13.1928 22.9963 12.9229 22.7871 12.7037C22.5779 12.4675 22.3204 12.3663 22.0308 12.3663Z" fill="white"/>
                    <path class="scrollIcon" fill="#000" d="M24.702 4.03418H4.29835C2.7375 4.03418 1.4502 5.38351 1.4502 7.01956V19.1129C1.4502 20.7489 2.7375 22.0983 4.29835 22.0983H12.3118C12.3118 22.0983 13.8565 26.5342 14.4197 26.5342C14.9829 26.5342 16.6564 22.0983 16.6564 22.0983H24.702C26.2629 22.0983 27.5502 20.7489 27.5502 19.1129V7.01956C27.5502 5.38351 26.2629 4.03418 24.702 4.03418ZM9.02917 15.1998C8.62689 15.6721 7.99933 15.8745 7.3235 15.8745C6.71203 15.8745 6.26148 15.689 5.93965 15.4191H5.92356V15.7564H4.39489V8.75682H5.92356V11.4386H5.95574C6.37412 11.0675 6.92122 10.9495 7.56487 10.9157C8.11197 10.8989 8.69126 11.2531 9.04526 11.6747C9.38318 12.0964 9.64064 12.7542 9.64064 13.4795C9.64064 14.2722 9.44755 14.7276 9.02917 15.1998ZM12.3279 15.8239H10.767C10.767 15.8239 10.767 12.147 10.767 11.4892C10.767 10.4941 10.0107 10.3591 10.0107 10.3591V8.62189C10.0107 8.62189 12.1991 8.75682 12.3279 11.5398C12.3279 12.3325 12.3279 15.8239 12.3279 15.8239ZM18.4586 14.4915C18.3299 14.8119 18.1368 15.0818 17.8794 15.3348C17.638 15.5709 17.3483 15.7564 17.0265 15.8914C16.7047 16.0263 16.3668 16.0938 16.0128 16.0938C15.6588 16.0938 15.3209 16.0263 15.0151 15.8914C14.6933 15.7564 14.4036 15.5709 14.1623 15.3348C13.9048 15.0818 13.7117 14.795 13.583 14.4915C13.4543 14.1879 13.3899 13.8505 13.3899 13.4963C13.3899 13.1421 13.4543 12.8217 13.583 12.5012C13.7117 12.1976 13.9048 11.9109 14.1623 11.6579C14.4197 11.4217 14.6933 11.2362 15.0151 11.1013C15.3369 10.9663 15.6749 10.8989 16.0128 10.8989C16.3668 10.8989 16.7047 10.9663 17.0265 11.1013C17.3483 11.2362 17.638 11.4217 17.8794 11.6579C18.1368 11.9109 18.3138 12.1807 18.4586 12.5012C18.5874 12.8217 18.6517 13.1421 18.6517 13.4963C18.6517 13.8505 18.5874 14.171 18.4586 14.4915ZM24.6055 15.183C24.6055 16.4142 24.3802 17.1564 23.8653 17.6792C23.2377 18.3033 22.3527 18.337 21.6125 18.2358V16.9708C22.2401 17.0383 23.0929 16.5998 23.0929 15.7564V15.436H23.0768C22.7228 15.942 22.224 16.1275 21.5321 16.1275C20.9045 16.1275 20.3574 15.8914 19.9873 15.436C19.6172 14.9806 19.4402 14.3734 19.4402 13.6144C19.4402 12.7542 19.6494 12.0795 20.0517 11.5735C20.47 11.0675 21.0493 10.8314 21.7252 10.8314C22.3205 10.8314 22.7067 10.9832 23.0768 11.3374H23.0929V10.9495H24.6216V15.183H24.6055Z" fill="white"/>
                </svg>

                <svg class="cursor-pointer  me-4" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" 
                    onclick="window.open(
                            'https://www.instagram.com/ko_jeong_suk/',
                            '_blank' 
                    );"
                >
                    <path class="scrollIcon" fill="#000" d="M14.9998 11.0419C12.8602 11.0419 11.0415 12.8606 11.0415 15.0002C11.0415 17.1398 12.8602 18.9585 14.9998 18.9585C17.1395 18.9585 18.9582 17.1398 18.9582 15.0002C18.9582 12.8606 17.1395 11.0419 14.9998 11.0419Z" fill="white"/>
                    <path class="scrollIcon" fill="#000" d="M20.0739 3.125H10.0341C6.14773 3.125 3.125 6.14773 3.125 9.92614V19.9659C3.125 23.8523 6.14773 26.875 10.0341 26.875H20.0739C23.8523 26.875 26.875 23.8523 26.875 19.9659V9.92614C26.875 6.14773 23.8523 3.125 20.0739 3.125ZM15 21.2614C11.5455 21.2614 8.84659 18.4545 8.84659 15.108C8.84659 11.7614 11.5455 8.84659 15 8.84659C18.4545 8.84659 21.1534 11.6534 21.1534 15C21.1534 18.3466 18.4545 21.2614 15 21.2614ZM21.3693 10.142C20.6136 10.142 19.9659 9.49432 19.9659 8.73864C19.9659 7.98295 20.6136 7.33523 21.3693 7.33523C22.125 7.33523 22.7727 7.98295 22.7727 8.73864C22.7727 9.49432 22.125 10.142 21.3693 10.142Z" fill="white"/>
                </svg>

                <!-- youtube -->
                <svg class="cursor-pointer" width="29" height="30" viewBox="0 0 29 30"  xmlns="http://www.w3.org/2000/svg" onclick="window.open(
                            'https://www.youtube.com/@ojak_kjs',
                            '_blank' 
                    );">
                    <path class="scrollIcon" fill="#000" fill-rule="evenodd" clip-rule="evenodd" d="M24.8892 5.89461C26.0334 6.20992 26.9337 7.14616 27.2385 8.33949C27.7918 10.4982 27.7871 14.9998 27.7871 14.9998C27.7871 14.9998 27.7871 19.5015 27.2338 21.6602C26.929 22.8487 26.0287 23.7849 24.8845 24.1051C22.8119 24.6823 14.4978 24.6823 14.4978 24.6823C14.4978 24.6823 6.18379 24.6823 4.11114 24.1051C2.96696 23.7897 2.06663 22.8535 1.76183 21.6602C1.2085 19.5015 1.2085 14.9998 1.2085 14.9998C1.2085 14.9998 1.2085 10.4982 1.76652 8.33464C2.07132 7.14616 2.97165 6.20992 4.11583 5.88976C6.18848 5.3125 14.5025 5.3125 14.5025 5.3125C14.5025 5.3125 22.8119 5.3125 24.8892 5.89461ZM18.7322 14.9999L11.7827 10.9105V19.0892L18.7322 14.9999Z" fill="white"/>
                </svg>


            </div>

        </div>
    </nav> 
<?php } ?>

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
</script>