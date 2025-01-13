<?php
    if(!$isAdmin){
        echo '<script>window.alert("유효하지 않은 접근입니다.")</script>';
        echo '<script>location.href="/";</script>';
    }

    $naverId = -1;
    $instagramId = -1;
    $youtubeId = -1;

    $naverBlogLink = "";
    $instagramLink = "";
    $youtubeLink = "";

    $naverOn = false;
    $instaOn = false;
    $youtubeOn = false;

    foreach($data as $d){
        if(trim($d["name"])=="네이버 블로그"){
            $naverBlogLink = $d["value"];
            $naverOn = $d["note"] == "on";
            $naverId = $d["id"];
        }

        if(trim($d["name"])=="인스타그램"){
            $instagramLink = $d["value"];
            $instaOn = $d["note"] == "on";
            $instagramId = $d["id"];

        }

        if(trim($d["name"])=="유튜브"){
            $youtubeLink = $d["value"];
            $youtubeOn = $d["note"] == "on";
            $youtubeId = $d["id"];
        }

    }
    
?>

<div class="for-lg " >
    <div class="d-flex flex-column justify-content-start mt-70">
        <p class="fw-bold" style="font-size: 32px;">소셜 미디어 관리</p>
        <p class="text-secondary">소셜미디어 링크를 관리하실 수 있습니다.</p>
    </div>

    <button type="button" class="btn btn-dark" onclick="updateSocials()">수정</button>

    <div class="grid">
        <div class="row mt-3">
            <div class="col-2">네이버 블로그</div>
            <div class="col"> <input type="text" id="naverBlogLink" class="form-control" value="<?=$naverBlogLink?>" /> </div>
            <div class="col">
                <button onclick="activateSocial(<?=$naverId?>,'on')" type="button" class="btn <?=$naverOn ? 'btn-success' : 'btn-outline-danger' ?>">On</button>
                <button onclick="activateSocial(<?=$naverId?>,'off')" type="button" class="btn <?=$naverOn ? 'btn-outline-danger' : 'btn-danger' ?>">Off</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">인스타그램</div>
            <div class="col"> <input type="text" id="instagramLink" class="form-control" value="<?=$instagramLink?>" /> </div>
            <div class="col">
            <button onclick="activateSocial(<?=$instagramId?>,'on')" type="button" class="btn <?=$instaOn ? 'btn-success' : 'btn-outline-danger' ?>">On</button>
            <button onclick="activateSocial(<?=$instagramId?>,'off')" type="button" class="btn <?=$instaOn ? 'btn-outline-danger' : 'btn-danger' ?>">Off</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">유튜브</div>
            <div class="col"> <input type="text" id="youtubeLink" class="form-control" value="<?=$youtubeLink?>" /> </div>
            <div class="col">
            <button onclick="activateSocial(<?=$youtubeId?>,'on')"  type="button" class="btn <?=$youtubeOn ? 'btn-success' : 'btn-outline-danger' ?>">On</button>
            <button onclick="activateSocial(<?=$youtubeId?>,'off')" type="button" class="btn <?=$youtubeOn ? 'btn-outline-danger' : 'btn-danger' ?>">Off</button>
            </div>
        </div>
    </div>

</div>

<script>
    async function  updateSocials(){
        turnOnLoadingScreen();

        try {
            var postData = new FormData();
            postData.append('targets', [<?=$naverId?>,<?=$instagramId?>,<?=$youtubeId?>] );
            postData.append('inputs', [document.getElementById('naverBlogLink').value,document.getElementById('instagramLink').value,document.getElementById('youtubeLink').value]);
            postData.append('columnName', 'value');

            //step 1. update auth-code 
            await axios.post('/setting/updateBusniessInfo', postData).then(async function(response){
                if(response.data.status == 'success'){
                    console.log("수정되었습니다.")
                    location.reload(); 
                }
            })
        } catch (error) {
            console.error('Error deleting data:', error);
            window.alert("수정에 실패하였습니다. 잠시후 다시 시도하여 주세요.");
        }
        turnOffLoadingScreen();
    }

    async function  activateSocial(id,onoff){
        turnOnLoadingScreen();

        try {
            var postData = new FormData();
            postData.append('targets', [id] );
            postData.append('inputs', [onoff]);
            postData.append('columnName', 'note');

            //step 1. update auth-code 
            await axios.post('/setting/updateBusniessInfo', postData).then(async function(response){
                if(response.data.status == 'success'){
                    console.log("수정되었습니다.")
                    location.reload(); 
                }
            })
        } catch (error) {
            console.error('Error deleting data:', error);
            window.alert("수정에 실패하였습니다. 잠시후 다시 시도하여 주세요.");
        }
        turnOffLoadingScreen();
    }
</script>