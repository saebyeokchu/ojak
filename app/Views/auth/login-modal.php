

<!-- Modal -->
<div class="modal fade" id="openModal" tabindex="-1" aria-labelledby="addHomeArtLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    
     <!-- Modal Body -->
    <div  class="modal-content">
        <div id="loginModalLoginContent">
            <div class="modal-header">
                <h5 class="modal-title" >로그인</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:;" onsubmit=" authenticate( event ) ">
                <div class="d-flex flex-column gap-2" >
                    <input id="userId" type="text" class="form-control" placeholder="이메일" required>
                    <input id="userPw" type="password" class="form-control" placeholder="비밀번호" required>
                    <span class="text-danger hide-item" id="login-error-text" >
                        아이디나 비밀번호가 일치하지 않습니다. 
                    </span>
                </div>
                <!-- <div class="form-check mt-2">
                    <input type="checkbox" id="rememberMe" class="form-check-input">
                    <label for="rememberMe" class="form-check-label">로그인 상태 유지</label>
                </div> -->
                <button type="submit" class="btn btn-dark w-100 mt-4">로그인</button>
            </form>
            <div class="d-flex justify-content-between text-secondary mt-2">
                <span class="text-black no-text-decoration hover-underline cursor-pointer" onclick="changeToRegister()" >회원가입</span>
                <!-- <a href="#" class="text-black no-text-decoration hover-underline" >아이디 · 비밀번호 찾기</a> -->
            </div>
        </div>

        <!-- Modal Body (register) -->
        <div id="loginModalRegisterContent" class="hide-item">
            <div class="modal-header">
                <h5 class="modal-title" >회원가입</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="javascript:;" onsubmit=" register( event ) ">
                    <div class="d-flex flex-column gap-2" >
                        <span class="text-secondary" style="font-size:12px;">이름을 작성하지 않으시면 아이디로 자동 지정됩니다.</span>
                        <input type="text" name="register-name" class="form-control" id="register-name" placeholder="이름">
                        <span class="badge text-bg-secondary cursor-pointer" onclick="checkId()" >아이디(이메일) 중복확인</span>
                        <input type="email" name="register-id" class="form-control" id="register-id" placeholder="이메일" onkeydown="resetIdChecked()" required>
                        <input type="password" name="register-pw" class="form-control" id="register-pw" placeholder="비밀번호" required>
                        <input type="password" class="form-control" id="register-pw-chk" placeholder="비밀번호 확인" required>
                    </div>
                    <!-- <div class="form-check mt-2">
                        <input type="checkbox" id="rememberMe" class="form-check-input">
                        <label for="rememberMe" class="form-check-label">로그인 상태 유지</label>
                    </div> -->
                    <button type="submit" class="btn btn-dark w-100 mt-4">멤버가입 요청</button>
                    <div class="d-flex justify-content-center mt-2">
                        <span onclick="changeToLogin()" class="text-secondary hover-underline cursor-pointer" style="font-size:12px;">로그인하러 가기</span>
                    </div>
                </form>
            </div>


    </div>
        
  </div>
</div>


<!-- Modal -->
<!-- <div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" >
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
                  <small>
                      <label for="loginPw" class="form-label">비밀번호</label>
                        <input type="password" class="form-control" id="loginPw" name="pw" required>
                          <input type="checkbox" onchange="document.getElementById('loginPw').type = this.checked ? 'text' : 'password'"> 비밀번호 보기
                        </input>
                      <br />
                      <span class="cursor-pointer hover-underline">
                        <a href="/auth?return_url=">
                          조합원으로 가입하기
                        </a>
                      </span>
                      <br />
                      <span class="hide-item" id="login-error-text2" style="color:red;">
                        아이디나 비밀번호가 일치하지 않습니다
                      </span>
                    </small>
                </div>
          </div>    
          <div class="modal-footer" >
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">닫기</button>
            <button type="submit" class="btn btn-dark">로그인</button>
          </div>  
        </div>

        <div class="spinner-border position-absolute start-50 loading-spinner hide-item" style="top:50px;"  role="status" id="login-loading">
          <span class="visually-hidden">Loading...</span>
        </div>
      </form>
    </div>




  </div>
</div>
 -->

