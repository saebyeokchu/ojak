<?php
    $gallery1 = [null,null,null,null,null,null];
    $gallery2 = [null,null,null,null,null,null];

    if(isset($data)){

        foreach($data[0] as $work){
            if($work != null) {
                $galleryOrder = explode("-",$work -> exhibit);
                $gallery1[$galleryOrder[1]-1] = json_decode(json_encode($work), true);
            }
    
        }
    
        foreach($data[1] as $work){
            if($work != null) {
                $galleryOrder = explode("-",$work -> exhibit);
                $gallery2[$galleryOrder[1]-1] = json_decode(json_encode($work), true);
            }
        }
    }
    
?>

<div class="d-flex gap-3 gx-3 mt-3 justify-content-center">
    <button class="sm-black-btn" id="exh-edit-btn-1" onclick="onFirstExhibitClick()">제 1전시장</button>
    <button class="sm-gray-btn" id="exh-edit-btn-2" onclick="onSecondExhibitClick()"> 제 2전시장</button>
</div>


<div class="home-exhibition-1 mt-30 show-item container pb-30">
    <div class="row pt-15 gy-4" >
        <div class="col-4"> 
            <?= ( $gallery1!=null && $gallery1[0]!=null ) ? 
                view('gallery/component/frame-edit', array('item' => $gallery1[0], 'height_input' => 400, 'id' => '1-1')) 
                    : 
                view('gallery/component/empty-edit', array('id' => '1-1'))?>
        </div>
        <div class="col-4"> 
            <?= ( $gallery1!=null && $gallery1[1]!=null ) ? 
                view('gallery/component/frame-edit', array('item' => $gallery1[1], 'height_input' => 400, 'id' => '1-2')) 
                    : 
                view('gallery/component/empty-edit', array('id' => '1-2'))?>
        </div>
        <div class="col-4"> 
            <?= ( $gallery1!=null && $gallery1[2]!=null ) ? 
                view('gallery/component/frame-edit', array('item' => $gallery1[2], 'height_input' => 400, 'id' => '1-3')) 
                    : 
                view('gallery/component/empty-edit', array('id' => '1-3'))?>
        </div>
    </div>
    <div class="row pt-15 gy-4"  >
        <div class="col-4"> 
            <?= ( $gallery1!=null && $gallery1[3]!=null ) ? 
                view('gallery/component/frame-edit', array('item' => $gallery1[3], 'height_input' => 400, 'id' => '1-4')) 
                    : 
                view('gallery/component/empty-edit', array('id' => '1-4'))?>
        </div>
        <div class="col-4"> 
            <?= ( $gallery1!=null && $gallery1[4]!=null ) ? 
                view('gallery/component/frame-edit', array('item' => $gallery1[4], 'height_input' => 400, 'id' => '1-5'))
                    : 
                view('gallery/component/empty-edit', array('id' => '1-5'))?>
        </div>
        <div class="col-4"> 
            <?= ( $gallery1!=null && $gallery1[5]!=null ) ? 
                view('gallery/component/frame-edit', array('item' => $gallery1[5], 'height_input' => 400, 'id' => '1-6')) 
                    : 
                view('gallery/component/empty-edit', array('id' => '1-6'))?>
        </div>
    </div>
</div>

<div  class="home-exhibition-2  mt-30 hide-item container pb-30">
    <div class="row pt-15 gy-4">
        <div class="col-4"> 
            <?= ( $gallery2!=null && $gallery2[0]!=null ) ? 
                view('gallery/component/frame-edit2', array('item' => $gallery2[0], 'height_input' => 400, 'id' => '2-1')) 
                    : 
                view('gallery/component/empty-edit2', array('id' => '2-1'))?>
        </div>
        <div class="col-4"> 
            <?= ( $gallery2!=null && $gallery2[1]!=null ) ? 
                view('gallery/component/frame-edit2', array('item' => $gallery2[1], 'height_input' => 400, 'id' => '2-2')) 
                    : 
                view('gallery/component/empty-edit2', array('id' => '2-2'))?>
        </div>
        <div class="col-4"> 
            <?= ( $gallery2!=null && $gallery2[2]!=null ) ? 
                view('gallery/component/frame-edit2', array('item' => $gallery2[2], 'height_input' => 400, 'id' => '2-3')) 
                    : 
                view('gallery/component/empty-edit2', array('id' => '2-3'))?>
        </div>
    </div>
    <div class="row pt-15 gy-4" >
        <div class="col-4"> 
            <?= ( $gallery2!=null && $gallery2[3]!=null ) ? 
                view('gallery/component/frame-edit2', array('item' => $gallery2[3], 'height_input' => 400, 'id' => '2-4')) 
                    : 
                view('gallery/component/empty-edit2', array('id' => '2-4'))?>
        </div>
        <div class="col-4"> 
            <?= ( $gallery2!=null && $gallery2[4]!=null ) ? 
                view('gallery/component/frame-edit2', array('item' => $gallery2[4], 'height_input' => 400, 'id' => '2-5')) 
                    : 
                view('gallery/component/empty-edit2', array('id' => '2-5'))?>
        </div>
        <div class="col-4"> 
            <?= ( $gallery2!=null && $gallery2[5]!=null ) ? 
                view('gallery/component/frame-edit2', array('item' => $gallery2[5], 'height_input' => 400, 'id' => '2-6')) 
                    : 
                view('gallery/component/empty-edit2', array('id' => '2-6'))?>
        </div>
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
        const btn1 = document.getElementById('exh-edit-btn-1');
        const btn2 = document.getElementById('exh-edit-btn-2');

        btn1.classList.remove('sm-gray-btn');
        btn1.classList.add('sm-black-btn');

        btn2.classList.remove('sm-black-btn');
        btn2.classList.add('sm-gray-btn');
        
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
        const btn1 = document.getElementById('exh-edit-btn-1');
        const btn2 = document.getElementById('exh-edit-btn-2');

        btn1.classList.remove('sm-black-btn');
        btn1.classList.add('sm-gray-btn');

        btn2.classList.remove('sm-gray-btn');
        btn2.classList.add('sm-black-btn');
        
    }
</script>