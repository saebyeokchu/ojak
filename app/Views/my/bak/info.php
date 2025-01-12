<?php 
  $info = $data[0]; 
?>

<form class="p-3">
  <div class="mb-3">
    <label class="form-label">아이디</label>
    <span class="badge rounded-pill text-bg-danger">아이디는 수정하실 수 없습니다.</span>
    <input type="text" class="form-control" value="<?= $info['user_id'] ?>" disabled>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">비밀번호</label>
    <span class="badge rounded-pill text-bg-secondary cursor-pointer" data-bs-toggle="modal" data-bs-target="#changePawssord">변경하기</span>

    <?php if($info['user_id'] == "admin") { ?>
      <p><small class="text-danger"> admin계정은 홈페이지를 관리할 수 있는 유일한 계정입니다. 변경시 유의하세요.</small></p>
    <?php }?>
  </div>
  <div class="mb-3">
    <label class="form-label">이름</label>
    <span class="badge rounded-pill text-bg-secondary cursor-pointer" onclick="changeName('<?=$info['id']?>','<?=$info['user_name']?>')" >수정하기</span>

    <?php if($info['user_id'] == "admin") { ?>
      <p><small class="text-danger"> admin계정은 홈페이지를 관리할 수 있는 유일한 계정입니다. 변경시 유의하세요.</small></p>
    <?php }?>

    <input type="text" class="form-control" id="newName" value="<?= $info['user_name'] ?>">
  </div>
</form> 

<!-- Modal -->
<div class="modal fade" id="changePawssord" tabindex="-1" aria-labelledby="changePawssord" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <div class="modal-body">

              <div id="authDiv">
                <div class="mb-3">
                    <label class="form-label">인증번호</label>
                    <span class="badge rounded-pill text-bg-info cursor-pointer" onclick="sendAuthCode(<?=$info['id']?>,'<?=$info['user_name']?>','<?=$info['user_id']?>')">이메일로 인증코드 받기</span>
                    <input type="text" class="form-control" id="authCodeInput" >
                </div>
              </div>

              <div id="changePwDiv" class="hide-item">
                <div class="mb-3">
                    <label for="register-pw" class="form-label">비밀번호</label>
                    <input type="password" name="register-pw" class="form-control" id="update-pw" required>
                </div>
                <div class="mb-3">
                    <label for="register-pw-chk" class="form-label">비밀번호 확인</label>
                    <input type="password" class="form-control" id="update-pw-chk" required>
                </div>
              </div>


            <div class="modal-footer">
                <button type="button" class="sm-black-btn" data-bs-dismiss="modal">닫기</button>
                <button type="button" class="sm-black-btn" onclick="authEmail('<?=$info['id']?>')" id="authBtn">인증</button>
            </div>
        </div>
    </div>
</div>

<script>
  function changeName(id,name) {
    showLoadingSpinner();

    const newName = document.getElementById('newName').value;

    if(!newName){
      window.alert("변경할 이름을 입력해주세요.");
    }else if(name == newName){
      window.alert("다른 이름을 입력해주세요.");
    }else {
      showLoadingSpinner();

      try {
        var postData = new FormData();
        postData.append('id',id);
        postData.append('name',newName);

        axios.post('/auth/update', postData).then(function(response){
            console.log("success:", response);
            window.alert("이름을 성공적으로 변경하였습니다");
            location.reload();
            return;
        }).catch(function(error){
            console.log("error:", error);
        });
          
      } catch (error) {
          console.error('Error deleting data:', error);
          window.alert("이름을 변경할 수 없습니다. 잠시후 다시 시도하여 주세요.")
      }

      hideLoadingSpinner();
    }
    
  }

  async function sendAuthCode(id, name, userId){
    showLoadingSpinner();

    const authCode = Math.floor(Math.random() * (999999 - 100000) + 100000);
    try {
        var postData = new FormData();
        postData.append('name',name);
        postData.append('authCode',authCode);
        postData.append('id',id);
        postData.append('userId',userId);


        //step 1. update auth-code 
        await axios.post('/auth/sendAuthEmail', postData).then(async function(response){
          if(response.data.status == 'success'){
            window.alert("인증번호가 전송되었습니다");
            return;
          }
        }).catch(function(error){
            console.log("error:", error);
            window.alert("인증코드 전송에 실패하였습니다. 잠시후 다시 시도하여 주세요.");
        });
    } catch (error) {
        console.error('Error deleting data:', error);
        window.alert("인증코드 전송에 실패하였습니다. 잠시후 다시 시도하여 주세요.");
    }

    hideLoadingSpinner();

  }

  function changePassword(id) {
    showLoadingSpinner();

    const pw = document.getElementById('update-pw').value;
    const pwChk = document.getElementById('update-pw-chk').value;


    if(!pw){
      window.alert("변경할 비밀번호를 입력해주세요.");
    }else if(pw != pwChk){
      window.alert("비밀번호가 일치하지 않습니다");
    }else {
      try {
        var postData = new FormData();
        postData.append('id',id);
        postData.append('pw',pw);

        axios.post('/auth/update', postData).then(function(response){
            window.alert("비밀번호가 변경되었습니다");
            location.reload();
            return;
        }).catch(function(error){
            console.log("error:", error);
        });
          
      } catch (error) {
          console.error('Error deleting data:', error);
          window.alert("이름을 변경할 수 없습니다. 잠시후 다시 시도하여 주세요.")
      }
    }
    
    hideLoadingSpinner();
  }

  function showPassword(id){
    const authBtn = document.getElementById('authBtn');
    const changePwDiv = document.getElementById('changePwDiv');
    const authDiv = document.getElementById('authDiv');

    authBtn.innerText = '변경';
    authBtn.onclick = changePassword(id);
    hideItem(authDiv);
    showItem(changePwDiv);
  }

  async function authEmail(id){
    const authCodeInput = document.getElementById('authCodeInput').value;

    if(!authCodeInput){
      window.alert("인증번호를 입력하세요.");
      return;
    }

    try {
        var postData = new FormData();
        postData.append('authCode',authCodeInput);
        postData.append('id',id);

        //step 1. update auth-code 
        await axios.post('/auth/checkAuthEmail', postData).then(async function(response){
          if(response.data.status == 'success'){
            window.alert("인증에 성공하셨습니다");
            showPassword(id);
            return;
          }
        }).catch(function(error){
            console.log("error:", error);
            window.alert("인증코드 전송에 실패하였습니다. 잠시후 다시 시도하여 주세요.");
        });
    } catch (error) {
        console.error('Error deleting data:', error);
        window.alert("인증코드 전송에 실패하였습니다. 잠시후 다시 시도하여 주세요.");
    }
  }
</script>

