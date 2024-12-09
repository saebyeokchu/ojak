<?php
    if(isset($contents)){
        if(isset($contents['showpieces'])){
            $data = $contents['showpieces'];
        }
    }
?>
<div class="owl-carousel main-carousel bg-black">
    <?php
        foreach($data as $d){
            echo "<div class='item'>";
            echo "  <img style='object-fit:cover;' width='100%' src='img/resource/".$d['value']."' class='d-block carousel-img img-fluid'/>";
            echo "</div>";
        }
    ?>
</div>

<script>
  $(document).ready(function () {
    $(".main-carousel").owlCarousel({
      loop: true, // Enable looping
      margin: 10, // Margin between items
      autoplay:true,
      autoplayTimeout:5000,
      autoplayHoverPause:false,
      smartSpeed: 2000,          // Smooth transition speed (1 second)
      dots: false,
      responsive: {
        0: {
          items: 1 // 1 item for small screens
        },
        600: {
          items: 1 // 2 items for medium screens
        },
        1000: {
          items: 1 // 3 items for large screens
        }
      }
    });
  });
</script>