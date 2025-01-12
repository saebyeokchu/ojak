<?php
    $rowCount = (int)$contents['rowCount'];

    if($rowCount > 0) {
        $posts = $contents['posts'];
        $pageIndex = $contents['pageIndex'];
        $gubunNum = $contents['gubunNum'];
        $hangeulName = $contents['hangeulName'];
        $pageStartIndex = floor((int)$contents['pageIndex'] / 5);
        $pageLastIndex = $pageStartIndex + floor( $rowCount / 5 ) ;
    }
    
    $userId = 0;
    if(isset($_COOKIE['user_id'])){
        $userId = $_COOKIE['user_id'];
    }

?>
<!-- Community -->


<div class="bg-white" style="padding-top:70px;">

    <!-- 카테고리 -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary mt-1" style="border-top:3px solid #eeeeee;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">커뮤니티</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link <?= $gubunNum == 1 ? 'active' : ''; ?>" aria-current="page" href="/community/list/1?index=1">공지사항</a>
                <a class="nav-link <?= $gubunNum == 2 ? 'active' : ''; ?>" href="/community/list/2?index=1">이벤트</a>
                <a class="nav-link <?= $gubunNum == 3 ? 'active' : ''; ?>" href="/community/list/3?index=1">Q&A</a>
            </div>
            </div>
        </div>
    </nav>

    <!-- contents -->
    <?php if($rowCount == 0) { ?>
        <div class="page-wrap d-flex flex-row align-items-center" style="min-height: 60vh;">
            <div class="container my-3">
                <div class="row justify-content-center text-center">
                    <span class="h3">등록된 게시글이 없습니다.</span>
                </div>
                <?php if( $userId > 0 ) { ?>
                <div class="row justify-content-center text-center mt-3">
                    <a  href="/community/new?sub=<?=$gubunNum?>" >
                        <button class="btn btn-dark btn-lg">
                            글쓰기
                        </button>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    <?php }else{ ?>

        <div class="container mt-30">
            <!-- section 1 -->
            <div class="d-flex flex-row">
                <div>
                    <h1 class="fw-bold p-3"><?=$hangeulName?></h1>
                </div>
                <?php if( $userId > 0 ) { ?>
                    <div class="mt-4">
                        <a  href="/community/new?sub=<?=$gubunNum?>" >
                            <button class="btn btn-dark">
                                글쓰기
                            </button>
                        </a>
                    </div>
                <?php } ?>
            </div>

            <!-- section 2 -->
            <table class="table table-bordered align-middle mb-0 bg-white  p-3">
                <thead class="table-light">
                        <tr>
                            <th  class="text-cetner"></th >
                            <th >제목</th >
                            <th >등록일자</th >
                            <th class="logged-in">수정</th >
                        </tr>
                    </thead>
                <tbody>
                <?php foreach($posts as $post) { ?>
                    <div id="hidden-content" style="visibility: hidden; height:0px;">
                        <?=$post['content']?>
                    </div>
                
                    <tr>
                        <td class="text-cetner"><?= $post['id'] ?></td>
                        <td >
                            <a class="text-secondary" href="/community/detail/<?= $post['id'] ?>?index=<?= $pageIndex ?>&gubunNum=<?=$gubunNum?>" ><?= $post['title'] ?></a>
                        </td>
                        <td >
                            <?= $post['created_at'] ?>
                        </td>
                        <td class="item-<?=$post['user_id']?> logged-in" >
                            <div class="post-edit-buttons d-flex <?=$post['user_id'] == $userId? "show-item" : "hide-item"?>">
                                <div class="for-lg  pt-3 pb-3 post-edit-buttons">
                                    <button class="btn btn-dark cursor-pointer me-3" onclick="location.href='/community/edit/<?=$post['id']?>'">
                                        수정
                                    </button>
                                    <button class="btn btn-dark cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        삭제
                                    </button>
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
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php }?>
</div>
    
    
<?php if($rowCount > 0) { ?>
    <nav aria-label="Page navigation example" class="pt-30 mb">
        <ul class="pagination justify-content-center" >
            <?php if($pageIndex != $pageStartIndex + 1) { ?>
                <li class="page-item">
                    <a class="page-link" href="/community/list/<?=$gubunNum?>?index=<?=$pageStartIndex + 1?>" tabindex="-1"><span class="text-secondary"><</span></a>
                </li>
            <?php } ?>
            <?php for($i = $pageStartIndex + 1 ; $i <= $pageLastIndex + 1 ; $i++) { ?>
                <li class="page-item"><a class="page-link" href="/community/list/<?=$gubunNum?>?index=<?=$i?>"><span class="text-secondary">
                    <?= $i ?>
                </span></a></li>
            <?php } ?>
            <?php if($pageIndex != $pageLastIndex + 1 ) { ?>
                <li class="page-item">
                    <a class="page-link" href="/community/list/<?=$gubunNum?>?index=<?=$pageLastIndex + 1?>"><span class="text-secondary">></span></a>
                </li>
            <?php } ?>
        </ul>
    </nav>
<?php }?>
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
                    location.reload();
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