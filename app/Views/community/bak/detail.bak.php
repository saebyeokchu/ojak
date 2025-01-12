<?php
    $post = $contents["post"];
    $pageIndex = $contents["pageIndex"];
    $gubunNum = $contents["gubunNum"];


    $userId=0;
    if(isset($_COOKIE['user_id'])){
        $userId = $_COOKIE['user_id'];
    }
?>
<div class="bg-light " style="padding: 130px 100px 130px 100px;">

    <div class="d-flex justify-content-between">
        <p class="title"><?= $post["title"] ?></p>
    </div>


    <p class="text-secondary "><small><?= $post["created_at"] ?></small></p>

    <div class="community-content bg-white border p-3" id="detail-content">
        <?= $post["content"] ?>
    </div>
    <div class="d-flex justify-content-center gap-3">
        <button id="post-detail-delete-btn" class="btn btn-dark mt-5 <?=$post['user_id'] == $userId? "show-item" : "hide-item"?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
            삭제 
        </button>
        <a href="/community/list/<?=$gubunNum ?>?index=<?=$pageIndex?>" >
            <button class="btn btn-dark mt-5">
                목록
            </button>
        </a>
        <a href="/community/edit/<?=$post['id']?>">
            <button id="post-detail-edit-btn"  class="btn btn-dark mt-5 <?=$post['user_id'] == $userId? "show-item" : "hide-item"?>"  >
                수정
            </button>
        </a>
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
    function deletePost(id){
        if(id){
            try {
                turnOnLoadingScreen();
                var postData = new FormData();
                postData.append('id',id);

                axios.post('/api/deletePost', postData).then(function(response){
                    console.log("success:", response);
                    window.alert(response.data.message)
                    location.href="/community/list/<?=$gubunNum?>?index=<?=$pageIndex?>";
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
        turnOffLoadingScreen();
    }
</script>