<?php 
    $height = 200;

    if(isset($height_input)){
        $height = $height_input;
    }
?>

<div class="hovereffect cursor-pointer">
    <img class="img-responsive w-100" height="<?= $height ?>" src="/img/<?= $item['img_url'] ?>" alt="" style="object-fit: cover">
    <div class="overlay">
    <!-- <h2>Hover effect 1</h2> -->
        <a class="info cursor-pointer" data-bs-toggle="modal" data-bs-target="#postGallery3">수정</a>
        <a class="info cursor-pointer" onClick="deleteByGalleryId('<?= $id ?>')">삭제</a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="postGallery3" tabindex="-1" aria-labelledby="postGallery3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">작품사진</h5>
            </div>
            <div class="modal-body">
                <input class="form-control" type="file" id="updateImgFile" name="updateImgFile" accept="image/*"  required />
            </div>
            <div class="modal-footer">
                <button type="button" class="sm-black-btn" data-bs-dismiss="modal">닫기</button>
                <button type="button" class="sm-black-btn" onclick="updateByGalleryId('<?=$id?>')" >등록</button>
            </div>
        </div>
    </div>
</div>


<script>
    async function updateByGalleryId(galleryId){
        event.preventDefault();

        const file = document.getElementById('updateImgFile').files[0];

        if(!file){
            console.log(file);
            window.alert("등록할 작품을 업로드 해주세요.");
            return;
        }

        showLoadingSpinner();
        try {
            var postData = new FormData();
            postData.append('image', file);
            postData.append('exhibit',galleryId);

            axios.post('/gallery/updateByGalleryId', postData, { headers: {
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

    async function deleteByGalleryId(galleryId){
        if(window.confirm("작품을 삭제하시겠습니까?")){
            showLoadingSpinner();
            try {
                var postData = new FormData();
                postData.append('id',galleryId);

                await axios.post('/gallery/deleteByGalleryId', postData).then(function(response){
                    console.log("success:", response);
                    const result = response.data;
                    if(result.status === "success"){
                        location.reload();
                    }else{
                        window.alert("작품을 삭제할 수 없습니다. 잠시 후 다시 시도하여 주세요.");
                    }
                }).catch(function(error){
                    console.log("error:", error);
                });
            } catch (error) {
                console.error('Error deleting data:', error);
                window.alert("작품을 삭제할 수 없습니다. 잠시 후 다시 시도하여 주세요.");
            }
        }
        hideLoadingSpinner();
    }
</script>