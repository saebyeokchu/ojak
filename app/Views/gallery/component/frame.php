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
    <img class="img-responsive w-100" height="<?= $height ?>" src="/img/<?= $item['img_url'] ?>" alt="" style="object-fit: cover">
    <div class="overlay">
    <!-- <h2>Hover effect 1</h2> -->
        <a class="<?= isset($height_input) ? "info-lg" : "info"?>" onclick="moveToDetail('<?=$item['id']?>','<?=$item['title']?>','<?=$item['img_url']?>')">자세히 보기</a>
    </div>
</div>

<script>
    function moveToDetail(id,title,img_url){
        let passData = 'title='+title;
        passData += '&content='+ encodeURIComponent(document.getElementById('hide-content-'+id).innerHTML.trim());
        passData += '&img_url='+img_url;

        location.href="/gallery/"+id+"?"+passData;
        // console.log("/community/edit/"+pageIndex+"?"+passData)
    }
</script>