<!-- find 공지 -->
<?php 
    $detailUrl = "/community/detail?gubun=2&pageIndex=".$pageIndex."&id=";
    $eventCounter = 0;
?>


<div id="eventCardWrapper" class="grid" >
    <?php if(count($posts) == 0) { ?>
        <div style="font-size: 32px;min-height:200px;" class="d-flex justify-content-center">
            현재 진행중인 이벤트가 없습니다.
        </div>
    <?php } ?>

    <?php foreach($posts as $post){ ?>
        <?php if($eventCounter % 4 == 0) { ?> <div class='row row-cols-1 row-cols-md-4 g-4 <?=$eventCounter > 3 ?? 'mt-70' ?>'> <?php } ?>
            <div class="col"> 
                <a href="<?=$detailUrl?><?=$post -> id?>">
                    <img src="/img/user/<?=$post -> img_url?>" class="w-100 hover-saturate cursor-pointer" style="min-height: 380px;object-fit:cover;" />
                </a>
                <div style="font-size: 24px;" class="fw-bold mt-2">
                    <?=$post -> title?>
                </div>
            </div>
        <?php if($eventCounter % 4 == 3 || $eventCounter + 1 == count($posts)) { ?> </div> <?php } ?>
    <?php $eventCounter = $eventCounter+1; } ?>

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
    document.addEventListener("DOMContentLoaded", () => {
        const eventCardWrapper = document.getElementById("eventCardWrapper");
        const innerWidth = window.innerWidth;

        if(eventCardWrapper){
            if(innerWidth < 700){
                eventCardWrapper.style.marginTop = "30px";
            }else{
                eventCardWrapper.style.marginTop = "70px";
            }
        }
    });
</script>
   