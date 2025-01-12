<?php
    $data = $contents['target_data'];
    $userName = $_COOKIE['user_name'];
    $userId = $_COOKIE['user_id'];
    $userEmail = $_COOKIE['user_email'];
?>

<div style="width:100%; height: 70px;"></div>

<div class="for-sm">
    <?= view('/my/component/dropDownMenu',['sub' => $contents['sub'], 'userId' => $userId ]); ?>
</div>

<div class="container-fluid for-lg">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <span class="nav-link align-middle px-0 text-secondary">
                            <span class="fs-4"></span>
                            <strong>내 게시물 관리</strong>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a href="/my/gallery" class="nav-link align-middle px-0 text-secondary">
                            <span class="fs-4">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="15" cy="9" r="2" stroke="#1C274C" stroke-width="1.5"/>
                                <path d="M19.9999 17.6001L17.7764 15.599C16.7368 14.6634 15.1887 14.5702 14.0445 15.3744L13.7463 15.5839C12.9511 16.1428 11.8693 16.0491 11.1821 15.3618L6.89237 11.0721C6.03616 10.2159 4.66274 10.1702 3.75147 10.9675L2.28101 12.2542" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                            </span>
                            <?php if($contents['sub'] == 'gallery') { ?>
                                <span class="ms-1 d-none d-sm-inline"><strong>작품 관리</strong></span>
                            <?php }else{ ?>
                                <span class="ms-1 d-none d-sm-inline ">작품 관리</span> 
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="/my/community" class="nav-link px-0 align-middle text-secondary">
                            <span class="fs-4">
                                <svg fill="#000000" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 2H8C4.691 2 2 4.691 2 8v12a1 1 0 0 0 1 1h13c3.309 0 6-2.691 6-6V8c0-3.309-2.691-6-6-6zm4 13c0 2.206-1.794 4-4 4H4V8c0-2.206 1.794-4 4-4h8c2.206 0 4 1.794 4 4v7z"/></svg>
                            </span> 
                            <?php if($contents['sub'] == 'community') { ?>
                                <span class="ms-1 d-none d-sm-inline"><strong>게시글 관리</strong></span>
                            <?php }else{ ?>
                                <span class="ms-1 d-none d-sm-inline ">게시글 관리</span> 
                            <?php } ?>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="nav-item">
                        <span class="nav-link align-middle px-0 text-secondary">
                            <span class="fs-4"></span>
                            <strong>내 정보 관리</strong>
                        </span>
                    </li>
                    <li>
                        <a href="/my/info" class="nav-link px-0 align-middle text-secondary">
                            <span class="fs-4 bi-people">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V11C12.75 10.5858 12.4142 10.25 12 10.25C11.5858 10.25 11.25 10.5858 11.25 11V17C11.25 17.4142 11.5858 17.75 12 17.75Z" fill="#1C274C"/>
                                    <path d="M12 7C12.5523 7 13 7.44772 13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7Z" fill="#1C274C"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75Z" fill="#1C274C"/>
                                </svg>
                            </span> 
                            <?php if($contents['sub'] == 'info') { ?>
                                <span class="ms-1 d-none d-sm-inline "><strong>개인 정보 변경</strong></span> 
                            <?php }else{ ?>
                                <span class="ms-1 d-none d-sm-inline ">개인 정보 변경</span> 
                            <?php } ?>
                        </a>
                    </li>
                    <?php if($userEmail == 'admin') { ?>
                    <li>
                        <a href="/my/busniess" class="nav-link px-0 align-middle text-secondary">
                            <span class="fs-4 bi-people">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V11C12.75 10.5858 12.4142 10.25 12 10.25C11.5858 10.25 11.25 10.5858 11.25 11V17C11.25 17.4142 11.5858 17.75 12 17.75Z" fill="#1C274C"/>
                                    <path d="M12 7C12.5523 7 13 7.44772 13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7Z" fill="#1C274C"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75Z" fill="#1C274C"/>
                                </svg>
                            </span> 
                            <?php if($contents['sub'] == 'busniess') { ?>
                                <span class="ms-1 d-none d-sm-inline "><strong>사업자 정보 변경</strong></span> 
                            <?php }else{ ?>
                                <span class="ms-1 d-none d-sm-inline ">사업자 정보 변경</span> 
                            <?php } ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link align-middle px-0 text-secondary">
                            <span class="fs-4"></span>
                            <strong>홈페이지 관리</strong>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a href="/my/represent-gallery" class="nav-link align-middle px-0 text-secondary">
                            <span class="fs-4">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="15" cy="9" r="2" stroke="#1C274C" stroke-width="1.5"/>
                                <path d="M19.9999 17.6001L17.7764 15.599C16.7368 14.6634 15.1887 14.5702 14.0445 15.3744L13.7463 15.5839C12.9511 16.1428 11.8693 16.0491 11.1821 15.3618L6.89237 11.0721C6.03616 10.2159 4.66274 10.1702 3.75147 10.9675L2.28101 12.2542" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                            </span>
                            <?php if($contents['sub'] == 'represent-gallery') { ?>
                                <span class="ms-1 d-none d-sm-inline"><strong>대표 작품 관리</strong></span>
                            <?php }else{ ?>
                                <span class="ms-1 d-none d-sm-inline ">대표 작품 관리</span> 
                            <?php } ?>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="/my/display-gallery" class="nav-link align-middle px-0 text-secondary">
                            <span class="fs-4">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="15" cy="9" r="2" stroke="#1C274C" stroke-width="1.5"/>
                                <path d="M19.9999 17.6001L17.7764 15.599C16.7368 14.6634 15.1887 14.5702 14.0445 15.3744L13.7463 15.5839C12.9511 16.1428 11.8693 16.0491 11.1821 15.3618L6.89237 11.0721C6.03616 10.2159 4.66274 10.1702 3.75147 10.9675L2.28101 12.2542" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                            </span>
                            <?php if($contents['sub'] == 'display-gallery') { ?>
                                <span class="ms-1 d-none d-sm-inline"><strong>전시 작품 관리</strong></span>
                            <?php }else{ ?>
                                <span class="ms-1 d-none d-sm-inline ">전시 작품 관리</span> 
                            <?php } ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link align-middle px-0 text-secondary">
                            <span class="fs-4"></span>
                            <strong>조합원 관리</strong>
                        </span>
                    </li>
                    <li>
                        <a href="/my/user-management" class="nav-link px-0 align-middle text-secondary">
                            <span class="fs-4 bi-people">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V11C12.75 10.5858 12.4142 10.25 12 10.25C11.5858 10.25 11.25 10.5858 11.25 11V17C11.25 17.4142 11.5858 17.75 12 17.75Z" fill="#1C274C"/>
                                    <path d="M12 7C12.5523 7 13 7.44772 13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7Z" fill="#1C274C"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75Z" fill="#1C274C"/>
                                </svg>
                            </span> 
                            <?php if($contents['sub'] == 'user-management') { ?>
                                <span class="ms-1 d-none d-sm-inline "><strong>조합원 관리</strong></span> 
                            <?php }else{ ?>
                                <span class="ms-1 d-none d-sm-inline ">조합원 관리</span> 
                            <?php } ?>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="col py-3">
            <?php if($contents['sub'] == 'gallery') {
                echo view('/my/gallery',array('data' => $data));
            }else if($contents['sub'] == 'community'){
                echo view('/my/community',array('data' => $data));
            }else if($contents['sub'] == 'info'){
                echo view('/my/info',array('data' => $data));
            }else if($contents['sub'] == 'busniess'){
                echo view('/my/busniess',array('data' => $data));
            }else if($contents['sub'] == 'display-gallery'){
                echo view('/my/display-gallery',array('data' => $data)); 
            }else if($contents['sub'] == 'represent-gallery'){
                echo view('/my/represent-gallery',array('data' => $data)); 
            }else if($contents['sub'] == 'notice'){
                echo view('/my/notice',array('data' => $data));
            } else if($contents['sub'] == 'user-management'){
                echo view('/my/user-management',array('data' => $data));
            } ?>
        </div>
    </div>
</div>