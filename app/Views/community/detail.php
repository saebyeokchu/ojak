<?php
    $post = $contents["post"];
    $pageIndex = $contents["pageIndex"];
?>
<div class="container" style="padding-top:70px;padding-bottom:70px;">

    <p class="title"><?= $post["title"] ?></p>
    <p class="text-secondary "><small><?= $post["created_at"] ?></small></p>

    <div class="community-content">
        <?= $post["content"] ?>
    </div>

    <a href="/community/<?=$pageIndex?>" ><button class="long-black-btn w-100 mt-5">
        목록으로 돌아가기
    </button></a>
</div>