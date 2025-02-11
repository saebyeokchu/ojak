<div class="d-flex ">
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
                href="/community/notice?pageIndex=1" 
            >공지사항</a>
            <a 
                class="nav-link cursor-hover <?=$lgEventUrl?> text-black" 
                href="/community/event?pageIndex=1" 

            >이벤트</a>
            <a 
                class="nav-link cursor-hover <?=$lgQnaUrl?> text-black" 
                href="/community/qna?pageIndex=1" 
            >Q&A</a>
        </div>
    </div>
</div>