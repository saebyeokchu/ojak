<?php
    $count = 0;

    if(isset($data)) {
        $items = $data;
        $count = count($data);
    }
    
?>

<div class="for-lg " >
    <div class="d-flex flex-column justify-content-start mt-70">
        <p class="fw-bold" style="font-size: 32px;">사업자 정보 관리</p>
    </div>

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
        <form  action="/business/edit" method="post">
            <button type="submit" class="btn btn-dark">수정</button>
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#changePawssord">사업자 정보 추가</button>
            <?php foreach($data as $d) { ?>
                <div class="mt-3">
                    <label class="form-label"><?= $d['name'] ?></label>
                    <input type="text" name="<?= $d['id'] ?>" id="<?= $d['id'] ?>" class="form-control" value="<?= $d['value'] ?>" />
                </div>

            <?php } ?>
        </form>
        <?php } ?>
</div>

<div class="modal fade" id="changePawssord" tabindex="-1" aria-labelledby="changePawssord" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">사업자 정보 추가</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="register-biz-name" class="form-label">사업자 정보 이름</label>
                    <input type="text" name="register-biz-name" class="form-control" id="register-biz-name" required>
                </div>
                <div class="mb-3">
                    <label for="register-biz-content" class="form-label">사업자 정보 내용</label>
                    <input type="text" class="form-control" id="register-biz-content" required>
                </div>
                <div class="mb-3">
                    <label for="register-biz-order" class="form-label">순서</label>
                    <input type="number" class="form-control">
                    <small>순서를 별도 지정하지 않으면 가장 아래쪽에 표시됩니다</small>
                </div>

                <div class="d-flex justify-content-end gap-3">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">닫기</button>
                    <button type="button" class="btn btn-dark" >추가</button>
                </div>
        </div>
    </div>
</div>



