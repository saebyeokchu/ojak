
<?php 
    $gallery = [];
    if(isset($contents["gallery"])){
        $gallery = $contents["gallery"];
    }
?>

<!-- <div class="image-container">
                        <img src="/img/user/test1.png" class="img-fluid cursor-pointer"  />
                        <div class="overlay">
                            <h2>작품 제목</h2>
                            <p>작품에 대한 설명 한줄입니다.</p>
                        </div>
                    </div> -->

<?php if(count($gallery) > 0){ ?>
    <div class="for-lg">
        <div class=" d-flex justify-content-center  " >
            <div class="px-5 row row-cols-1 row-cols-md-4 w-100" style="max-width: 1440px;">
                <?php 
                    foreach($gallery as $g) {
                ?>
                    <div class="col">
                        <a href="/gallery/<?=$g->id?>?pageIndex=1">
                            <div class="image-container">
                                <img src="/img/user/<?=$g->img_url?>" class="img-fluid cursor-pointer"  />
                                <div class="overlay">
                                    <p style="font-size:24px;font-weight:700;"><?=$g->title?></h2>
                                    <p style="font-size:16px;font-weight:600;"><?=$g->sub_title?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php    }?>
            </div>
        </div>
    </div>

    <div class="for-sm">
        <div class=" d-flex justify-content-center w-100" >
            <div class="px-5 row row-cols-1 row-cols-md-4  g-4">
                <?php 
                    foreach($gallery as $g) {
                ?>
                    <div class="col">
                        <a href="/gallery/<?=$g->id?>?pageIndex=1">
                            <div class="image-container">
                                <img src="/img/user/<?=$g->img_url?>" class="img-fluid hover-saturate cursor-pointer" />
                                <div class="overlay">
                                    <p style="font-size:24px;font-weight:700;"><?=$g->title?></h2>
                                    <p style="font-size:16px;font-weight:600;"><?=$g->sub_title?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php    }?>
            </div>
        </div>
    </div>

<?php }?>

<div class="d-flex justify-content-center">
    <a href="/gallery?pageIndex=1" class="no-text-decoration text-dark" style="margin-top:55px;">
        <span  class="bs-button"> 
            작품 보러가기
        </span>
    </a>
</div>

<style>
    /* Container Styling */
    .image-container {
        position: relative;
    }

    /* Overlay that appears on hover */
    .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 130px; /* Initially hidden */
        background: rgba(0, 0, 0, 0.6); /* Semi-transparent black */
        color: white;
        padding: 20px;
        box-sizing: border-box;
        flex-direction: column;
        justify-content: center;
        transition: height 0.4s ease-in-out;
        overflow: hidden;
        visibility: hidden;
    }

    /* Text inside overlay */
    .overlay h2 {
        margin: 0;
        font-size: 20px;
    }

    .overlay p {
        margin: 5px 0 0;
        font-size: 14px;
    }

    /* Show overlay on hover */
    .image-container:hover .overlay {
        height: 130px; /* Adjust height as needed */
        visibility: visible;
    }
</style>