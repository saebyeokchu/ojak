<?php
    $count=0;
    $items = [];

    if(isset($contents)){
        $items = $contents['gallery'];
    }



?>
<div class="mt-30 mb-70">
    <div class="owl-carousel arts-carousel">
            <?php foreach($items as $item) { ?> 
        <div class="item p-3">
                <?php echo view('gallery/component/card', array('item' => $item, true)); ?>
        </div>
                
            <?php } ?>
    </div>
</div>

<script>
  $(document).ready(function () {
    $('.arts-carousel').owlCarousel({
        loop:true,
        margin:20,
        dots: true, // Enable dots
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
    }
})
  });

  
</script>