
<!-- Modal Structure -->
<div id="editGalleryModal" class="modal z-5">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h5 id="editModalHeader" class="modal-title">작품 수정</h5>
            <span id="closeEditGalleryModalBtn" class="close-btn">&times;</span>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
            <form action="javascript:;" onsubmit=" edit( event ) ">
                <div class="d-flex flex-column gap-2" >
                    <input placeholder="작품 아이디" type="text" class="hide-item" id="editModalId">
                    <input placeholder="작품 이름" maxlength="23" type="text" class="form-control" id="editModalTitle"  required>
                    <input placeholder="작품 한 줄 설명(선택)" type="text" class="form-control"  id="editModalSubTitle" maxlength="23">
                    <textarea placeholder="작품 내용"  class="form-control" id="editModalContent" name="input-content" required ></textarea>
                    <input placeholder="구매링크(선택)" type="text" class="form-control"  id="editModalBuyLink">

                    <span class="text-secondary" style="font-size:12px;">업로드 가능 형식 : .png, .jpg, .jpeg</span>
                    <input  oninput="onFileChange(event)" class="form-control" type="file" id="editModalInputFile" name="editModalInputFile" accept=".png, .jpg, .jpeg"  >
                    <small id="previousInputUrl"></small>

                    <img id="input-file-display" class="img-fluid hide-item" ></div>
                </div>
                <button id="editModalBtn" type="submit" class="btn btn-dark w-100 mt-4">등록</button>
            </form>
        </div>
    </div> 
</div>

<script>
    closeEditGalleryModalBtn.addEventListener("click", () => {
        editGalleryModal.style.display = "none"; // Hide modal
    });

    //preview image
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

    async function edit(event){
        event.preventDefault();

        const id = event.target[0].value;
        const title = event.target[1].value;
        const subTitle = event.target[2].value;
        const content = event.target[3].value;
        const buyLink = event.target[4].value;
        const file = document.getElementById('editModalInputFile');

        try {
            editGalleryModal.style.display = "none"; // Hide modal
            turnOnLoadingScreen();
            var postData = new FormData();
            postData.append('title', title);
            postData.append('subTitle', subTitle);
            postData.append('content', content);
            postData.append('buyLink', buyLink );
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
                    location.reload();
                }
                
            }).catch(function(error){
                console.log("error:", error);
            });
            
            return;
        } catch (error) {
            console.error('Error inserting data:', error);
            window.alert('등록에 실패하였습니다. 잠시후 다시 시도하여 주세요');
        }
        editGalleryModal.style.display = "flex"; // Hide modal
        turnOffLoadingScreen();
       
    }
</script>