<!-- Add new gallery item -->
<div class="page-header d-flex justify-content-center text-center">
    <div class="title" data-aos="fade-up" data-aos-duration="1500">
        <p class="main-title">작품추가</p>
    </div>
</div>


<div class="container pt-70 pb-70">
    <div class="row bg-white pt-70 pb-70">
        <div class="col-lg-6 d-flex justify-content-center">
            <div class="card" style="width:400px; height:500px;">
                <div  class="d-flex justify-content-center" style="width:400px; height:300px; border-bottom:1px solid #eeeeee">
                    <span id="input-file-display-text" style="margin-top:150px" class="text-secondary">작품사진</span>
                    <img class=" hide-item" id="input-file-display" style="width:400px; height:300px;object-fit:cover;" />
                </div> 
                <div class="card-body">
                    <div class="d-grid">
                        <h5 class="card-title pt-2">
                            <span class="text-secondary" id="input-name-display">제목</span>
                            <span class="badge text-bg-secondary" id="input-author">작가이름</span>
                        </h5>
                        <p class="text-secondary" id="input-content-display">내용</p>
                    </div>
                    <div class="d-grid text-center pt-4">
                        <button type="button" class="long-gray-btn" disabled>상세버튼</button>
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-lg-6 position-relative border p-3" style="width:400px; height:500px;">
            <div>
                *아래에 등록할 작품의 정보를 입력하세요.
            </div>
            <form class="mt-3" action="javascript:;" onsubmit=" insert( event ) ">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">작품이름</label>
                    <input oninput="onnamechange(event)" type="text" class="form-control" id="input-name"  required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">작품내용</label>
                    <!-- <input type="text" class="form-control" id="input-content" > -->
                    <textarea oninput="onContentChange(event)" class="form-control" id="input-content" name="input-content"></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">작품사진</label>
                    <input oninput="onFileChange(event)" class="form-control" type="file" id="input-file" name="input-file" accept="image/*" required>
                </div>
                <div class="d-flex justify-content-center" >
                    <button type="submit" class="long-black-btn mt-3 position-absolute" style="bottom: 20px; width:75%;">작품등록</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    //auth check
    const login_user_id = localStorage.getItem('user_id');

    console.log(login_user_id);

    if(!login_user_id || (login_user_id && parseInt(login_user_id) < 1)){
        window.alert("유효하지 않은 접근입니다. 로그인 후 다시 시도하여 주세요.");
        location.href="/";
    }else{
        const loginUserName = localStorage.getItem('user_name');
        const inputAuthor = document.getElementById('input-author');

        console.log(loginUserName);
        if(loginUserName != 'null'){
            inputAuthor.innerText = loginUserName;
        }
    }

    function onnamechange(event){
        document.getElementById('input-name-display').innerText = event.target.value;

        if(event.target.value.trim() == ''){
            document.getElementById('input-name-display').innerText = '제목';
        }
    }

    function onContentChange(event){
        document.getElementById('input-content-display').innerText = event.target.value;

        if(event.target.value.trim() == ''){
            document.getElementById('input-content-display').innerText = '내용';
        }
    }

    function onFileChange(event){
        const [file] = event.target.files;
        const previewImg = document.getElementById('input-file-display');
        const previewImgText = document.getElementById('input-file-display-text');

        if (file) {
            previewImg.src = URL.createObjectURL(file);
            previewImgText.innerText = '';

            previewImg.classList.remove('hide-item');
            previewImg.classList.add('show-item');
        }else{
            previewImgText.innerText = '작품사진';
            previewImg.src = '';

            previewImg.classList.add('hide-item');
            previewImg.classList.remove('show-item');
        }
    }

    async function insert(event){
        event.preventDefault();

        const title = event.target[0].value;
        const content = event.target[1].value;
        const file = document.getElementById('input-file');

        try {
            var postData = new FormData();
            postData.append('title', title);
            postData.append('content', content);
            postData.append('image', file.files[0]);
            postData.append('user_id',localStorage.getItem('user_id'));

            axios.post('/gallery/insert', postData, { headers: {
                        'Content-Type': 'multipart/form-data', // Ensure correct headers
            }}).then(function(response){
                const data =  response.data;

                if(data['status'] == 'success'){
                    location.href="/gallery/" + response.data.insertedId
                    console.log("success:", response);
                }
                
            }).catch(function(error){
                console.log("error:", error);
            });
            
            return;
        } catch (error) {
            console.error('Error inserting data:', error);
            window.alert('등록에 실패하였습니다. 잠시후 다시 시도하여 주세요');
        }
    }
</script>