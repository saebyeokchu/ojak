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

<div class="for-lg">
<div class="d-flex justify-content-center   " style="margin-top:100px;margin-bottom:100px;">
    <div class="d-flex flex-column px-5    w-100" style="max-width:1440px;" >
        
        <!-- breadcrumb -->
        <?= view('/component/breadcrumb',[
            'breadsInput' => [ ['name' => '커뮤니티', 'url' => $returnUrl ], ['name' => 'Q&A', 'url' => ''] ]
        ]) ?>


        <!-- title -->
        <div class="d-flex flex-column gap-4 mt-100">
            <div style="font-size: 20px;" class="ojak-middle-gray">Q&A</div>
            <div style="font-size: 36px;" class="fw-bold">
                <?= $post["title"] ?>
            </div>
            <div style="font-size: 20px;" ><?=$post["created_at"];?></div>
        </div>

        <!-- content -->
        <div class="pt-50 mt-50" style="border-top:1px #D9D9D9 solid; font-size: 20px; line-height: 35px; min-height:380px;">
        <?= $post['content'] ?>
        </div>
    
        <!-- button -->
        <?php if($owned_by_user) { ?>
        <div class="d-flex flex-row gap-2 justify-content-center  mt-50" >
            <a class="bs-button no-text-decoration " href="/community/edit?id=<?=$post['id']?>&gubun=3&pageIndex=<?=$pageIndex?>"> 수정하기 </a>
            <span class="bs-button" onclick="deletePost(<?=$post['id']?>, '/community/qna?pageIndex=<?=$pageIndex?>')"> 삭제하기 </span>
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
        <div id="backToQnaListLink" class="d-flex justify-content-start w-100 align-middle cursor-pointer mt-150" >
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.98 26L34.5 26L34.5 22L15.98 22L15.98 16L8 24L15.98 32L15.98 26Z" fill="#17171B"/>
            </svg>
            <p class="fw-bold " style="margin-top:12px;">목록으로</p>
        </div>

    </div>
</div>
</div>

<div class="for-sm">
<div class="d-flex justify-content-center   " style="margin-top:100px;margin-bottom:100px;">
    <div class="d-flex flex-column px-5 w-100" style="max-width:1440px;" >
        
        <!-- breadcrumb -->
        <?= view('/component/breadcrumb',[
            'breadsInput' => [ ['name' => '커뮤니티', 'url' => $returnUrl ], ['name' => 'Q&A', 'url' => ''] ]
        ]) ?>


        <!-- title -->
        <div class="d-flex flex-column gap-2 mt-50">
            <div style="font-size: 15px;" class="ojak-middle-gray">Q&A</div>
            <div style="font-size: 24px;" class="fw-bold">
                <?= $post["title"] ?>
            </div>
            <div style="font-size: 15px;" ><?=$post["created_at"];?></div>
        </div>

        <!-- content -->
        <div class="pt-20 mt-20" style="border-top:1px #D9D9D9 solid; font-size: 20px; line-height: 35px; min-height:200px;">
            <?= $post['content'] ?>
        </div>
    
        <!-- button -->
        <?php if($owned_by_user) { ?>
        <div class="d-flex flex-row gap-2 justify-content-center " >
            <a class="bs-button-sm no-text-decoration " href="/community/edit?id=<?=$post['id']?>&gubun=3&pageIndex=<?=$pageIndex?>"> 수정하기 </a>
            <span class="bs-button-sm" onclick="deletePost(<?=$post['id']?>, '/community/qna?pageIndex=<?=$pageIndex?>')"> 삭제하기 </span>
        </div>
        <?php } ?>

        <!-- commnet -->
        <div class="d-flex flex-column mt-50" style="border-top:1px #D9D9D9 solid;padding-top:40px;font-size:20px;">
            <?php if(isset($comments) && count($comments) > 0) {
                    foreach($comments as $comment) {  ?>
                <div class="mt-4 d-flex flex-row justify-content-between">
                    <div>
                        <span class="fw-bold">오작 담당자</span>
                        <br />
                        <span class="ojak-middle-gray " style="font-size: 15px;"><?= $comment["created_at"]?></span>
                    </div>
                    <div class="dropdown pe-3">
                        <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            :
                        </button>
                        <ul class="dropdown-menu cursor-pointer">
                            <li onclick="deletecomment(<?=$comment['id']?>)" ><a class="dropdown-item"  >샥제</a></li>
                        </ul>
                    </div>
                </div>
                <div style="font-size: 20px;line-height: 35px;">
                    <?=$comment["comment"]?>
                </div>
            <?php } }?>


            <?php if($isAdmin) { ?>
                <div class="pt-20">
                    <textarea id="qnaAnswer2" class="w-100 mb-2" rows="4" style="border:1px #B3B3B3 solid;" placeholder="질문에 대한 답변을 입력하세요."></textarea>
                    <div class="d-flex w-100 justify-content-end">
                        <span class="bs-button-sm" onclick="addComment(<?=$post['id']?>)">답변 입력하기</span>
                    </div>
                </div>
            <?php } ?>

        </div>

        <!-- return text -->
        <div id="backToQnaListLink2" class="d-flex justify-content-start w-100 align-middle cursor-pointer mt-150" >
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.98 26L34.5 26L34.5 22L15.98 22L15.98 16L8 24L15.98 32L15.98 26Z" fill="#17171B"/>
            </svg>
            <p class="fw-bold " style="margin-top:12px;">목록으로</p>
        </div>

    </div>
</div>
</div>

<script>
    window.addEventListener('load', () => {
        document.getElementById('backToQnaListLink').onclick = () => location.href = getUrl(0,0,<?=$pageIndex?>).communityQna;
        document.getElementById('backToQnaListLink2').onclick = () => location.href = getUrl(0,0,<?=$pageIndex?>).communityQna;
     });


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

        let qnaAnswer = document.getElementById("qnaAnswer");
        let qnaAnswer2 = document.getElementById("qnaAnswer2");


        if(qnaAnswer){
            qnaAnswer = qnaAnswer.value;
        }
        
        if(qnaAnswer2){
            qnaAnswer2 = qnaAnswer2.value;
        }


        if(!qnaAnswer && !qnaAnswer2){
            window.alert("답변을 입력하세요");
            turnOffLoadingScreen();
            return;
        }

        let comment = null;

        if(qnaAnswer){
            comment = qnaAnswer;
        }else if(qnaAnswer2){
            comment = qnaAnswer2;
        }

        try {
            var postData = new FormData();
            postData.append('postId',postId);
            postData.append('comment',comment);

            axios.post('/api/insertComment', postData).then(function(response){
                console.log("success:", response);
                window.alert("답변이 등록되었습니다");
                location.reload();
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