<?php
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
    <form class="p-3">
        <span class="badge rounded-pill text-bg-danger">사업자 정보 변경 기능을 준비중입니다</span>
        <div class="d-flex justify-content-end">
            <button type="submit" class="sm-black-btn " disabled>수정</button>
        </div>
        <?php foreach($data as $d) { ?>
            <div class="mb-3">
                <label class="form-label"><?= $d['name'] ?></label>
                <input type="text" class="form-control" value="<?= $d['value'] ?>" disabled>
            </div>

        <?php } ?>
    </form>
    <?php } ?>



