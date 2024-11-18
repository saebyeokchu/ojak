<?php
    if(isset($data)) {
        $items = $data;
        $count = count($data);
    }else{
        $count = 0;
    }
    
?>

<!-- Gallery Contents -->
<?php if($count == 0){ ?>
    <div class="page-wrap d-flex flex-row align-items-center" style="min-height: 60vh;">
        <div class="container my-3">
            <div class="row justify-content-center text-center">
                <span class="h3">등록된 작품이 없습니다.</span>
            </div>
        </div>
    </div>
<?php }else{ ?>
<div class="container pb-100" style="margin-top:15px;">
    <div class="row p-3 gap-5 gx-5 gy-3">
        <?php foreach($items as $item) { ?>
            <div class="card col-lg-4 col-sm-12" >
                <img 
                    src="/img/<?=$item['img_url']?>"
                    class="card-img-top"
                    alt="Waterfall"
                    width="400"
                    height="300"
                    style="object-fit: cover;"
                />
                <div class="card-body">
                    <div class="d-grid">
                        <h5 class="card-title pt-2">
                            <?=$item['title']?>
                        </h5>
                        <p > <?= $item['content']?></p>
                        <!-- <div>
                            <span class="badge rounded-pill text-bg-secondary">이작가</span>
                            <span class="badge rounded-pill text-bg-secondary">전시작품</span>
                        </div> -->
                    </div>
                    <div class="d-flex text-center justify-content-center pt-4 gap-3 gx-3 gy-3">
                        <button type="button " class="sm-black-btn" >수정</button>
                        <button type="button " class="sm-black-btn" data-bs-toggle="modal" data-bs-target="#deleteModal">삭제</button>
                    </div> 
                    <?= view('/gallery/deleteModal',array('id'=>$item['id'],'return_url'=>'/my/gallery')) ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php } ?>



