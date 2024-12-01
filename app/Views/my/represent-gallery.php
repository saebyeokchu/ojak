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

<div class="container mt-3">
    <!-- <p class="h2"><strong>대표 작품/공지 관리</strong></p> -->

    <form class="mt-3" action="javascript:;" onsubmit=" update( event ) ">
        <div class="d-grid text-center">
            <button type="submit" class="sm-black-btn ">수정</button>
        </div> 

        <p class="mt-3">
            <small>대표작품은 맨 위에서 슬라이드로 넘어가는 작품을 말합니다.</small>
        </p>

        <div class="mb-3 mt-3">
            <label for="formFile" class="form-label font-weight-bold"><strong>1번 작품/공지</strong></label>
            <input class="form-control" type="file" id="input-file1" name="input-file1" accept="image/*" <?= (isset($item[0])) ?  '' : 'required' ?>>
            <small><?= (isset($item[0])) ?  '현재 사진:'.$item[0]['value'] : '' ?></small>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label font-weight-bold"><strong>2번 작품/공지</strong></label>
            <input class="form-control" type="file" id="input-file2" name="input-file2" accept="image/*"  >
            <small><?= (isset($item[1])) ?  '현재 사진:'.$item[1]['value'] : '' ?></small>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label font-weight-bold"><strong>3번 작품/공지</strong></label>
            <input class="form-control" type="file" id="input-file3" name="input-file3" accept="image/*"  >
            <small><?= (isset($item[2])) ?  '현재 사진:'.$item[2]['value'] : '' ?></small>
        </div>
    </form>
</div>


<script>
    async function update(event){
        event.preventDefault();
        showLoadingSpinner();

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
                postData.append('showpiece1', file1);
            }

            if(file2){
                postData.append('showpiece2', file2);
            }

            if(file3){
                postData.append('showpiece3', file3);
            }

            await axios.post('/gallery/uploadRepresentItems', postData, { headers: {
                        'Content-Type': 'multipart/form-data', // Ensure correct headers
            }}).then(function(response){
                const data =  response.data;
                console.log(response)

                if(data['status'] == 'success'){
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

        hideLoadingSpinner();
    }
</script>
