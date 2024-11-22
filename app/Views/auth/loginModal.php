<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body position-relative">
        <div class="position-absolute text-secondary " style="right:5px">
            <small>*해당기능은 멤버들만 사용하실 수 있습니다.</small>
        </div>
        <form action="javascript:;" onsubmit=" login( event ) ">
            <div class="mb-3">
                <label for="loginId" class="form-label">아이디</label>
                <input type="text" class="form-control" id="loginId" name="id" aria-describedby="id" required/>
            </div>
            <div class="mb-3">
                <label for="loginPw" class="form-label">비밀번호</label>
                <input type="password" class="form-control" id="loginPw" name="pw" required/>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="sm-black-btn" data-bs-dismiss="modal">닫기</button>
        <a href="/auth?return_url=<?=$return_url?>"><button type="button" class="sm-black-btn">멤버가입</button></a>
        <button type="submit"  class="sm-black-btn">로그인</button>
      </div>
      </form>
    </div>
  </div>
</div>

