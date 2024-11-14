<div class="card" >
    <img
        src="/img/<?=$item['img_url']?>"
        class="card-img-top"
        alt="Waterfall"
        width="400"
        height="300"
        style="object-fit: cover;"
    />
    <div class="card-body">
        <div class="d-grid">
            <h5 class="card-title pt-2">
                <?=$item['title']?>
                <span class="badge text-bg-secondary">이작가</span>
            </h5>
            <p id="hide-content-<?=$item['id']?>"> <?=$item['content']?></p>
            <!-- <div>
                <span class="badge rounded-pill text-bg-secondary">이작가</span>
                <span class="badge rounded-pill text-bg-secondary">전시작품</span>
            </div> -->
        </div>
        <div class="d-grid text-center pt-4">
            <button type="button " class="long-black-btn"  onclick="moveToDetail('<?=$item['id']?>','<?=$item['title']?>','<?=$item['img_url']?>')">작품 확인하기</button>
        </div> 
        
    </div>
</div>

<script>
    function moveToDetail(id,title,img_url){
        let passData = 'title='+title;
        passData += '&content='+ encodeURIComponent(document.getElementById('hide-content-'+id).innerHTML.trim());
        passData += '&img_url='+img_url;

        location.href="/gallery/"+id+"?"+passData;
        // console.log("/community/edit/"+pageIndex+"?"+passData)
    }
</script>