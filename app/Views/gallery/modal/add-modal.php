
<!-- Modal Structure -->
<div id="addGalleryModal" class="modal z-5">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h5 class="modal-title">작품 추가</h5>
            <span id="closeAddGalleryModalBtn" class="close-btn">&times;</span>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
            <form action="javascript:;" onsubmit=" update( event ) ">
                <div >
                    <input placeholder="작품이름" maxlength="23" type="text" class="form-input" id="input-name" value="<?= (isset($item)) ?  $item->title : '' ?>" required>
                    <input placeholder="작품 한 줄 설명(선택)" type="text" class="form-input"  id="input-sub-title" maxlength="23">
                    <textarea placeholder="작품내용"  class="form-input" id="input-content" name="input-content" required ><?= (isset($item)) ?  $item->content : '' ?></textarea>
                    <input placeholder="구매링크(선택)" type="text" class="form-input"  id="input-buy-link" >
                    
                    <span class="text-secondary" style="font-size:12px;">업로드 가능 형식 : .png, .jpg, .jpeg</span>
                    <input  oninput="onFileChange(event)" class="form-input" type="file" id="input-file" name="input-file" accept=".png, .jpg, .jpeg"  <?= (isset($item)) ?  '' : 'required' ?>>
                    <small><?= (isset($item)) ?  '현재 사진:'.$item->img_url : '' ?></small>

                    <img id="input-file-display" class="img-fluid hide-item" ></div>
                </div>
                <button type="submit" class="btn btn-dark w-100 mt-4">등록</button>
            </form>
        </div>
    </div> 
</div>

<script>
    // Open Modal
    const openAddGalleryModalBtn = document.getElementById("openAddGalleryModalBtn");
    const addGalleryModal = document.getElementById("addGalleryModal");
    const closeAddGalleryModalBtn = document.getElementById("closeAddGalleryModalBtn");

    openAddGalleryModalBtn.addEventListener("click", () => {
        addGalleryModal.style.display = "flex"; // Show modal
    });

    closeAddGalleryModalBtn.addEventListener("click", () => {
        addGalleryModal.style.display = "none"; // Hide modal
    });

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

        console.log(file);

        if (file) {
            previewImg.src = URL.createObjectURL(file);

            previewImg.classList.remove('hide-item');
            previewImg.classList.add('show-item');
        }else{
            previewImg.src = '';

            previewImg.classList.add('hide-item');
            previewImg.classList.remove('show-item');
        }
    }

    async function update(event){
        event.preventDefault();

        const title = event.target[0].value;
        const subTitle = event.target[1].value;
        const content = event.target[2].value;
        const buyLink = event.target[3].value;
        const file = document.getElementById('input-file');
        const id = '<?php
            if(isset($item)){
                if(isset($item -> id)){
                    echo $item -> id;
                }
            }
        ?>' || '';

        try {
            addGalleryModal.style.display = "none"; // Hide modal
            turnOnLoadingScreen();
            var postData = new FormData();
            postData.append('title', title);
            postData.append('subTitle', subTitle);
            postData.append('content', content);
            postData.append('buyLink', buyLink);
            postData.append('image', file.files[0]);
            postData.append('user_id',getCookieByName('user_id'));
            postData.append('id',id);


            axios.post('/gallery/insert', postData, { headers: {
                        'Content-Type': 'multipart/form-data', // Ensure correct headers
            }}).then(function(response){
                const data =  response.data;
                console.log(response)

                if(data['status'] == 'success'){
                    console.log("success:", response);
                    location.href="/gallery/" + response.data.insertedId + "/?pageIndex=" + <?=$pageIndex?>;

                }
                
            }).catch(function(error){
                console.log("error:", error);
            });
            
            return;
        } catch (error) {
            console.error('Error inserting data:', error);
            window.alert('등록에 실패하였습니다. 잠시후 다시 시도하여 주세요');
        }
        addGalleryModal.style.display = "flex"; // Hide modal
        turnOffLoadingScreen();
       
    }
</script>