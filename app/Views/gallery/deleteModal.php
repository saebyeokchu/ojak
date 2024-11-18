<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="edeleteModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <div class="modal-body">
                게시글을 영구히 삭제하시겠습니까?
            </div>
            <div class="modal-footer">
                <button type="button" class="sm-black-btn" data-bs-dismiss="modal">닫기</button>
                <button type="button" class="sm-black-btn" onclick="deleteGallery()">삭제하기</button>
            </div>
        </div>
    </div>
</div>

<script>
     function deleteGallery(){
        try {
            const targetId = <?= $id ?>;

            var postData = new FormData();
            postData.append('id',targetId);

            axios.post('/api/deleteGallery', postData).then(function(response){
                console.log("success:", response);
                window.alert(response.data.message);
                location.href='<?=$return_url ?>';
                return;
            }).catch(function(error){
                console.log("error:", error);
            });
            
        } catch (error) {
            console.error('Error deleting data:', error);
            window.alert("게시물을 삭제할 수 없습니다. 잠시 후 다시 시도하여 주세요.")
        }

        
    }
</script>