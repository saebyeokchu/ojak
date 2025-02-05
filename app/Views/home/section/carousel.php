<?php

$item = [null,null,null];

if(isset($data)){
  foreach($data['showpieces'] as $d){
    if($d['name'] == "showpiece1"){
        $item[0] = $d;
    }

    if($d['name'] == "showpiece2"){
        $item[1] = $d;
    }

    if($d['name'] == "showpiece3"){
        $item[2] = $d;
    }
}

}

?>

<div class="for-lg">
  <div class="owl-carousel main-carousel overflow-hidden bg-dark">
    <div class="item">
      <img src="/img/user/<?=$item[0]['value']?>" alt="Carousel Image 1" />
    </div>
    <div class="item">
      <img src="/img/user/<?=$item[1]['value']?>" alt="Carousel Image 2" />
    </div>
    <div class="item">
      <img src="/img/user/<?=$item[2]['value']?>" alt="Carousel Image 3" />
    </div>
  </div>
</div>

<div class="for-sm">
  <div class="owl-carousel main-carousel overflow-hidden bg-dark" style="height: 400px;"> <!-- Adjust carousel height -->
    <div class="item">
      <img src="/img/user/<?=$item[0]['value']?>" alt="Carousel Image 1" class="w-100" style="object-fit: cover; height: 400px;" />
    </div>
    <div class="item">
      <img src="/img/user/<?=$item[1]['value']?>" alt="Carousel Image 2" class="w-100" style="object-fit: cover; height: 400px;" />
    </div>
    <div class="item">
      <img src="/img/user/<?=$item[2]['value']?>" alt="Carousel Image 3" class="w-100" style="object-fit: cover; height: 400px;" />
    </div>
  </div>
</div>


<script>
  $(document).ready(function () {
    $(".main-carousel").owlCarousel({
      loop: true, // Enable looping
      margin: 0, // Margin between items
      animateOut: 'fadeOut',
      autoplay:true,
      autoplayTimeout:8000,
      autoplayHoverPause:false,
      smartSpeed: 2000,          // Smooth transition speed (1 second)
      dots: true,
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