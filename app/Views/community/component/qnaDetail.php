<?php
    // $gubunNum = $contents["gubunNum"];
    if(isset($contents)){
        $post = $contents["post"];
        $pageIndex = $contents["pageIndex"];
        if(isset($contents["comments"])){
            $comments = $contents["comments"];
        }

        // echo var_dump($post);
        $returnUrl = "/community/list/3?pageIndex=".$pageIndex;
    }

    $userId = -1;
    if(isset($_COOKIE['user_id'])){
        $userId = $_COOKIE['user_id'];
    }

    //check ownership
    $owned_by_user = false;
    if($userId > -1){
        if($userId == $post['user_id']){
            $owned_by_user = true;
        }
    }

    $isAdmin = false;
    if($userId > -1){
        if($userId == 1){
            $isAdmin = true;
        }
    }
 

?>

<div class="d-flex flex-column ms-5 me-5" style="margin-top:200px; margin-bottom:100px;">
        
     <!-- breadcrumb -->
     <?= view('/component/breadcrumb',[
        'breadsInput' => [ ['name' => '커뮤니티', 'url' => $returnUrl ], ['name' => 'Q&A', 'url' => ''] ]
    ]) ?>


    <!-- title -->
    <div class="d-flex flex-column gap-4 mt-150">
        <div style="font-size: 20px;" class="ojak-middle-gray">Q&A</div>
        <div style="font-size: 36px;" class="fw-bold">
            <?= $post["title"] ?>
        </div>
        <div style="font-size: 20px;" ><?=date("Y-m-d H:i:s",$post["created_at"]);?></div>
    </div>

    <!-- content -->
    <div class="pt-50 mt-50" style="border-top:1px #D9D9D9 solid; font-size: 20px; line-height: 35px; min-height:380px;">
    <?= $post['content'] ?>
    </div>
 
    <!-- button -->
    <?php if($owned_by_user) { ?>
    <div class="d-flex flex-row gap-2 justify-content-center  mt-50" >
        <a class="bs-button no-text-decoration " href="/community/edit?id=<?=$post['id']?>&gubun=3&pageIndex=<?=$pageIndex?>"> 수정하기 </a>
        <span class="bs-button" onclick="deletePost(<?=$post['id']?>)"> 삭제하기 </span>
    </div>
    <?php } ?>

    <!-- commnet -->
    <div class="d-flex flex-column mt-50" style="border-top:1px #D9D9D9 solid;padding-top:40px;font-size:20px;">
        <?php if(isset($comments) && count($comments) > 0) {
                foreach($comments as $comment) {  ?>
            <div class="mt-4 d-flex flex-row justify-content-between">
                <div>
                    <span class="fw-bold">오작 담당자</span>
                    <span class="ojak-middle-gray ps-2"><?= $comment["created_at"]?></span>
                </div>
                <div class="dropdown pe-3">
                    <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        :
                    </button>
                    <ul class="dropdown-menu cursor-pointer">
                        <li  onclick="editcomment(<?=$comment['id']?>)"><a class="dropdown-item" >수정</a></li>
                        <li onclick="deletecomment(<?=$comment['id']?>)" ><a class="dropdown-item"  >샥제</a></li>
                    </ul>
                </div>
            </div>
            <div style="font-size: 20px;line-height: 35px;">
                <?=$comment["comment"]?>
            </div>
        <?php } }?>


        <?php if($isAdmin) { ?>
            <div style="padding-top:67px;">
                <textarea id="qnaAnswer" class="w-100 mb-2" rows="4" style="border:1px #B3B3B3 solid;" placeholder="질문에 대한 답변을 입력하세요."></textarea>
                <span class="bs-button" onclick="addComment(<?=$post['id']?>)">답변 입력하기</span>
            </div>
         <?php } ?>

    </div>

    <!-- return text -->
    <div class="d-flex justify-content-start w-100 align-middle cursor-pointer mt-150" onclick="location.href='/community/list/3?pageIndex=1'">
        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.98 26L34.5 26L34.5 22L15.98 22L15.98 16L8 24L15.98 32L15.98 26Z" fill="#17171B"/>
        </svg>
        <p class="fw-bold " style="margin-top:12px;">목록으로</p>
    </div>

</div>

<script>
    function deletecomment(id){
        turnOnLoadingScreen();

        if(window.confirm("해당 답변을 삭제하시겠습니까?") ){
            if(id)
                try {
                    var postData = new FormData();
                    postData.append('id',id);

                    axios.post('/api/deleteComment', postData).then(function(response){
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
        }else{
            turnOffLoadingScreen();
            return;
        }

        window.alert("답변을 삭제할 수 없습니다. 잠시 후 다시 시도하여 주세요.")
        turnOffLoadingScreen();
    }

    function editcomment(event){
        console.log(event.target)
    }

    function addComment(postId){
        turnOnLoadingScreen();

        const qnaAnswer = document.getElementById("qnaAnswer").value;

        if(!qnaAnswer){
            window.alert("답변을 입력하세요");
            return;
        }

        try {
            var postData = new FormData();
            postData.append('postId',postId);
            postData.append('comment',qnaAnswer);

            axios.post('/api/insertComment', postData).then(function(response){
                console.log("success:", response);
                window.alert(response.data.message)
                location.href = '<?=$returnUrl?>';
                return;
            }).catch(function(error){
                console.log("error:", error);
            });
            
            return;
        } catch (error) {
            console.error('Error deleting data:', error);
        }

        window.alert("게시물을 삭제할 수 없습니다. 잠시 후 다시 시도하여 주세요.")
        turnOffLoadingScreen();
    }
</script>