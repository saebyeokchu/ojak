
<?php 
    $gallery = [];
    if(isset($contents["gallery"])){
        $gallery = $contents["gallery"];
    }
?>

<?php if(count($gallery) > 0){ ?>
    <div class=" mx-5">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php 
                foreach($gallery as $g) {
            ?>
                <div class="col">
                    <img src="/img/user/<?=$g->img_url?>" class="img-fluid hover-saturate cursor-pointer" />
                </div>
            <?php    }?>
        </div>

        <div class="d-flex justify-content-center">
            <a href="/gallery?pageIndex=1" class="no-text-decoration text-dark" style="margin-top:55px;">
                <span  class="bs-button"> 
                    작품 보러가기
                </span>
            </a>
        </div>
    </div>
<?php }?>





