<?php
    $notices = [];

    if(isset($contents['notices'])){
        $notices = $contents['notices'];
    }
?>
<div class="row bg-white mx-5" style="margin-top: 150px;" >
    <div class="col-4" >
        <p style="font-size: 32px;"> 오작의 소식을 <br/>알려드립니다.</p>
        <p style="font-size: 24px; margin-top: 50px;" class="text-decoration-underline">전체보기</p>
    </div>
    <div class="col">

        <ul class="list-group list-group-flush">
            <?php if(count($notices) > 0){ ?>
                <?php foreach($notices as $notice) { ?>
                    <li class="list-group-item py-4 hover-underline">
                        <a href="/community/detail/<?=$notice['id']?>?index=1"  style="color:black; text-decoration: none;">
                            <?= $notice['title'] ?>
                        </a>
                    </li>
                <?php } ?>
            <?php } else {  ?>
                <li class="list-group-item py-4">현재 등록된 공지사항이 없습니다</li>
            <?php } ?>
        </ul>
    </div>
</div>

