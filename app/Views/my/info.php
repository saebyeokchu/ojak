<?php 
  $info = $data; 
?> 

<div class="for-lg " >
    <?php if($isAdmin) { ?>
    <p><small class="text-danger"> admin계정은 홈페이지를 관리할 수 있는 유일한 계정입니다. 변경시 유의하세요.</small></p>
    <?php } ?>

    <div class="d-flex flex-column justify-content-start mt-70">
        <p ><span class="fw-bold" style="font-size: 32px;">개인 정보 관리</span><br /><span>이메일 인증 후 개인정보를 변경하실 수 있습니다.</span></p>
        <?php if($isAdmin) { ?>
        <?php }?>
    </div>

    <div  id="authButton">
      <button type="submit" class="btn btn-dark"  onclick="sendAuthCode(<?=$info['id']?>,'<?=$info['user_name']?>','<?=$info['user_id']?>')">이메일 인증하기</button>
    </div>
    
    <div id="updateBtn"  class="hide-item mt-3">
      <button type="submit" class="btn btn-dark"  onclick="updateUserInfo(<?=$info['id']?>,<?=$isAdmin?>)">수정하기</button>
    </div>

    <div class="d-flex flex-row gap-3 hide-item" id="authWrapper">
          <input style="width: 200px;" type="text" class="form-control" id="authCodeInput" placeholder="인증번호" />
          <button type="button" class="btn btn-dark" onclick="authEmail('<?=$info['id']?>')" id="authBtn">인증</button>
    </div>

    <form class="mt-3 w-25">
      <div class="mb-3">
        <label class="form-label">이름</label>
        <span class="badge rounded-pill text-bg-secondary cursor-pointer hide-item" onclick="changeName('<?=$info['id']?>','<?=$info['user_name']?>')" >수정하기</span>
        <input type="text" class="form-control" id="newName" value="<?= $info['user_name'] ?>" disabled>
      </div>

      <div class="mb-3">
        <label class="form-label">아이디</label>
        <span class="badge rounded-pill text-bg-danger">아이디는 수정하실 수 없습니다.</span>
        <input type="text" class="form-control" value="<?= $info['user_id'] ?>" disabled>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">비밀번호</label>
        <!-- <span class="badge rounded-pill text-bg-secondary cursor-pointer" data-bs-toggle="modal" data-bs-target="#changePawssord">변경하기</span> -->
        <input type="text" class="form-control" id="fakeIdInput" disabled>
        
        <div class="d-flex flex-column gap-3 hide-item" id="changePwDiv" >
          <input placeholder="비밀번호"  type="password" name="register-pw" class="form-control" id="update-pw" required>
          <input placeholder="비밀번호 확인" type="password" class="form-control" id="update-pw-chk" required>
          <button type="button" class="btn btn-dark hide-item" onclick="changePassword('<?=$info['id']?>')" >변경</button>
        </div>
      </div>
      
      <?php if($isAdmin) { ?>
        <div class="mb-3">
          <label class="form-label">관리자 이메일</label>
          <input type="text" class="form-control" id="newAdminEmail" value="<?= $info['note'] ?>" disabled>
        </div>
      <?php } ?>
      
    </form> 

    <!-- Modal -->
    <!-- <div class="modal fade" id="changePawssord" tabindex="-1" aria-labelledby="changePawssord" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">인증번호 받기</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div id="authDiv">
                    <div class="mb-3">
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

                  <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">닫기</button>
                    <button type="button" class="btn btn-dark" onclick="authEmail('<?=$info['id']?>')" id="authBtn">인증</button>
                  </div>
            </div>
        </div>
    </div> -->
</div>

<script>
  function changeName(id,name) {
    turnOnLoadingScreen();

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

      turnOffLoadingScreen();
    }
    
  }

  async function sendAuthCode(id, name, userId){
    turnOnLoadingScreen();

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
            
            //show items
            document.getElementById('authWrapper').classList.remove('hide-item');
            document.getElementById('authButton').classList.add('hide-item');


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

    turnOffLoadingScreen();

  }

  function changePassword(id) {
    turnOnLoadingScreen();

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
    
    turnOffLoadingScreen();
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
        turnOnLoadingScreen();

        //step 1. update auth-code 
        await axios.post('/auth/checkAuthEmail', postData).then(async function(response){
          console.log(response);
          if(response.data.status == 'success'){
            window.alert("인증에 성공하셨습니다");
            document.getElementById("authWrapper").classList.add("hide-item");
            document.getElementById("fakeIdInput").classList.add("hide-item");
            document.getElementById("changePwDiv").classList.remove("hide-item");
            document.getElementById("updateBtn").classList.remove("hide-item");
            document.getElementById('newName').disabled = false;
            if(document.getElementById('newAdminEmail')){
              document.getElementById('newAdminEmail').disabled = false;
            }
          }else{
            window.alert("올바르지 않은 인증번호 입니다. 3분 후 다시 시도하여 주세요.");
          }

          return;
        }).catch(function(error){
            console.log("error:", error);
            window.alert("올바르지 않은 인증번호 입니다. 잠시후 다시 시도하여 주세요");
            document.getElementById('authButton').classList.remove('hide-item');
            document.getElementById('authWrapper').classList.add('hide-item');
        });
    } catch (error) {
        console.error('Error deleting data:', error);
        window.alert("올바르지 않은 인증번호 입니다. 잠시후 다시 시도하여 주세요.");
        document.getElementById('authButton').classList.remove('hide-item');
        document.getElementById('authWrapper').classList.add('hide-item');
    }
    turnOffLoadingScreen();
  }

  function updateUserInfo(id, isAdmin) {
    turnOnLoadingScreen();
    const newName = document.getElementById('newName').value;
    const newPassword = document.getElementById('update-pw').value;
    const checkPassword = document.getElementById('update-pw-chk').value;
    let newAdminEmail = null;

    if(isAdmin){
      newAdminEmail = document.getElementById('newAdminEmail').value;
    }

    if(newPassword){
      if(newPassword != checkPassword){
        window.alert("비밀번호가 일치하지 않습니다");
        turnOffLoadingScreen();
        return;
      }
    }

    try {
      var postData = new FormData();
      postData.append('id',id);

      if(newPassword){
        postData.append('pw',newPassword);
      }

      if(newName){
        postData.append('name',newName);
      }

      if(newAdminEmail){
        postData.append('adminEmail',newAdminEmail);
      }

      axios.post('/auth/update', postData).then(function(response){
          window.alert("개인 정보 변경이 완료되었습니다.");
          turnOffLoadingScreen();
          location.reload();
          return;
      }).catch(function(error){
          console.log("error:", error);
          window.alert("개인 정보를 변경할 수 없습니다. 잠시후 다시 시도하여 주세요.")
      });
        
    } catch (error) {
        console.error('Error deleting data:', error);
        window.alert("개인 정보를 변경할 수 없습니다. 잠시후 다시 시도하여 주세요.")
    }
  
    turnOffLoadingScreen();
  }
</script>

