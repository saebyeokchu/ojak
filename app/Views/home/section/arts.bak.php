
<?php 
    $gallery = [];
    if(isset($contents["gallery"])){
        $gallery = $contents["gallery"];
    }
?>

<?php if(count($gallery) > 0){ ?>
    <div class=" d-flex justify-content-center   for-xl-hide" >
        <div class="px-5 row row-cols-1 row-cols-md-4  " style="max-width: 1440px;">
            <?php 
                foreach($gallery as $g) {
            ?>
                <div class="col">
                    <a href="/gallery/<?=$g->id?>?pageIndex=1">
                        <img src="/img/user/<?=$g->img_url?>" class="img-fluid hover-saturate cursor-pointer" />
                    </a>
                </div>
            <?php    }?>
        </div>
    </div>

    <!-- <div class=" d-flex justify-content-center   for-xl-show" >
        <div class="px-5 row row-cols-1 row-cols-md-4  " style="max-width: 1440px;">
           
                <div class="col ps-0">
                    <a href="/gallery///$g->id?pageIndex=1">
                        2<img src="/img/user///$g->img_url?>" class="img-fluid hover-saturate cursor-pointer" />
                    </a>
                </div>
        </div>
    </div> -->
<?php }?>

<div class="d-flex justify-content-center">
    <a href="/gallery?pageIndex=1" class="no-text-decoration text-dark" style="margin-top:55px;">
        <span  class="bs-button"> 
            작품 보러가기
        </span>
    </a>
</div>





