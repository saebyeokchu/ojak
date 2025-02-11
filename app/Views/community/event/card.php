<!-- find 공지 -->
<?php 
    $detailUrl = "/community/detail?gubun=2&pageIndex=".$pageIndex."&id=";
    $eventCounter = 0;
?>


<div id="eventCardWrapper" class="grid " >
    <?php if(count($posts) == 0) { ?>
        <div style="min-height:200px;" class="d-flex justify-content-center pt-3">
            <span class="for-lg" style="font-size: 32px;">현재 진행중인 이벤트가 없습니다.</span>
            <span class="for-sm mt-5" style="font-size: 18px;">현재 진행중인 이벤트가 없습니다.</span>
        </div>
    <?php } ?>

    <?php foreach($posts as $post){ ?>
        <?php 
            if($eventCounter % 4 == 0) { 
                if($eventCounter >= 2) {  ?>
                    <div class='row row-cols-1 row-cols-md-4 mt-4'> 
                <?php }else{ ?> 
                    <div class='row row-cols-1 row-cols-md-4 '> 
                <?php } } ?>
                        <div class="col mt-3"> 
                            <a href="<?=$detailUrl?><?=$post -> id?>">
                                <img src="/img/user/<?=$post -> img_url?>" class="w-100  cursor-pointer" style="min-height: 380px;object-fit:cover;" />
                            </a>
                            <div style="font-size: 24px;" class="fw-bold mt-2">
                                <?=$post -> title?>
                            </div>
                        </div>
                <?php if($eventCounter % 4 == 3 || $eventCounter + 1 == count($posts)) { ?> 
                    </div> 
                <?php } ?>
    <?php 
        $eventCounter = $eventCounter+1; 
    } ?>

</div>



<!-- <div class="col">
            <a href="/community/detail?">
                <img src="/img/resource/gallery/1.png" class="img-fluid cursor-pointer" />
            </a>
            <div style="font-size: 24px;" class="fw-bold mt-2">
                이벤트 제목
            </div>
            <div style="font-size: 20px;" class="mt-2">
                이벤트에 대한 한줄 설명입니다
            </div>
        </div> -->
<?= view('/community/modal/eventModal')?>

<script>
   
</script>
   