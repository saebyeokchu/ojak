<?php
    if(isset($contents)){
        $item = $contents['item'];
    }
?>

<div class="container for-md-show" style="padding-top:70px;padding-bottom:70px;">
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <img src="/img/<?=$item['img_url']?>" class="w-100" />
        </div>
        <div class="col-lg-6 col-sm-12 position-relative">
            <div class="position-absolute top-0">
                <p class="gallery-detail-title"><?=$item['title']?></p>
                <p class="gallery-detail-content">
                    <?=$item['content']?>
                </p>
            </div>


            <div class="position-absolute bottom-0 w-100" >
                <a href="/gallery" ><button class="long-black-btn">
                    목록으로 돌아가기
                </button></a>
            </div>
        </div>
    </div>
</div>

<div class="container for-md-hide" style="padding-top:70px;padding-bottom:70px;">
    <div class="row">
        <img src="/img/<?=$item['img_url']?>" class="w-100" />
    </div>

    <div class="row">
        <p class="gallery-detail-title-sm"><?=$item['title']?></p>
    </div>

    <div class="row">
        <p class="gallery-detail-content">
        <?=$item['content']?>
        </p>
    </div>

    <div class="row">
        <a href="/gallery" ><button class="long-black-btn">
            목록으로 돌아가기
        </button></a>
    </div>
</div>