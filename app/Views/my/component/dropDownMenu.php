<div class="d-flex bg-light justify-content-end align-items-center p-2">
      <button class="btn btn-outline-dark " data-bs-toggle="collapse" data-bs-target="#headerMenu" aria-expanded="false" aria-controls="headerMenu">
        마이페이지 설정
      </span>
    </div>
    <div class="collapse" id="headerMenu">
      <div class="accordion " id="menuAccordion">
        <!-- 내 게시물 관리 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingPostManagement">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePostManagement" aria-expanded="false" aria-controls="collapsePostManagement">
              내 게시물 관리 
            </button>
          </h2>
          <div id="collapsePostManagement" class="accordion-collapse collapse" aria-labelledby="headingPostManagement" data-bs-parent="#menuAccordion">
            <div class="accordion-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item cursor-pointer">
                        <a href="/my/gallery" class="no-text-decoration">작품 관리</a>
                    </li>
                    <li class="list-group-item cursor-pointer"><a href="/my/community" class="no-text-decoration">게시글 관리</a></li>
                </ul>
            </div>
          </div>
        </div>

        <!-- 내 정보 관리 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingInfoManagement">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInfoManagement" aria-expanded="false" aria-controls="collapseInfoManagement">
              내 정보 관리
            </button>
          </h2>
          <div id="collapseInfoManagement" class="accordion-collapse collapse" aria-labelledby="headingInfoManagement" data-bs-parent="#menuAccordion">
            <div class="accordion-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item cursor-pointer">
                        <a href="/my/info" class="no-text-decoration">개인 정보 변경</a>
                    </li>
                    <li class="list-group-item cursor-pointer">
                        <a href="/my/busniess" class="no-text-decoration">사업자 정보 변경</a>
                    </li>
                </ul>
            </div>
          </div>
        </div>
        
        <?php if($userId == 1){ ?>
        <!-- 홈페이지 관리 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingHomepageManagement">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHomepageManagement" aria-expanded="false" aria-controls="collapseHomepageManagement">
              홈페이지 관리
            </button>
          </h2> 
          <div id="collapseHomepageManagement" class="accordion-collapse collapse" aria-labelledby="headingHomepageManagement" data-bs-parent="#menuAccordion">
            <div class="accordion-body">
                <div class="accordion-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item cursor-pointer">
                            <a href="/my/represent-gallery">대표 작품 관리</a>
                        </li>
                        <li class="list-group-item cursor-pointer">
                            <a href="/my/display-gallery">전시 작품 관리</a>
                        </li>
                        <li class="list-group-item cursor-pointer">
                            <a href="/my/notice">공지 사항 관리</a>
                        </li>
                    </ul>
                </div>
            </div>
          </div>
        </div>

        <!-- 조합원 관리 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingMemberManagement">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMemberManagement" aria-expanded="false" aria-controls="collapseMemberManagement">
              조합원 관리
            </button>
          </h2>
          <div id="collapseMemberManagement" class="accordion-collapse collapse" aria-labelledby="headingMemberManagement" data-bs-parent="#menuAccordion">
            <div class="accordion-body">
                <div class="accordion-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item cursor-pointer">
                            <a href="/my/user-management">조합원 관리</a>
                        </li>
                    </ul>
                </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>