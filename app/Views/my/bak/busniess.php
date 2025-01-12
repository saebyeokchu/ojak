<?php
    $count = 0;
    
    if(isset($data)) {
        $items = $data;
        $count = count($data);
    }
    
?>

<!-- Gallery Contents -->
<?php if($count == 0){ ?>
    <div class="page-wrap d-flex flex-row align-items-center" style="min-height: 60vh;">
        <div class="container my-3">
            <div class="row justify-content-center text-center">
                <span class="h3">설정가능한 정보가 없습니다.</span>
            </div>
        </div>
    </div>
<?php }else{ ?>
    <form class="p-3" action="/business/edit" method="post">
        <button type="submit" class="sm-black-btn">수정</button>
        <?php foreach($data as $d) { ?>
            <div class="mt-3">
                <label class="form-label"><?= $d['name'] ?></label>
                <input type="text" name="<?= $d['id'] ?>" id="<?= $d['id'] ?>" class="form-control" value="<?= $d['value'] ?>" />
            </div>

        <?php } ?>
    </form>
    <?php } ?>



