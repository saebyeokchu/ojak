<?php
    $notices = [];

    if(isset($contents['notices'])){
        $notices = $contents['notices'];
    }

?>

<div class="for-lg">
    <div class="d-flex justify-content-center" style="padding-top: 150px;padding-bottom: 150px;" >
        <div class="px-5 row row-cols-1 row-cols-md-4 w-100 " style="max-width:1440px;">
            <div class="col">
                <p style="font-size: 32px;font-family: 'MaruBuri', sans-serif;" > 오작의 소식을 <br/>알려드립니다.</p>
                <?php if(count($notices) > 0) {?>
                    <p style="font-size: 24px; margin-top: 50px;" ><a href="/community/notice?pageIndex=1" class="text-dark">전체보기</a></p>
                <?php } ?>
            </div>
            <?php if(count($notices) > 0) {
                    foreach($notices as $notice) {
            ?> <div class="col cursor-pointer" onclick="moveToDetail(<?=$notice['id']?>)" >
                    <div class="p-3 noticeBackground"  style="width:300px;height:250px;background-color:#FCFCFC;"> 
                        <p class="fw-bold" style="font-size: 20px; height:50px;font-family: 'MaruBuri', sans-serif;"><?=$notice['title']?></p>
                        <p style="height:110px; ">
                            <?=$notice['content']?>
                        </p>
                        <p><?=substr($notice['created_at'],0,10)?></p>
                    </div>
                </div>
            <?php } }else{ ?>
                <div class="col"  >
                    <p class="bg-ojak-light-grey" style="font-size: 20px; height:250px; background-color:#FCFCFC; ">등록된 공지사항이 없습니다.</p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="for-sm">
    <div class="d-flex justify-content-center" style="padding-top: 150px;padding-bottom: 150px;" >
        <div class="px-5 row row-cols-1 row-cols-md-4 w-100 " style="max-width:1440px;">
            <div class="col">
                <p style="font-size: 32px;font-family: 'MaruBuri', sans-serif;" > 오작의 소식을 <br/>알려드립니다.</p>
                <?php if(count($notices) > 0) {?>
                    <p style="font-size: 24px; margin-top: 50px;" ><a href="/community/notice?pageIndex=1" class="text-dark">전체보기</a></p>
                <?php } ?>
            </div>
            <?php if(count($notices) > 0) {
                    foreach($notices as $notice) {
            ?> <div class="col cursor-pointer" onclick="moveToDetail(<?=$notice['id']?>)" >
                    <div class="p-3 noticeBackground"  style="width:100%;height:250px;background-color:#FCFCFC;"> 
                        <p class="fw-bold" style="font-size: 18px; height:50px;font-family: 'MaruBuri', sans-serif;"><?=$notice['title']?></p>
                        <p style="height:110px; ">
                            <?=$notice['content']?>
                        </p>
                        <p><?=substr($notice['created_at'],0,10)?></p>
                    </div>
                </div>
            <?php } }else{ ?>
                <div class="col"  >
                    <p class="bg-ojak-light-grey" style="font-size: 18px; height:250px; background-color:#FCFCFC; ">등록된 공지사항이 없습니다.</p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>


    function moveToDetail(id){
        const urls = getUrl(id, 1, 1);
        location.href = urls.communityDetail;
    }
</script>


