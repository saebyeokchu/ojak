<?php 
    $height = 200;

    if(isset($height_input)){
        $height = $height_input;
    }
?>

<div id="hide-content-<?=$item['id']?>" style="visibility:hidden;height:0px;">
    <?= $item["content"] ?>
</div>

<div class="hovereffect cursor-pointer">
    <img class="img-responsive w-100" height="<?= $height ?>" src="/img/user/<?= $item['img_url'] ?>" alt="" style="object-fit: cover">
    <div class="overlay cursor-pointer">
    <!-- <h2>Hover effect 1</h2> -->
        <a class="<?= isset($height_input) ? "info-lg" : "info"?>" href="/gallery/<?=$item['id']?>"><?=$item['title']?></a>
    </div>
</div>
