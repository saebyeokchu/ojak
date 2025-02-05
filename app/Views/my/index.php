<?php
    //set autorization
    $userId = -1;
    if(isset($_COOKIE['user_id'])){
        $userId = $_COOKIE['user_id'];
    }else{
        echo '<script>window.alert("유효하지 않은 접근입니다.")</script>';
        echo '<script>location.href="/";</script>';
    }

    $isAdmin = false;

    //set data
    $data = [];

    if(isset($contents)){
        if(isset($contents['target_data'])){
            $data = $contents['target_data'];
        }

        if(isset($contents['gubun'])){
            $gubun = $contents['gubun'];
        }
        
        if(isset($contents['sub'])){
            $sub = $contents['sub'];
        }


        if(isset($contents['isAdmin'])){
            $isAdmin = $contents['isAdmin'];
        }
    }

?>

<div class="alert alert-danger for-sm" role="alert">
  화면 크기가 너무 작습니다. 화면크기를 조절해 주세요
</div>


<div class="container-fluid for-lg">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
            <?=view('/my/_component/menu',array('isAdmin' => $isAdmin))?>
        </div>
        <div class="col py-3">
            <?php if($sub == 'gallery') {
                echo view('/my/gallery',array('data' => $data));
            }else if($sub == 'community'){
                echo view('/my/community',array('data' => $data, 'gubun' => $gubun));
            }else if($sub == 'info'){
                echo view('/my/info',array('data' => $data, 'isAdmin' => $isAdmin));
            }else if($sub == 'busniess'){
                echo view('/my/busniess',array('data' => $data, 'isAdmin' => $isAdmin));
            }else if($sub == 'represent-gallery'){
                echo view('/my/represent-gallery',array('data' => $data)); 
            }else if($sub == 'notice'){
                echo view('/my/notice',array('data' => $data));
            } else if($sub == 'user-management'){
                echo view('/my/user-management',array('data' => $data, 'isAdmin' => $isAdmin));
            } else if($sub == 'social'){
                echo view('/my/social',array('data' => $data, 'isAdmin' => $isAdmin));
            } ?>
        </div>
    </div>
</div>

<script>

</script>