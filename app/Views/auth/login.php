

<div class="page-wrap d-flex justify-content-center align-items-center pt-70 pb-70" >
    <div class="card mt-50 pb-30 p-5" style="width: 25rem;">
        <form action="javascript:;" onsubmit=" login( event ) ">
                <div class="mb-3">
                    <label for="loginId" class="form-label">아이디</label>
                    <input type="text" class="form-control" id="loginId" name="id" aria-describedby="id" required/>
                </div>
                <div class="mb-3">
                  <small>
                      <label for="loginPw" class="form-label">비밀번호</label>
                        <input type="password" class="form-control" id="loginPw" name="pw" required>
                          <input class=" mt-2" type="checkbox" onchange="document.getElementById('loginPw').type = this.checked ? 'text' : 'password'"> 비밀번호 보기
                        </input>
                      <br />
                      <span class="cursor-pointer hover-underline">
                        <a href="/auth">
                          조합원으로 가입하기
                        </a>
                      </span>
                      <br />
                      <span class="hide-item" id="login-error-text" style="color:red;">
                        아이디나 비밀번호가 일치하지 않습니다
                      </span>
                    </small>
                </div>
            <!-- <button type="submit" class="long-black-btn">멤버가입 요청</button> -->
            <button type="submit" class="btn btn-dark btn-lg" style="width:300px;">로그인</button>

            <div class="spinner-border position-absolute start-50 loading-spinner hide-item" style="top:50px;"  role="status" id="login-loading">
                <span class="visually-hidden">Loading...</span>
            </div>
        </form>
    </div>
</div>

<script>
        async function loginbak(event){
            event.preventDefault();

            //쓸모없을 것 같은디 .. 241222
            // showItem(document.getElementById('login-loading'));
            // hideItem(document.getElementById('login-form'));


            const errorTxt = document.getElementById('login-error-text');
            try {
                console.log("auth started");
                turnOnLoadingScreen();
                var postData = new FormData();
                postData.append('id', document.getElementById('loginId').value);
                postData.append('pw', document.getElementById('loginPw').value);


                await axios.post('/auth/verify', postData).then(function(response){
                    console.log("auth",response);

                    if(response.data.status == 'success'){
                        const userData = response.data.user[0];

                        addCookie('user_id',userData.id);
                        addCookie('user_email',userData.user_id);
                        addCookie('user_name',userData.user_name);

                        errorTxt.classList.remove('show-item');
                        errorTxt.classList.add('hide-item');

                        location.href="<?=$contents['return_url']?>";

                        //location.reload();
                        return;
                    }else{
                        errorTxt.classList.remove('hide-item');
                        errorTxt.classList.add('show-item');
                    }
                }).catch(function(error){
                    errorTxt.classList.remove('hide-item');
                    errorTxt.classList.add('show-item');
                    
                });
            } catch (error) {
                errorTxt.classList.remove('hide-item');
                errorTxt.classList.add('show-item');
            }
            turnOffLoadingScreen();
            // showItem(document.getElementById('login-form'));
            // hideItem(document.getElementById('login-loading'));
        }
</script>
