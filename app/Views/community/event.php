<?php
    $userId = 0;
    if(isset($_COOKIE['user_id'])){
        $userId = $_COOKIE['user_id'];
    }
    
    $rowCount = (int)$contents['rowCount'];
    if($rowCount > 0) {
        $posts = $contents['posts'];
        $pageIndex = $contents['pageIndex'];
    }
?>

<div class="d-flex flex-column ms-5 me-5" style="margin-top:100px; margin-bottom:100px;">
    
    <!-- breadcrumb -->
    <?= view('/component/breadcrumb',[
        'breadsInput' => [ 
            ['name' => '커뮤니티', 'url' => '/community/event?pageIndex=1'], 
            ['name' => '이벤트', 'url' => '/community/event?pageIndex=1'] 
        ] ]) ?>

    <!-- menu -->
    <?=view('/community/_component/category', [ 'gubun' => 2 ]);?>


    <!-- content -->
    <div class="mt-15" >
        <?=view('/community/event/card', [ 'posts' => $posts ]);?>
    </div>

    <!-- pagination -->
    <?php if(isset($posts) && count($posts) > 0) { echo view('/community/_component/pagination', [ 'posts' => $posts ]); } ?>

</div>

<script>
    window.addEventListener('load', () => {
        document.body.classList.add('loaded');
    });
</script>


