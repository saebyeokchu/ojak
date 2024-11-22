<?php
    $post = $contents["post"];
    $pageIndex = $contents["pageIndex"];
?>
<div class="container" style="padding-top:70px;padding-bottom:70px;">

    <div class="d-flex justify-content-between">
        <p class="title"><?= $post["title"] ?></p>
    </div>


    <p class="text-secondary "><small><?= $post["created_at"] ?></small></p>

    <div class="community-content" id="detail-content">
        <?= $post["content"] ?>
    </div>

    <div class="d-flex justify-content-center gap-3">
        <button id="post-detail-delete-btn" class="sm-black-btn mt-5 hide-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
            삭제
        </button>
        <a href="/community/<?=$pageIndex?>" ><button class="sm-black-btn mt-5">
            목록
        </button></a>
        <button id="post-detail-edit-btn"  class="sm-black-btn mt-5 hide-item" onclick="moveToEditor('<?=$post['id']?>','<?=$post['title']?>')">
            수정
        </button>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button type="button" class="sm-black-btn" onclick="deletePost('<?=$post['id']?>')">삭제하기</button>
            </div>
            </div>
        </div>
    </div>

</div>

<script>
    window.onload = function() {
        //show post-edit-buttons depends on login state
        const deleteBtn = document.getElementById('post-detail-delete-btn');
        const editBtn = document.getElementById('post-detail-edit-btn');
        const user_id = getCookieByName('user_id');
        
        const userId = <?= $post["user_id"]; ?>;

        if(userId == user_id){
            deleteBtn.classList.remove('hide-item');
            deleteBtn.classList.add('show-item');

            editBtn.classList.remove('hide-item');
            editBtn.classList.add('show-item');
        }else{
            deleteBtn.classList.add('hide-item');
            deleteBtn.classList.remove('show-item');

            editBtn.classList.add('hide-item');
            editBtn.classList.remove('show-item');
        }
    }
    
    function moveToEditor(id,title){
        let passData = 'title='+title;
        passData += '&content='+ encodeURIComponent(document.getElementById('detail-content').innerHTML.trim());
        passData += '&id='+id;
    

        const pageIndex = <?= $pageIndex ?>;
        location.href="/community/edit/"+pageIndex+"?"+passData;
        console.log("/community/edit/"+pageIndex+"?"+passData)

    }

    function deletePost(id){
        if(id){
            try {
                var postData = new FormData();
                postData.append('id',id);

                axios.post('/api/deletePost', postData).then(function(response){
                    console.log("success:", response);
                    window.alert(response.data.message)
                    location.href="/community/1";
                    return;
                }).catch(function(error){
                    console.log("error:", error);
                });
                
                return;
            } catch (error) {
                console.error('Error deleting data:', error);
            }
        }

        window.alert("게시물을 삭제할 수 없습니다. 잠시 후 다시 시도하여 주세요.")
        
    }
</script>