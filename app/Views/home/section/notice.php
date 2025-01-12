<?php
    $notices = [];

    if(isset($contents['notices'])){
        $notices = $contents['notices'];
    }
?>


<div class=" px-5 " style='font-family: "MaruBuri", sans-serif;'>
    <div class="row row-cols-1 row-cols-md-4" style="margin-top: 150px;margin-bottom: 150px; ">
        <div class="col p-3">
            <p style="font-size: 32px;"> 오작의 소식을 <br/>알려드립니다.</p>
            <?php if(count($notices) > 0) {?>
                <p style="font-size: 24px; margin-top: 50px;" ><a href="http://localhost/community/list/1?pageIndex=1 " class="text-dark">전체보기</a></p>
            <?php } ?>
        </div>
        <?php if(count($notices) > 0) {
                foreach($notices as $notice) {
        ?> <div class="col"  >
                <p class="bg-light p-3 cursor-pointer" style="font-size: 32px; height:250px; " onclick="moveToDetail(<?=$notice['id']?>)"><?=$notice['title']?></p>
            </div>
        <?php } }else{ ?>
            <div class="col"  >
                <p class="bg-light p-3" style="font-size: 32px; height:250px; ">등록된 공지사항이 없습니다.</p>
            </div>
        <?php } ?>

    </div>
</div>

<script>
    function moveToDetail(id){
        const urls = getUrl(id, 1, 1);
        location.href = urls.communityDetail;
    }
</script>


