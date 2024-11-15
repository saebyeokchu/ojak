<?php
    $count = 0;

    if(isset($contents)){
        $items = $contents['items'];
        $count = count($items);
    }

?>

<!-- Gallery -->
<div class="page-header d-flex justify-content-center text-center">
    <div class="title" data-aos="fade-up" data-aos-duration="1500">
        <p class="main-title">작품</p>
        <p class="sub-title sub-title-lg">오작의 커뮤니티 작가들이 제작한 작품을 한곳에서 만나보세요.</p>
        <p class="sub-title sub-title-sm">오작의 커뮤니티 작가들이 <br />제작한 작품을 한곳에서 만나보세요.</p>

    </div>
</div>

<!-- Gallery Contents -->
<?php if($count == 0){ ?>
    <div class="page-wrap d-flex flex-row align-items-center" style="min-height: 60vh;">
        <div class="container my-3">
            <div class="row justify-content-center text-center">
                <span class="h3">등록된 작품이 없습니다.</span>
            </div>
            <div class="row justify-content-center text-center mt-3 logged-out" >
                <button id="createNewItemBtn" style="width:300px;" class="black-btn" data-bs-toggle="modal" data-bs-target="#loginModal">새로운 작품 등록하기</button>
                <a href="/gallery/new" class="logged-in">
                    <button id="createNewItemBtnLoggined" style="width:300px;" class="black-btn" >새로운 작품 등록하기</button>
                </a>
            </div>
        </div>
    </div>
<?php }else{ ?>



<div class="container pt-100 pb-100">
    <div class="row w-100 text-right justify-cotent-end logged-in">
        <a class="text-secondary no-text-decoration hover-underline" href="/gallery/new" style="z-index: 999999;"  data-aos="fade-up" data-aos-duration="1500">
            작품 등록하기
        </a>
    </div>

    <div class="row w-100  logged-out" data-bs-toggle="modal" data-bs-target="#loginModal">
        <div class="d-flex text-right justify-cotent-end">
        <span class="text-secondary no-text-decoration hover-underline cursor-pointer"  style="z-index: 999999;"  data-aos="fade-up" data-aos-duration="1500">
            작품 등록하기
        </span>
        </div>
    </div>


    <?php for($i=0;$i<$count;$i=$i+4) { ?>
        <div class="row pt-15 gy-4" data-aos="fade-up" data-aos-duration="1500" >
            <?php for($j=$i;$j<$i+4 && $j < $count;$j=$j+1) { ?>
                    <div class="col-lg-3 col-sm-6 col-xs-12"> 
                        <?= view('gallery/component/frame', array('item' => $items[$j])); ?>
                    </div>
            <?php } ?>
        </div>
    <?php } ?>
   
</div>
<?php } ?>

<!-- Pagination -->
<!-- <div class="d-flex justify-content-center pt-30 pb-30">
    <nav class="pagination-outer" aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item">
                <a href="#" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item active"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
                <a href="#" class="page-link" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        </ul>
    </nav>
</div> -->


<?= view('/auth/loginModal',array('return_url' => '/gallery/new' )) ?>

<script>
    window.onload = function() {
        const user_id = parseInt(localStorage.getItem('user_id'));
        const createBtn = document.getElementById('createNewItemBtn');
        const loginBtn = document.getElementById('createNewItemBtnLoggined');

        const elements = document.getElementsByClassName('logged-in');

        console.log(elements)

        if(user_id > 0){
            createBtn.classList.remove('show-item');
            createBtn.classList.add('hide-item');

            loginBtn.classList.remove('hide-item');
            loginBtn.classList.add('show-item');

            //showing item
            Array.from(elements).forEach( el => {
                el.classList.remove('hide-item');
                el.classList.add('show-item');
            });
        }else{
            createBtn.classList.remove('hide-item');
            createBtn.classList.add('show-item');

            loginBtn.classList.remove('show-item');
            loginBtn.classList.add('hide-item');

            //hide item
            Array.from(elements).forEach( el => {
                el.classList.remove('show-item');
                el.classList.add('hide-item');
            });
        }
    }

    function test() {
        clicked();
    }
</script>