<?php
    $count=0;
    $gallery1 = [null,null,null,null,null,null];
    $gallery2 = [null,null,null,null,null,null];

    if(isset($contents)){
        $items = $contents['items'];
        $items = json_decode(json_encode($items), true);

        if(isset($contents['gallery1'])){

            foreach($contents['gallery1'] as $work){
                if($work != null) {
                    $galleryOrder = explode("-",$work -> exhibit)[1];
                    $work = json_decode(json_encode($work), true);
                    $gallery1[$galleryOrder-1] = $work;
                }
            }
        }

        if(isset($contents['gallery2'])){

            foreach($contents['gallery2'] as $work){
                if($work != null) {
                    $galleryOrder = explode("-",$work -> exhibit)[1];
                    $work = json_decode(json_encode($work), true);
                    $gallery2[$galleryOrder-1] = $work;
                }
            }
        }

        $count = count($items);

    }



?>
<div class="">
    <div  class="home-exhibition-1 mt-30 for-md-show show-item container">
        <div class="row pt-15 gy-4" data-aos="fade-up" data-aos-duration="1500" >
            <div class="col-4"> 
                <?= ( $gallery1!=null && $gallery1[0]!=null ) ? 
                    view('gallery/component/frame', array('item' => $gallery1[0], 'height_input' => 400)) 
                        : 
                    view('gallery/component/empty')?>
            </div>
            <div class="col-4"> 
                <?= ( $gallery1!=null && $gallery1[1]!=null ) ? 
                    view('gallery/component/frame', array('item' => $gallery1[1], 'height_input' => 400)) 
                        : 
                    view('gallery/component/empty')?>
            </div>
            <div class="col-4"> 
                <?= ( $gallery1!=null && $gallery1[2]!=null ) ? 
                    view('gallery/component/frame', array('item' => $gallery1[2], 'height_input' => 400)) 
                        : 
                    view('gallery/component/empty')?>
            </div>
        </div>
    </div>
   

    <div id="carouselExample2" class="home-exhibition-1 carousel slide for-md-hide mt-30">
        <div class="carousel-inner home-exhibition-1">
            <?php 
                 if($gallery1 != null) {
                    $index = 0;
                    foreach($gallery1 as $item) {
                        if($item != null) {
            ?>
                <div class="carousel-item <?= $index == 0 ? 'active' : '' ?> ">
                    <?= view('gallery/component/frame', array('item' => $item)); ?>
                </div>
            <?php
                    $index++;
                    } } }
            ?>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample2" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div id="carouselExample3" class="home-exhibition-2 carousel slide for-md-hide mt-30 hide-item">
        <div class="carousel-inner  ">
            <?php 
                if($gallery2 != null) {
                    $index2 = 0;
                    foreach($gallery2 as $item) {
                        if($item != null) {
            ?>
                <div class="carousel-item <?= $index2 == 0 ? 'active' : '' ?> ">
                    <?= view('gallery/component/frame', array('item' => $item)); ?>
                </div>
            <?php
                    $index2++;
                    } } }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample3" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample3" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<script>

    function onFirstExhibitClick() {
        //shwo home-exhibition-1
        const elements1 = document.getElementsByClassName('home-exhibition-1');

        //showing item
        Array.from(elements1).forEach( el => {
            el.classList.remove('hide-item');
            el.classList.add('show-item');
        });

        //hide home-exhibition-2
        const elements2 = document.getElementsByClassName('home-exhibition-2');

        Array.from(elements2).forEach( el => {
            el.classList.remove('show-item');
            el.classList.add('hide-item');
        });

        //change button color
        const btn1 = document.getElementById('exh-btn-1');
        const btn2 = document.getElementById('exh-btn-2');

        btn1.classList.remove('gray-btn');
        btn1.classList.add('black-btn');

        btn2.classList.remove('black-btn');
        btn2.classList.add('gray-btn');
        
    }

    function onSecondExhibitClick() {
        //shwo home-exhibition-1
        const elements2 = document.getElementsByClassName('home-exhibition-2');

        //showing item
        Array.from(elements2).forEach( el => {
            el.classList.remove('hide-item');
            el.classList.add('show-item');
        });

        //hide home-exhibition-2
        const elements1 = document.getElementsByClassName('home-exhibition-1');
        Array.from(elements1).forEach( el => {
            el.classList.remove('show-item');
            el.classList.add('hide-item');
        });

        //change button color
        const btn1 = document.getElementById('exh-btn-1');
        const btn2 = document.getElementById('exh-btn-2');

        btn1.classList.remove('black-btn');
        btn1.classList.add('gray-btn');

        btn2.classList.remove('gray-btn');
        btn2.classList.add('black-btn');
        
    }

</script>
