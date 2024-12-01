<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" >
  <div class="modal-dialog">

    <div class="modal-content" style="min-height: 300px">
      <form action="javascript:;" onsubmit=" login( event ) " >
        <div id="login-form">
          <div class="modal-body position-relative" style="min-height: 150px" >
                <div class="mb-3">
                    <label for="loginId" class="form-label">아이디</label>
                    <input type="text" class="form-control" id="loginId" name="id" aria-describedby="id" required/>
                </div>
                <div class="mb-3">
                    <label for="loginPw" class="form-label">비밀번호</label>
                    <input type="password" class="form-control" id="loginPw" name="pw" required>
                      <input type="checkbox" onchange="document.getElementById('loginPw').type = this.checked ? 'text' : 'password'"> 비밀번호 보기
                    </input>
                    <p class="hide-item" id="login-error-text" style="color:red;"><small>아이디나 비밀번호가 일치하지 않습니다</small></p>
                </div>
          </div>    
          <div class="modal-footer" >
            <button type="button" class="sm-black-btn" data-bs-dismiss="modal">닫기</button>
            <a href="/auth?return_url=<?=$return_url?>"><button type="button" class="sm-black-btn">멤버가입</button></a>
            <button type="submit"  class="sm-black-btn">로그인</button>
          </div>  
        </div>

        <div class="spinner-border position-absolute start-50 loading-spinner hide-item" style="top:50px;"  role="status" id="login-loading">
          <span class="visually-hidden">Loading...</span>
        </div>
      </form>
    </div>




  </div>
</div>


