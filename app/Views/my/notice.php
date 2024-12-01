<?php 
    $item = [null,null,null];

    if(isset($data)){
        foreach($data as $d){
            if($d['name'] == "notice1"){
                $item[0] = $d;
            }
    
            if($d['name'] == "notice2"){
                $item[1] = $d;
            }
    
            if($d['name'] == "notice3"){
                $item[2] = $d;
            }
        }
    }


?>

<div class="container mt-3">
    <!-- <p class="h2"><strong>대표 작품/공지 관리</strong></p>
    <p class="h6 mt-3">가장 앞 페이지에 있는 이미지를 관리합니다</p> -->

    <form class="mt-3" action="javascript:;" onsubmit=" update( event ) ">
        <div class="d-grid text-center">
            <button type="submit" class="sm-black-btn ">수정</button>
        </div> 

        <p class="mt-3">
            <small>공지는 맨 아래에 나오는 카드뉴스 형식의 이미지를 말합니다</small>
        </p>

        <div class="mb-3 mt-3">
            <label for="formFile" class="form-label font-weight-bold"><strong>1번 공지</strong></label>
            <input oninput="onFileChange(event)" class="form-control" type="file" id="input-file1" name="input-file1" accept="image/*" >
            <small><?= (isset($item[0])) ?  '현재 공지:'.$item[0]['value'] : '' ?></small>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label font-weight-bold"><strong>2번 공지</strong></label>
            <input oninput="onFileChange(event)" class="form-control" type="file" id="input-file2" name="input-file2" accept="image/*"  >
            <small><?= (isset($item[1])) ?  '현재 공지:'.$item[1]['value'] : '' ?></small>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label font-weight-bold"><strong>3번 공지</strong></label>
            <input oninput="onFileChange(event)" class="form-control" type="file" id="input-file3" name="input-file3" accept="image/*"  >
            <small><?= (isset($item[2])) ?  '현재 공지:'.$item[2]['value'] : '' ?></small>
        </div>
    </form>
</div>

<script>
    async function update(event){
        event.preventDefault();

        const file1 = document.getElementById('input-file1').files[0];
        const file2 = document.getElementById('input-file2').files[0];
        const file3 = document.getElementById('input-file3').files[0];

        if(file1 == undefined && file2 == undefined && file3 == undefined){
            if(!window.confirm('모든 공지를 삭제하시겠습니까?')){
                return;
            }
        }
        
        showLoadingSpinner();
        try {
            var postData = new FormData();

            if(file1){
                postData.append('notice1', file1);
            }

            if(file2){
                postData.append('notice2', file2);
            }

            if(file3){
                postData.append('notice3', file3);
            }

            await axios.post('/setting/uploadNotice', postData, { headers: {
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
