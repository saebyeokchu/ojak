<?php
    $post = $contents["post"];
    $pageIndex = $contents["pageIndex"];
    $gubun = $contents["gubun"];

    $userId=0;
    if(isset($_COOKIE['user_id'])){
        $userId = $_COOKIE['user_id'];
    }

    //check ownership
    $owned_by_user = false;

    if(isset( $_COOKIE['user_id'])){
        if($_COOKIE['user_id'] == $post['user_id']){
            $owned_by_user = true;
        }
    }
?>

<div class="for-lg">
    <div class="d-flex justify-content-center   " style="margin-top:100px;margin-bottom:100px;">
        <div class="d-flex flex-column px-5 w-100" style="max-width:1440px;" >
                
            <!-- breadcrumb -->
            <?= view('/component/breadcrumb',[
                'breadsInput' => [ 
                    ['name' => '커뮤니티', 'url' => '/community/notice?pageIndex=1'], 
                    ['name' => '공지사항', 'url' => '/community/notice?pageIndex=1'] 
                ] ]) ?>

            <!-- title -->
            <div class="d-flex flex-column gap-4 mt-100">
                <div style="font-size: 20px;" class="ojak-middle-gray">공지사항</div>
                <div style="font-size: 36px;" class="fw-bold">
                    <?=$post["title"];?>
                </div>
                <div style="font-size: 20px;" ><?=$post["created_at"];?></div>
            </div>

            <!-- content -->
            <div class="pt-50 mt-50" style="border-top:1px #D9D9D9 solid; font-size: 20px; line-height: 35px; min-height:380px;">
                <?=$post["content"];?>
            </div>

            <!-- button -->
            <?php if($owned_by_user) { ?>
            <div class="d-flex flex-row gap-2 justify-content-center" >
                <a class="bs-button no-text-decoration " href="/community/edit?id=<?=$post['id']?>&gubun=1&pageIndex=<?=$pageIndex?>"> 수정하기 </a>
                <span class="bs-button" onclick="deleteNotice(<?=$post['id']?>)"> 삭제하기 </span>
            </div>
            <?php } ?>

            <!-- return text -->
            <div class="d-flex justify-content-start w-100 align-middle cursor-pointer mt-150" id="backToListLink">
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
                'breadsInput' => [ 
                    ['name' => '커뮤니티', 'url' => '/community/notice?pageIndex=1'], 
                    ['name' => '공지사항', 'url' => '/community/notice?pageIndex=1'] 
                ] ]) ?>

            <!-- title -->
            <div class="d-flex flex-column gap-2 mt-50">
                <div style="font-size: 15px;" class="ojak-middle-gray">공지사항</div>
                <div style="font-size: 24px;" class="fw-bold">
                    <?=$post["title"];?>
                </div>
                <div style="font-size: 15px;" ><?=$post["created_at"];?></div>
            </div>

            <!-- content -->
            <div class="pt-20 mt-20" style="border-top:1px #D9D9D9 solid; font-size: 20px; line-height: 35px; min-height:200px;">
                <?=$post["content"];?>
            </div>

            <!-- button -->
            <?php if($owned_by_user) { ?>
                <div class=" for-lg">
                    <div class="d-flex flex-row gap-2 justify-content-center" >
                        <a class="bs-button no-text-decoration " href="/community/edit?id=<?=$post['id']?>&gubun=1&pageIndex=<?=$pageIndex?>"> 수정하기 </a>
                        <span class="bs-button" onclick="deleteNotice(<?=$post['id']?>)"> 삭제하기 </span>
                    </div>
                </div>
                <div class=" for-sm">
                    <div class="d-flex flex-row gap-2 justify-content-center" >
                        <a class="bs-button-sm no-text-decoration " href="/community/edit?id=<?=$post['id']?>&gubun=1&pageIndex=<?=$pageIndex?>"> 수정하기 </a>
                        <span class="bs-button-sm" onclick="deleteNotice(<?=$post['id']?>)"> 삭제하기 </span>
                    </div>
                </div>
            <?php } ?>

            <!-- return text -->
            <div class="d-flex justify-content-start w-100 align-middle cursor-pointer mt-150" id="backToListLinkSm">
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
        document.getElementById('backToListLink').onclick = () => location.href = getUrl(0,0,<?=$pageIndex?>).communityNotice;
        document.getElementById('backToListLinkSm').onclick = () => location.href = getUrl(0,0,<?=$pageIndex?>).communityNotice;
     });

    function deleteNotice(id){
        turnOnLoadingScreen();

        if(window.confirm("해당 공지사항을 삭제하시겠습니까?") && id){

            try {
                var postData = new FormData();
                postData.append('id',id);

                axios.post('/api/deletePost', postData).then(function(response){
                    console.log("success:", response);
                    window.alert(response.data.message)
                    location.href = getUrl(0,0,<?=$pageIndex?>).communityNotice;
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