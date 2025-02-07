<div class="logged-in  d-flex justify-content-center w-100 mt-3">
    <?php if($gubun ==2){ ?>
        <span data-bs-toggle="modal" data-bs-target="#addEventModal" class="bs-button-sm">이벤트 추가하기</span>
    <?php }else{?>
        <span onclick='location.href="/community/new?sub=<?=$gubun?>"' class="bs-button-sm"><?= $gubun == 1 ? "공지사항" : "Q&A" ?> 추가하기</span>
    <?php } ?>
</div>