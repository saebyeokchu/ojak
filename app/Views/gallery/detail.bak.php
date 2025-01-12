<?php
    // if(isset($contents)){
    //     $item = $contents['item'][0];
    // }else{
    //     return;
    // }

    //check ownership
    $owned_by_user = false;

    if(isset( $_COOKIE['user_id'])){
        if($_COOKIE['user_id'] == $item -> user_id){
            $owned_by_user = true;
        }
    }

    
?>

<div class="bg-light for-md-show position-relative" style="padding : 130px 70px 130px 70px;">
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <img src="/img/user/<?=$item -> img_url?>" class="w-100" />
        </div>
        <div class="col-lg-6 col-sm-12 position-relative" style="min-height:300px;">
            <div class="position-absolute top-0 w-100 h-100">
                <p class="gallery-detail-title"><?=$item -> title?></p>
                <p >
                    <span><?=$item -> user_name?></spane>
                    /
                    <span><?=$item -> created_at?></spane>
                </p>
                <div class="gallery-detail-content bg-white border w-100 h-75 p-3">
                    <?=$item -> content?>
                </div>
            </div>


            <div class="position-absolute  end-0 " style="top:20px;">
                <div class="d-flex justify-content-center gap-3">
                    <?php if($owned_by_user) { ?>
                        <button class="btn btn-dark"  onclick="deleteGallery(<?= $item -> id ?>)">
                            삭제
                        </button>   
                    <?php } ?>
                    <a href="/gallery" ><button class="btn btn-dark ">
                        목록
                    </button></a>
                    <?php if($owned_by_user) { ?>
                        <a href="/gallery/edit/<?= $item -> id ?>">
                            <button class="btn btn-dark" >
                                수정
                            </button>
                        </a>
                    <?php } ?>
                    <?php ?>    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="for-md-hide bg-light" style="padding:130px 70px 130px 70px;min-height:300px;">
    <div class="row">
        <img src="/img/user/<?=$item -> img_url?>" class="w-100" />
    </div>

    <div class="row">
        <p class="gallery-detail-title-sm"><?=$item -> title?></p>
    </div>

    <div class="row">
        <span><?=$item -> user_name?></spane>
        /
        <span><?=$item -> created_at?></spane>
    </div>

    <div class="row pt-3">
        <div class="gallery-detail-contents bg-white w-100 border" style="min-height: 250px;">
            <?=$item -> content ?>
        </div>
    </div>

    <div class="row">
        <div class="d-flex justify-content-center gap-3 mt-5">
            <?php if($owned_by_user) { ?>
                <button class="btn btn-dark " onclick="deleteGallery(<?= $item -> id ?>)" >
                    삭제
                </button>
            <?php } ?>
            <a href="/gallery">
                <button class="btn btn-dark">
                    목록
                </button>
            </a>
            <?php if($owned_by_user) { ?>
                <a href="/gallery/edit/<?= $item -> id ?>">
                    <button class="btn btn-dark " >
                        수정
                    </button>
                </a>    
            <?php } ?>
        </div>
    </div>
</div>


<script>
    //show post-edit-buttons depends on login state
    const btns = document.getElementsByClassName('gallery-action-btn');

    const user_id = getCookieByName('user_id');
    const userId = <?= $item -> user_id; ?>;

    console.log(user_id, userId);

    if(userId == user_id){
        //showing item
        Array.from(btns).forEach( btn => {
            btn.classList.remove('hide-item');
            btn.classList.add('show-item');
        });
    }else{
        //hide item
        Array.from(btns).forEach( btn => {
            btn.classList.remove('show-item');
            btn.classList.add('hide-item');
        });
    }
    
    function moveToEditor(){
        try{
            location.href="/gallery/edit/<?= $item->id ?>";
        }catch(error){
            window.alert("게시물을 삭제할 수 없습니다. 잠시 후 다시 시도하여 주세요.")
        }
    }

    function deleteGallery(targetId) {
        if(window.confirm("게시글을 영구히 삭제하시겠습니까?")){
            try {
                turnOnLoadingScreen();

                var postData = new FormData();
                postData.append('id',targetId);

                axios.post('/api/deleteGallery', postData).then(function(response){
                    console.log("success:", response);
                    window.alert(response.data.message);
                    location.href='/gallery';
                    return;
                }).catch(function(error){
                    console.log("error:", error);
                });
                
            } catch (error) {
                console.error('Error deleting data:', error);
                window.alert("게시물을 삭제할 수 없습니다. 잠시 후 다시 시도하여 주세요.")
            }

            turnOffLoadingScreen();
        }
    }

   
</script>