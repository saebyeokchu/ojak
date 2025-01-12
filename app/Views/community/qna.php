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
            ['name' => '커뮤니티', 'url' => '/community/qna?pageIndex=1'], 
            ['name' => 'Q&A', 'url' => '/community/qna?pageIndex=1'] 
        ] ]) ?>

    <!-- menu -->
    <?=view('/community/_component/category', [ 'gubun' => 3 ]);?>


    <!-- content -->
    <div class="mt-3" >
        <?=view('/community/qna/table', [ 'posts' => $posts ]);?>
    </div>

    <!-- pagination -->
    <?php if(isset($posts) && count($posts) > 0) { echo view('/community/_component/pagination', [ 'posts' => $posts ]); } ?>

</div>

<script>
    window.addEventListener('load', () => {
        document.body.classList.add('loaded');
    });
</script>

