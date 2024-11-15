<!-- Auth -->
<div class="page-header d-flex justify-content-center text-center">
    <div class="title" data-aos="fade-up" data-aos-duration="1500">
        <p class="main-title">멤버가입</p>

    </div>
</div>

<div class="page-wrap d-flex flex-row align-items-center pt-70 pb-70" style="min-height: 60vh;">
    <div class="container bg-white py-5 px-5" style="width : 600px">
        <form action="javascript:;" onsubmit=" register( event ) ">
            <div class="mb-3">
                <label for="register-name" class="form-label">이름</label>
                <input type="text" name="register-name" class="form-control" id="register-name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="register-id" class="form-label">아이디</label>
                <input type="text" name="register-id" class="form-control" id="register-id" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="register-pw" class="form-label">비밀번호</label>
                <input type="password" name="register-pw" class="form-control" id="register-pw" required>
            </div>
            <div class="mb-3">
                <label for="register-pw-chk" class="form-label">비밀번호 확인</label>
                <input type="password" class="form-control" id="register-pw-chk" required>
            </div>
            <button type="submit" class="long-black-btn">멤버가입</button>
        </form>
    </div>
</div>

<script>
    async function register(event){
        event.preventDefault();
        try {
            const pw =  document.getElementById('register-pw').value;
            const pw_chk =  document.getElementById('register-pw-chk').value;
            const name = document.getElementById('register-name').value;

            if(pw.trim() != pw_chk.trim()){
                window.alert("비밀번호가 일치하지 않습니다");
                return;
            }

            var postData = new FormData();
            postData.append('name', document.getElementById('register-name').value);
            postData.append('id', document.getElementById('register-id').value);
            postData.append('pw', pw);

            await axios.post('/auth/register', postData).then(function(response){
                console.log(response);
                if(response.data.status == 'success'){
                    const insertedId = response.data.insertedId;
                    window.alert('멤버가입이 완료되었습니다');

                    localStorage.setItem('user_id', insertedId);
                    localStorage.setItem('user_name', name);

                    location.href='<?=$contents['return_url']?>';
                    return;
                }
            }).catch(function(error){
                console.log("error:", error);
            });
        } catch (error) {
            console.error('Error authenticiation user:', error);
            window.alert("멤버가입에 실패하였습니다. 잠시후 다시 시도해 주세요.");
        }
    }
</script>