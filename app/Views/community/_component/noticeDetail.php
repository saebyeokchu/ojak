<?php
    $post = $contents["post"];
    $pageIndex = $contents["pageIndex"];
    $gubun = $contents["gubun"];
    $deleteUrl = "/community/list/".$gubun."?pageIndex=".$pageIndex;

    $userId=0;
    if(isset($_COOKIE['user_id'])){
        $userId = $_COOKIE['user_id'];
    }

    //check ownership
    $owned_by_user = false;

    if(isset( $_COOKIE['user_id'])){
        if($_COOKIE['user_id'] == $post['id']){
            $owned_by_user = true;
        }
    }
?>

<div class="d-flex flex-column ms-5 me-5" style="margin-top:200px; margin-bottom:100px;">
        
    <!-- breadcrumb -->
    <nav class="text-black d-flex flex-row gap-3" >
        <div>
            <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 0L0 4V12H3.125V7.33333H6.875V12H10V4L5 0Z" fill="#17171B"/>
            </svg>
        </div>
        <div>
            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.58525 0.237468L7.79724 5.55673C7.87097 5.62005 7.92307 5.68865 7.95355 5.76253C7.98452 5.83641 8 5.91557 8 6C8 6.08443 7.98452 6.16359 7.95355 6.23747C7.92307 6.31135 7.87097 6.37995 7.79724 6.44327L1.58525 11.7784C1.41321 11.9261 1.19816 12 0.940091 12C0.682026 12 0.460828 11.9208 0.276496 11.7625C0.0921646 11.6042 -9.02928e-07 11.4195 -8.84474e-07 11.2084C-8.66021e-07 10.9974 0.0921646 10.8127 0.276497 10.6544L5.69585 6L0.276497 1.34565C0.104455 1.19789 0.0184326 1.01594 0.0184326 0.79979C0.0184327 0.58322 0.110599 0.395779 0.294931 0.237468C0.479262 0.0791562 0.694316 3.14991e-07 0.940092 3.36477e-07C1.18587 3.57964e-07 1.40092 0.0791563 1.58525 0.237468Z" fill="#17171B"/>
            </svg>
        </div>
        <div class="fw-bold" style="padding-top:1px;">
            커뮤니티
        </div>
        <div>
            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.58525 0.237468L7.79724 5.55673C7.87097 5.62005 7.92307 5.68865 7.95355 5.76253C7.98452 5.83641 8 5.91557 8 6C8 6.08443 7.98452 6.16359 7.95355 6.23747C7.92307 6.31135 7.87097 6.37995 7.79724 6.44327L1.58525 11.7784C1.41321 11.9261 1.19816 12 0.940091 12C0.682026 12 0.460828 11.9208 0.276496 11.7625C0.0921646 11.6042 -9.02928e-07 11.4195 -8.84474e-07 11.2084C-8.66021e-07 10.9974 0.0921646 10.8127 0.276497 10.6544L5.69585 6L0.276497 1.34565C0.104455 1.19789 0.0184326 1.01594 0.0184326 0.79979C0.0184327 0.58322 0.110599 0.395779 0.294931 0.237468C0.479262 0.0791562 0.694316 3.14991e-07 0.940092 3.36477e-07C1.18587 3.57964e-07 1.40092 0.0791563 1.58525 0.237468Z" fill="#17171B"/>
            </svg>
        </div>
        <div class="fw-bold" style="padding-top:1px;">
            공지사항
        </div>
    </nav>

    <!-- title -->
    <div class="d-flex flex-column gap-4 mt-150">
        <div style="font-size: 20px;" class="ojak-middle-gray">공지사항</div>
        <div style="font-size: 36px;" class="fw-bold">
            <?=$post["title"];?>
        </div>
        <div style="font-size: 20px;" ><?=date("Y-m-d H:i:s",$post["created_at"]);?></div>
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


<script>
     window.addEventListener('load', () => {
        document.getElementById('backToListLink').onclick = () => location.href = getAllUrl().communityNotice;
     });
    async function deleteNotice(id){
        turnOnLoadingScreen();

        if(window.confirm("해당 공지사항을 삭제하시겠습니까?") && id){

            try {
                var postData = new FormData();
                postData.append('id',id);

                await axios.post('/api/deletePost', postData).then(function(response){
                    console.log("success:", response);
                    window.alert(response.data.message)
                    location.href = '<?=$deleteUrl?>';
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