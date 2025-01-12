<?php 
    $item = [null,null,null];

    foreach($data as $d){
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

?>

<div class="for-lg " >
    <div class="d-flex flex-column justify-content-start mt-70">
        <p class="fw-bold" style="font-size: 32px;">메인 작품 관리</p>
        <small>대표작품은 맨 앞장에서 나오는 슬라이드 작품을 관리합니다.</small>
    </div>
    <form class="mt-3" action="javascript:;" onsubmit=" update( event ) ">
        <div class="d-flex justify-content-start">
            <button type="submit" class="btn btn-dark">수정</button>
        </div> 

        <p class="mt-3">
        </p>

        <div class="mb-3 mt-3">
            <label for="formFile" class="form-label font-weight-bold"><strong>1번 작품</strong></label>
            <input class="form-control" type="file" id="input-file1" name="input-file1" accept=".png" <?= (isset($item[0])) ?  '' : 'required' ?>>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label font-weight-bold"><strong>2번 작품</strong></label>
            <input class="form-control" type="file" id="input-file2" name="input-file2" accept=".png"  >
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label font-weight-bold"><strong>3번 작품</strong></label>
            <input class="form-control" type="file" id="input-file3" name="input-file3" accept=".png"  >
        </div>
    </form>
</div>


<script>
    async function update(event){
        event.preventDefault();
        turnOnLoadingScreen();

        const file1 = document.getElementById('input-file1').files[0];
        const file2 = document.getElementById('input-file2').files[0];
        const file3 = document.getElementById('input-file3').files[0];

        console.log(file1,file2,file3);

        if(file1 == undefined && file2 == undefined && file3 == undefined){
            window.alert("최소 한개의 이미지가 등록되어야 합니다.");
            return;
        }

        try {
            var postData = new FormData();

            if(file1){
                postData.append('carousel1', file1);
            }

            if(file2){
                postData.append('carousel2', file2);
            }

            if(file3){
                postData.append('carousel3', file3);
            }

            await axios.post('/gallery/uploadRepresentItems', postData, { headers: {
                        'Content-Type': 'multipart/form-data', // Ensure correct headers
            }}).then(function(response){
                const data =  response.data;
                console.log(response)

                if(data['status'] == 'success'){
                    window.alert("슬라이드 작품이 교체되었습니다");
                    location.reload();
                }else{
                    window.alert('등록에 실패하였습니다. 잠시후 다시 시도하여 주세요');
                }
                
            }).catch(function(error){
                console.log("error:", error);
            });
            
        } catch (error) {
            console.error('Error inserting data:', error);
            window.alert('등록에 실패하였습니다. 잠시후 다시 시도하여 주세요');
        }

         turnOffLoadingScreen();
    }
</script>