<script>
    // Open Modal
    const openModalBtn = document.getElementById("openModalBtn");
    const openModalMobileBtn = document.getElementById("openModalMobileBtn");
    const modal = document.getElementById("loginModal");
    const closeModalBtn = document.getElementById("closeModalBtn");

    if(openModalBtn){
        openModalBtn.addEventListener("click", () => {
            modal.style.display = "flex"; // Show modal
            changeToLogin();
        });
    }

    if(openModalMobileBtn){
        openModalMobileBtn.addEventListener("click", () => {
            closeToggleDivSm();
            modal.style.display = "flex"; // Show modal
            changeToLogin();
        });
    }

    if(closeModalBtn){
        closeModalBtn.addEventListener("click", () => {
            modal.style.display = "none"; // Hide modal
        });
    }
    
    // Close modal when clicking outside the modal content
    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            changeToLogin();
            modal.style.display = "none";
        }
    });

    

    async function authenticate(event){
        event.preventDefault();

        console.log("auth started");

        turnOnLoadingScreen();

        const errorTxt = document.getElementById('login-error-text');

        try {
            var postData = new FormData();
            postData.append('id', document.getElementById('userId').value);
            postData.append('pw', document.getElementById('userPw').value);

            await axios.post('/auth/verify', postData).then(function(response){
                if(response.data.status == 'success'){
                    const userData = response.data.user[0];

                    addCookie('user_id',userData.id);
                    addCookie('user_email',userData.user_id);
                    addCookie('user_name',userData.user_name);

                    errorTxt.classList.remove('show-item');
                    errorTxt.classList.add('hide-item');

                    location.reload();
                    return;
                }else{
                    errorTxt.classList.remove('hide-item');
                    errorTxt.classList.add('show-item');
                    turnOffLoadingScreen();
                }
            });

        } catch (error) {
            errorTxt.classList.remove('hide-item');
            errorTxt.classList.add('show-item');
            turnOffLoadingScreen();
        }

    }

    function changeToLogin(){
        const loginModalLoginContent = document.getElementById("loginModalLoginContent");
        const loginModalRegisterContent = document.getElementById("loginModalRegisterContent");

        const loginModalTitle =  document.getElementById("loginModalTitle");

        //hide login
        if(loginModalRegisterContent){
            loginModalRegisterContent.classList.add("hide-item");
        }
        
        //show register
        if(loginModalTitle){
            loginModalTitle.innerText="로그인";
        }

        if(loginModalLoginContent){
            loginModalLoginContent.classList.remove("hide-item");
        }
    }

    let idChecked = false;

    function changeToRegister(){
        const loginModalLoginContent = document.getElementById("loginModalLoginContent");
        const loginModalRegisterContent = document.getElementById("loginModalRegisterContent");

        const loginModalTitle =  document.getElementById("loginModalTitle");

        //hide login
        if(loginModalLoginContent){
            loginModalLoginContent.classList.add("hide-item");
        }
        
        //show register
        if(loginModalTitle){
            loginModalTitle.innerText="회원가입";
        }

        if(loginModalRegisterContent){
            loginModalRegisterContent.classList.remove("hide-item");
        }

    }

    function resetIdChecked() {
        idChecked = false;
    }

    async function checkId(){
        const id = document.getElementById('register-id').value;

        if(!id){
            window.alert("아이디를 입력해주세요.");
        }else{
            //특수문자 체크
            if(characterCheck(id)){
                window.alert("특수문자 [ _ , - , @ , . ]만 허용됩니다. 이외는 제외하여 입력해 주세요.");
                return;
            }

            try{
                const postData = new FormData();
                postData.append('id',id);

                await axios.post('/auth/check', postData).then(function(response){
                    console.log(response);
                    if(response.data.status == 'success'){
                        const count = response.data.same_id_count;

                        if(count > 0){
                            idChecked = false;
                            window.alert("이미 사용되고 있는 아이디입니다. 다른 아이디를 사용해주세요.");
                            return;
                        }else{
                            idChecked = true;
                            window.alert("아이디 확인이 완료되었습니다.");
                        }
                    }
                }).catch(function(error){
                    console.log("error:", error);
                });
            }catch(error){
                window.alert("회원가입을 진행할 수 없습니다. 잠시 후 다시 시도하여 주세요.")
            }
        }


    }

    async function register(event){
        event.preventDefault();

        //사전확인
        if(!idChecked){
            window.alert("아이디 중복확인을 진행하여 주세요.");
            return;
        }

        try {
            const pw =  document.getElementById('register-pw').value;
            const pw_chk =  document.getElementById('register-pw-chk').value;
            let name = document.getElementById('register-name').value;
            const id = document.getElementById('register-id').value;

            //특수문자 체크
            if(characterCheck(pw) || characterCheck(name)){
                window.alert("특수문자 [_]만 허용됩니다. 이외는 제외하여 입력해 주세요.");
                return;
            }

            if(!name){
                name = id;
            }

            if(pw.trim() != pw_chk.trim()){
                window.alert("비밀번호가 일치하지 않습니다");
                return;
            }

            var postData = new FormData();
            postData.append('name', name);
            postData.append('id', id);
            postData.append('pw', pw);

            await axios.post('/auth/register', postData).then(function(response){
                console.log(response);
                if(response.data.status == 'success'){
                    const insertedId = response.data.insertedId;
                    // window.alert('멤버가입 요청이 완료되었습니다. 승인메일 확인 후 로그인 해주세요.');

                    // document.cookie = "user_id=" + insertedId;
                    // document.cookie = "user_name=" + name;
                    location.href="/auth/register-request-complete?return_url=";
                    return;
                }
            }).catch(function(error){
                console.log("error:", error);
            });
        } catch (error) {
            console.error('Error authenticiation user:', error);
            window.alert("멤버가입 요청에 실패하였습니다. 잠시후 다시 시도해 주세요.");
        }
    }
</script>


