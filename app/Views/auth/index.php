<nav class="navbar navbar-expand-lg bg-body-tertiary mt-1" style="border-top:3px solid #eeeeee; padding-top:70px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">회원가입</a>
    </div>
</nav>

<div class="page-wrap d-flex justify-content-center align-items-center pt-70 pb-70" style="min-height: 60vh;">
    <!-- <div class="container bg-white py-5 px-5" style="width : 600px"> -->
    <div class="card mt-30 pb-30 p-5" style="width: 25rem;">
        <form action="javascript:;" onsubmit=" register( event ) ">
            <div class="mb-3">
                <label for="register-name" class="form-label">이름</label>
                <input type="text" name="register-name" class="form-control" id="register-name" >
                <small class="text-secondary">이름을 작성하지 않으시면 아이디로 자동 지정됩니다.</small>
            </div>
            <div class="mb-3">
                <label for="register-id" class="form-label">아이디(이메일)</label>
                <span class="badge text-bg-secondary cursor-pointer" onclick="checkId()" >아이디(이메일) 중복확인</span>
                <input type="email" name="register-id" class="form-control" id="register-id" onkeydown="resetIdChecked()" required>
            </div>
            <div class="mb-3">
                <label for="register-pw" class="form-label">비밀번호</label>
                <input type="password" name="register-pw" class="form-control" id="register-pw" required>
            </div>
            <div class="mb-3">
                <label for="register-pw-chk" class="form-label">비밀번호 확인</label>
                <input type="password" class="form-control" id="register-pw-chk" required>
            </div>
            <button type="submit" class="btn btn-dark btn-lg" style="width:300px;">멤버가입 요청</button>
        </form>
    </div>
</div>

<script>
    let idChecked = false;

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
            postData.append('name', document.getElementById('register-name').value);
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