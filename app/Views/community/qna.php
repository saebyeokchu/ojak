<?php
    $userId = 0;
    if(isset($_COOKIE['user_id'])){
        $userId = $_COOKIE['user_id'];
    }

    $rowCount = 0;
    $posts = [];
    $pageIndex = 1;

    if(isset($contents)){
        $rowCount = (int)$contents['rowCount'];
        if($rowCount > 0) {
            $posts = $contents['posts'];
            $pageIndex = $contents['pageIndex'];
        }
    }
?>

<div class="d-flex justify-content-center  mt-100 " >
    <div class="d-flex flex-column px-5    w-100" style="max-width:1440px;" >
        <!-- breadcrumb -->
        <?= view('/component/breadcrumb',[
            'breadsInput' => [ 
                ['name' => '커뮤니티', 'url' => '/community/qna?pageIndex=1'], 
                ['name' => 'Q&A', 'url' => '/community/qna?pageIndex=1'] 
            ] ]) ?>

        <!-- menu -->
        <?=view('/community/_component/category', [ 'gubun' => 3 ]);?>

        <div  style="min-height: 500px;">
            <!-- content -->
            <div class="mt-3"  >
                <?=view('/community/qna/table', [ 'posts' => $posts ]);?>
            </div>
            
            <div class="for-sm">
            <?=view('/community/_component/mobileAddBtn', [ 'gubun' => 3 ]);?>
            </div>

            <!-- pagination -->
            <?php if($rowCount > 0) { 
                // echo view('/community/_component/pagination', [ 'posts' => $posts ]); 
                echo view('/community/_component/pagination', 
                    [ 
                        'posts' => $posts, 
                        'itemPerPage' => 10 , 
                        'paginationRange' => 5,
                        'totalCount' => $rowCount,
                        'src' => '/community/qna'
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

