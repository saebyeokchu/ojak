<?php
    if(!isset($_COOKIE['user_id'])){
        echo '<script>window.alert("유효하지 않은 접근입니다.")</script>';
        echo '<script>location.href="/";</script>';
    }

    if(isset($contents)){
        if(isset($contents['item'])){
            $item = $contents['item'][0];
        }
    }
?>


<!-- Add new gallery item -->
<nav class="navbar navbar-expand-lg bg-body-tertiary mt-1" style="border-top:3px solid #eeeeee; padding-top:70px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><?= (isset($item)) ? "작품 수정" : "작품 추가" ?></a>
    </div>
</nav>


<div class="page-wrap d-flex justify-content-center align-items-center pt-70 pb-70" >
    <div class="card mt-50 pb-30 p-5" style="width: 25rem;">
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
                <div class="d-flex flex-row justify-content-center gap-3 text-center pt-4">
                    <button type="button" class="btn btn-dark " onclick="history.back()">취소</button>
                    <button type="submit" class="btn btn-dark "><?= (isset($item)) ?  '수정' : '등록' ?></button>
                </div> 
            </form>
        </div>
    </div>
</div>



<script>

    window.onload = function(){
        //auth check
        const login_user_id = <?= $_COOKIE['user_id'] ?>;

        if(login_user_id){
            const loginUserName = '<?= $_COOKIE['user_name'] ?>';
            const inputAuthor = document.getElementById('input-author');

            if(loginUserName != 'null'){
                inputAuthor.innerText = loginUserName;
            }
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
        const id = '<?php
            if(isset($item)){
                if(isset($item -> id)){
                    echo $item -> id;
                }
            }
        ?>' || '';

        try {
            turnOnLoadingScreen();
            var postData = new FormData();
            postData.append('title', title);
            postData.append('content', content);
            postData.append('image', file.files[0]);
            postData.append('user_id',getCookieByName('user_id'));
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

        turnOffLoadingScreen();
    }
</script>
