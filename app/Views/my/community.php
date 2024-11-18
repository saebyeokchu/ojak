<?php
    if(isset($data)) {
        $posts = $data;
        $rowCount = count($data);
    }else{
        $rowCount = 0;
    }
    
?>

<!-- Community -->
<?php if($rowCount == 0) { ?>
    <div class="page-wrap d-flex flex-row align-items-center" style="min-height: 60vh;">
        <div class="container my-3">
            <div class="row justify-content-center text-center">
                <span class="h3">등록된 게시글이 없습니다.</span>
            </div>
        </div>
    </div>
<?php }else{ ?>
    <div >
        <table class="table align-middle mb-0 bg-white mt-2">
            <tbody>
                <?php foreach($posts as $post) { ?>
                <div id="hidden-content" style="visibility: hidden; height:0px;">
                    <?=$post['content']?>
                </div>
                <tr>
                    <td class="pt-3 ps-2">
                        <p class="hover-underline cursor-pointer">
                            <a href="/community/detail/<?= $post['id'] ?>/1" class="text-secondary no-text-decoration"><?= $post['title'] ?></a>
                        </p>
                    </td>
                    <td class="d-flex justify-content-end post-edit-buttons item-<?=$post['user_id']?>" >
                        <div class="for-lg  pt-3 pb-3">
                            <span class="sm-black-btn cursor-pointer me-3" onclick="moveToEditor('<?=$post['id']?>','<?=$post['title']?>')">
                                수정
                            </span>
                            <span class="sm-black-btn cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                삭제
                            </span>
                        </div>

                        <div class="for-sm  pt-3 pb-3">
                            <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                :
                            </button>
                            <ul class="dropdown-menu">
                                <li onclick="moveToEditor('<?=$post['id']?>','<?=$post['title']?>')"><a class="dropdown-item" >수정</a></li>
                                <li data-bs-toggle="modal" data-bs-target="#exampleModal"><a class="dropdown-item">삭제</a></li>
                            </ul>
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
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    
<?php }?>
    
<script>

    function deletePost(id){
        if(id){
            try {
                var postData = new FormData();
                postData.append('id',id);

                axios.post('/api/deletePost', postData).then(function(response){
                    console.log("success:", response);
                    window.alert(response.data.message)
                    window.reload();
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