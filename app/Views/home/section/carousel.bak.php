<?php
    if(isset($contents)){
        if(isset($contents['showpieces'])){
            $data = $contents['showpieces'];
        }
    }
?>

<!-- Set up your HTML -->
<div id="carouselExampleIndicators" class="carousel slide"  data-bs-ride="true">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <?php
            $i = 0;
            foreach($data as $d){
                $active = $i == 0 ? "active" : "" ;

                echo "<div class=' carousel-item ".$active."' data-bs-interval='3000' >";
                echo "  <img style='object-fit:cover;' width='100%' src='img/resource/".$d['value']."' class='d-block carousel-img img-fluid'/>";
                echo "</div>";

                $i++;
            }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
