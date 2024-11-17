<div class="card" >
    <img
        src="/img/<?=$item -> img_url?>"
        class="card-img-top"
        alt="Waterfall"
        width="400"
        height="300"
        style="object-fit: cover;"
    />
    <div class="card-body">
        <div class="d-grid">
            <h5 class="card-title pt-2">
                <?=$item -> title?>
                <span class="badge text-bg-secondary"><?= $item -> user_name ?></span>
            </h5>
            <p id="hide-content-<?=$item -> id?>"> <?=$item -> content?></p>
            <!-- <div>
                <span class="badge rounded-pill text-bg-secondary">이작가</span>
                <span class="badge rounded-pill text-bg-secondary">전시작품</span>
            </div> -->
        </div>
        <div class="d-grid text-center pt-4">
            <a href="/gallery/<?=$item -> id?>">
                <button type="button " class="long-black-btn" >작품 확인하기</button>
            </a>
        </div> 
        
    </div>
</div>