<div class="owl-carousel main-carousel overflow-hidden bg-dark">
  <div class="item">
    <img src="img/resource/home/carousel1.png" alt="Carousel Image 1" />
  </div>
  <div class="item">
    <img src="img/resource/home/carousel2.png" alt="Carousel Image 2" />
  </div>
  <div class="item">
    <img src="img/resource/home/carousel3.png" alt="Carousel Image 3" />
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