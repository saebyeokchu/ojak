<div class="hovereffect cursor-pointer">
    <div class="w-100 empty-work img-responsive" style="height:400px">
    </div>
    <div class="overlay">
    <!-- <h2>Hover effect 1</h2> -->
        <a class="info cursor-pointer" data-bs-toggle="modal" data-bs-target="#postGallery">전시</a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="postGallery" tabindex="-1" aria-labelledby="postGallery" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">작품사진</h5>
            </div>
            <div class="modal-body">
                <input class="form-control" type="file" id="galleryImgFile" name="galleryImgFile" accept="image/*"  required />
            </div>
            <div class="modal-footer">
                <button type="button" class="sm-black-btn" data-bs-dismiss="modal">닫기</button>
                <button type="button" class="sm-black-btn" onclick="update('<?=$id?>')" >등록</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function update(galleryId){
        event.preventDefault();

        const file = document.getElementById('galleryImgFile').files[0];

        if(!file){
            window.alert("등록할 작품을 업로드 해주세요.");
            return;
        }

        showLoadingSpinner();
        try {
            var postData = new FormData();
            postData.append('title', galleryId);
            postData.append('image', file);
            postData.append('user_id',3); //fixed
            postData.append('exhibit',galleryId);

            axios.post('/gallery/insert', postData, { headers: {
                        'Content-Type': 'multipart/form-data', // Ensure correct headers
            }}).then(function(response){
                const data =  response.data;
                console.log(response)

                if(data['status'] == 'success'){
                    console.log("success:", response);
                    location.reload();
                }else{
                    window.alert('등록에 실패하였습니다. 잠시후 다시 시도하여 주세요');
                }
                
            }).catch(function(error){
                console.log("error:", error);
            });
            
        } catch (error) {
            console.error('Error inserting data:', error);
            window.alert('등록에 실패하였습니다. 잠시후 다시 시도하여 주세요');
        }
        hideLoadingSpinner();
    }

</script>
