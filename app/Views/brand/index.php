<div class="for-lg">
    <?= view('/brand/standard') ?>
</div>

<div class="for-sm">
   <?= view('/brand/mobile') ?>
</div>

<div class="d-flex justify-content-center  mt-3 px-5" >
    <div class="d-flex flex-column w-100 " style="max-width:1440px; margin-bottom:100px; " >
    <!-- * 카카오맵 - 큰 화면 -->
    <!-- 1. 지도 노드 -->
        <div id="daumRoughmapContainer1731324282394" class="root_daum_roughmap root_daum_roughmap_landing w-100 h-auto"></div>
    </div>
</div>

<!--
    2. 설치 스크립트
    * 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다.
-->
<script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

<!-- 3. 실행 스크립트 -->
<script charset="UTF-8">
    window.addEventListener('load', () => {
        document.body.classList.add('loaded');

        if(window.innerWidth > 700){
            document.getElementById('daumRoughmapContainer1731324282394').classList.add('px-5');
        }else{
            document.getElementById('daumRoughmapContainer1731324282394').classList.remove('px-5');
        }
    });

    new daum.roughmap.Lander({
        "timestamp" : "1731324282394",
        "key" : "2m7gg",
        "mapWidth" : "640",
        "mapHeight" : "400"
    }).render();


</script>