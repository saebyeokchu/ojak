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

    async function update(event){
        event.preventDefault();

        const title = event.target[0].value;
        const content = event.target[1].value;
        const file = document.getElementById('input-file');
        const id = <?= isset($item) ? $item -> id : null ?>;

        try {
            var postData = new FormData();
            postData.append('title', title);
            postData.append('content', content);
            postData.append('image', file.files[0]);
            postData.append('user_id',localStorage.getItem('user_id'));
            postData.append('id',id);

            axios.post('/gallery/insert', postData, { headers: {
                        'Content-Type': 'multipart/form-data', // Ensure correct headers
            }}).then(function(response){
                const data =  response.data;
                console.log(response)

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

<?php
    if(isset($contents)){
        if(isset($contents['item'])){
            $item = $contents['item'][0];
        }
    }
?>
<!-- Add new gallery item -->
<div class="page-header d-flex justify-content-center text-center">
    <div class="title" data-aos="fade-up" data-aos-duration="1500">
        <p class="main-title"><?= (isset($item)) ? "작품 수정" : "작품 추가" ?></p>
    </div>
</div>


<div class="container bg-white pt-70 pb-70">
    <div class="d-flex justify-content-end pe-5">
        <button class="sm-black-btn" onclick="history.back()"><?= (isset($item)) ?  "수정취소" : "등록취소" ?></button>
    </div>
    <div class="row pt-70 gy-5">
        <div class="col-lg-6 col-sm-12 d-flex justify-content-center ">
            <div class=" card" style="width:400px; height:500px;">
                <div  class="d-flex justify-content-center" style="width:400px; height:300px; border-bottom:1px solid #eeeeee">
                    <span 
                        id="input-file-display-text" 
                        style="margin-top:150px" 
                        class="text-secondary <?= (isset($item)) ?  "hide-item" : "show-item" ?>"
                    >작품사진</span>
                    <img 
                        src = '<?= (isset($item)) ?  "/img/".$item->img_url : '' ?>'
                        class='<?= (isset($item)) ?  "show-item" : "hide-item" ?>'
                        id="input-file-display" 
                        style="width:400px; height:300px;object-fit:cover;" 
                    />
                </div> 
                <div class="card-body">
                    <div class="d-grid">
                        <h5 class="card-title pt-2">
                            <span class="text-secondary" id="input-name-display"><?= (isset($item)) ?  $item->title : '제목' ?></span>
                            <span class="badge text-bg-secondary" id="input-author"><?= (isset($item)) ?  $item->user_name : '작가' ?></span>
                        </h5>
                        <p class="text-secondary" id="input-content-display"><?= (isset($item)) ?  $item->content : '내용' ?></p>
                    </div>
                    <div class="d-grid text-center pt-4">
                        <button type="button" class="long-gray-btn" disabled>상세버튼</button>
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12  d-flex justify-content-center " >
            <div class="card " style="width:400px;">
                <div class="text-secondary ps-3 pt-3" >
                    <small>*아래에 등록할 작품의 정보를 입력하세요.</small>
                </div>
                <div class="card-body p-3">
                    <form class="mt-3" action="javascript:;" onsubmit=" update( event ) ">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">작품이름</label>
                            <input oninput="onnamechange(event)" type="text" class="form-control" id="input-name" value="<?= (isset($item)) ?  $item->title : '' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">작품내용</label>
                            <!-- <input type="text" class="form-control" id="input-content" > -->
                            <textarea oninput="onContentChange(event)" class="form-control" id="input-content" name="input-content" ><?= (isset($item)) ?  $item->content : '' ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">작품사진</label>
                            <input oninput="onFileChange(event)" class="form-control" type="file" id="input-file" name="input-file" accept="image/*"  <?= (isset($item)) ?  '' : 'required' ?>>
                            <small><?= (isset($item)) ?  '현재 사진:'.$item->img_url : '' ?></small>
                        </div>
                        <div class="d-grid text-center pt-4">
                            <button type="submit" class="long-black-btn "><?= (isset($item)) ?  '수정' : '등록' ?></button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

