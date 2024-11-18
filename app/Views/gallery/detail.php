<?php
    if(isset($contents)){
        $item = $contents['item'][0];
    }else{
        return;
    }

    //check ownership
    $owned_by_user = false;

    if(isset( $_COOKIE['user_id'])){
        if($_COOKIE['user_id'] == $item -> user_id){
            $owned_by_user = true;
        }
    }

    
?>

<div class="container for-md-show position-relative" style="padding-top:70px;padding-bottom:70px;">
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <img src="/img/<?=$item -> img_url?>" class="w-100" />
        </div>
        <div class="col-lg-6 col-sm-12 position-relative" style="min-height:300px;">
            <div class="position-absolute top-0">
                <p class="gallery-detail-title"><?=$item -> title?></p>
                <p >
                    <span><?=$item -> user_name?></spane>
                    /
                    <span><?=$item -> created_at?></spane>
                </p>
                <p class="gallery-detail-content">
                    <?=$item -> content?>
                </p>
            </div>


            <div class="position-absolute bottom-0 w-100" >
                <div class="d-flex justify-content-center gap-3">
                    <?php if($owned_by_user) { ?>
                        <button class="sm-black-btn"  data-bs-toggle="modal" data-bs-target="#deleteModal">
                            삭제
                        </button>   
                    <?php } ?>
                    <a href="/gallery" ><button class="sm-black-btn ">
                        목록
                    </button></a>
                    <?php if($owned_by_user) { ?>
                        <a href="/gallery/edit/<?= $item -> id ?>">
                            <button class="sm-black-btn" >
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

<div class="container for-md-hide" style="padding-top:70px;padding-bottom:70px;min-height:300px">
    <div class="row">
        <img src="/img/<?=$item -> img_url?>" class="w-100" />
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
        <p class="gallery-detail-contents">
        <?=$item -> content ?>
        </p>
    </div>

    <div class="row">
        <div class="d-flex justify-content-center gap-3 mt-5">
            <?php if($owned_by_user) { ?>
                <button class="sm-black-btn " data-bs-toggle="modal" data-bs-target="#deleteModal" >
                    삭제
                </button>
            <?php } ?>
            <a href="/gallery">
                <button class="sm-black-btn">
                    목록
                </button>
            </a>
            <?php if($owned_by_user) { ?>
                <a href="/gallery/edit/<?= $item -> id ?>">
                    <button class="sm-black-btn " >
                        수정
                    </button>
                </a>    
            <?php } ?>
        </div>
    </div>
</div>


<?= view('/gallery/deleteModal',array('id'=>$item->id,'return_url'=>'/gallery')) ?>

<script>
    //show post-edit-buttons depends on login state
    const btns = document.getElementsByClassName('gallery-action-btn');

    const user_id = localStorage.getItem('user_id');
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

   
</script>