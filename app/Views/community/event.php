<?php
    $userId = 0;
    if(isset($_COOKIE['user_id'])){
        $userId = $_COOKIE['user_id'];
    }
    
    $rowCount = 0;
    $posts = [];
    $pageIndex = 0;

    if(isset($contents)){
        $rowCount = (int)$contents['rowCount'];
        if($rowCount > 0) {
            $posts = $contents['posts'];
            $pageIndex = $contents['pageIndex'];
        }
    }
?>

<div class="d-flex justify-content-center  mt-100 " style="padding-bottom: 100px;" >
    <div class="d-flex flex-column px-5 w-100" style="max-width:1440px;" >
    <!-- breadcrumb -->
    <?= view('/component/breadcrumb',[
        'breadsInput' => [ 
            ['name' => '커뮤니티', 'url' => '/community/event?pageIndex=1'], 
            ['name' => '이벤트', 'url' => '/community/event?pageIndex=1'] 
        ] ]) ?>

    <!-- menu -->
    <?=view('/community/_component/category', [ 'gubun' => 2 ]);?>

    <div  style="min-height: 500px;">
        <!-- content -->
        <?=view('/community/event/card', [ 'posts' => $posts, 'rowCount' => $rowCount ]);?>

        <div class="for-sm">
        <?=view('/community/_component/mobileAddBtn', [ 'gubun' => 2 ]);?>
        </div>

        <!-- pagination -->
        <?php if(isset($posts) && count($posts) > 0) { 
            echo view('/community/_component/pagination', 
                [ 
                    'posts' => $posts, 
                    'itemPerPage' => 8 , 
                    'paginationRange' => 5,
                    'totalCount' => $rowCount,
                    'src' => '/community/event'
                ]
            ); 
        } ?>
    </div>
    </div>
</div>

<script>
    window.addEventListener('load', () => {
        document.body.classList.add('loaded');
    });
</script>


