<?php
    $count = 0;

    if(isset($data)) {
        $items = $data;
        $count = count($data);
    }

    if(!$isAdmin){
        echo '<script>window.alert("유효하지 않은 접근입니다.")</script>';
        echo '<script>location.href="/";</script>';
    }
    
?>

<div class="for-lg " >
    <div class="d-flex flex-column justify-content-start mt-70">
        <p class="fw-bold" style="font-size: 32px;">사업자 정보 관리</p>
        <p class="text-secondary">맨 아래쪽에 위치하는 사업자 정보를 관리할 수 있습니다.</p>
    </div>

    <!-- Gallery Contents -->
    <?php if($count == 0){ ?>
        <div class="page-wrap d-flex flex-row align-items-center" style="min-height: 60vh;">
            <div class="container my-3">
                <div class="row justify-content-center text-center">
                    <span class="h3">설정가능한 정보가 없습니다.</span>
                </div>
            </div>
        </div>
    <?php }else{ ?>
        <div  >
            <button type="submit" class="btn btn-danger" onclick="deletebBizs()">삭제</button>
            <button type="submit" class="btn btn-dark" onclick="updateBizs()">수정</button>
            <button type="button" class="btn btn-dark" onclick="showAddNewBizModal()">사업자 정보 추가</button>
            <button type="button" class="btn btn-dark" onclick="showSortItemModal()">순서변경하기</button>
            <div class="grid">
                <?php foreach($data as $d) { ?>
                    <div class="row mt-3">
                        <div class="col-2"> 
                            <input class="form-check-input bizChecks" type="checkbox" value="<?= $d['id'] ?>" >
                            <label class="form-label"><?= $d['name'] ?></label> 
                        </div>
                        <div class="col"> <input type="text" name="<?= $d['id'] ?>" id="<?= $d['id'] ?>" class="form-control" value="<?= $d['value'] ?>" /> </div>
                        <div class="col"></div>
                    </div>
                <?php } ?>
            </div>

        </div>
        <?php } ?>
</div>


<div id="addNewBiz" class="hide-item">
    <div class="bg-white border z-3 shadow rounded p-5" style="width:500px; height:auto;position:absolute;top:100px;left:35%;">
        <h3><strong>사업자 정보 추가하기</strong></h3>
        <div class="grid">
            <div class="col">
                <input type="text" id="newBizName" class="form-control mt-3" placeholder="사업자 정보 이름"  required/>
                <input type="text" name="newBizValue" id="newBizValue" class="form-control mt-3" placeholder="사업자 정보 내용" required/> 
            </div>
        </div>
        <div class="d-flex flex-row justify-content-center gap-3 mt-3">
            <button class="btn btn-dark"  onclick="hideAddNewBizModal()" >닫기</button>
            <button class="btn btn-dark" onclick="addBiz(<?=count($data)?>)">추가하기</button>
        </div>
    </div>

    <div onclick="hideAddNewBizModal()" style="width:100%; height:100vw;position:absolute;top:0px;left:0px;background: rgba(0, 0, 0, .65);">
    </div>
</div>

<div id="sortInfo" class="hide-item">
    <div class="bg-white border z-3 shadow rounded p-5" style="width:500px; height:auto;position:absolute;top:100px;left:35%;">
        <h3><strong>순서 변경하기</strong></h3>
        <div class="grid">
            <?php $orderIndex=1; foreach($data as $d) { ?>
                <div class="row mt-3">
                    <div class="col"><?= $d['name'] ?></div>
                    <div class="col">
                        <input type="hidden" id="target<?= $orderIndex ?>"  value="<?= $d['id'] ?>" />
                        <input type="number" name="order<?= $orderIndex ?>" id="order<?= $orderIndex ?>" class="form-control" value="<?= $d['sort_order'] ?>" required/> 
                    </div>
                </div>
            <?php $orderIndex++; } ?>
        </div>
        <div class="d-flex flex-row justify-content-center gap-3 mt-5">
            <button class="btn btn-dark"  onclick="document.getElementById('sortInfo').classList.add('hide-item')" >닫기</button>
            <button class="btn btn-dark" onclick="changeOrder(<?=count($data)?>)">변경하기</button>
        </div>
    </div>

    <div onclick="document.getElementById('sortInfo').classList.add('hide-item')" style="width:100%; height:100vw;position:absolute;top:0px;left:0px;background: rgba(0, 0, 0, .65);">
    </div>
</div>

<script>

    function hideSortItemModal(){
        document.getElementById('sortInfo').classList.add('hide-item');
    }

    function hideAddNewBizModal(){
        document.getElementById('addNewBiz').classList.add('hide-item');
    }


    function showSortItemModal(){
        document.getElementById('sortInfo').classList.remove('hide-item');
    }

    function showAddNewBizModal(){
        document.getElementById('addNewBiz').classList.remove('hide-item');
    }

    async function changeOrder(count){
        //check if all number is exist
        let verify = true;
        let numbers = [];
        let targets = [];

        for(let i=1;i<=count;i++){
            console.log('order'+i);
            const value = document.getElementById('order'+i).value;

            if(!value || value < 0 || value > count){
                window.alert("1과 "+count+"사이에 유효한 숫자를 입력해 주세요.");
                return;
            }
            const target = document.getElementById('target'+i).value;
            targets.push(target);
            numbers.push(value);
        }

        //check if overlap exist
        const uniq = [...new Set(numbers)];
        if(uniq.length != numbers.length){
            window.alert("중복된 순서가 있습니다.");
            return;
        }

        //update data
        turnOnLoadingScreen();

        try {
            var postData = new FormData();
            postData.append('targets', targets);
            postData.append('inputs',numbers);
            postData.append('columnName', 'sort_order');

            //step 1. update auth-code 
            await axios.post('/setting/updateBusniessInfo', postData).then(async function(response){
                if(response.data.status == 'success'){
                    console.log("순서변경이 완료되었습니다.")
                    hideSortItemModal();
                }
            })
        } catch (error) {
            console.error('Error deleting data:', error);
            window.alert("업데이트에 실패하였습니다. 잠시후 다시 시도하여 주세요.");
        }
        turnOffLoadingScreen();
    }

    async function addBiz(count){
        const name = document.getElementById('newBizName').value;
        const value = document.getElementById('newBizValue').value;

        //update data
        turnOnLoadingScreen();

        if(!name || !value){
            window.alert("사업자 정보를 추가하시려면 모든 정보를 입력해야 합니다.");
            return;
        }

        try {
            var postData = new FormData();
            postData.append('name', name);
            postData.append('value',value);
            postData.append('sort_order',parseInt(count) + 1);
            postData.append('category',1); //fix

            //step 1. update auth-code 
            await axios.post('/setting/insert', postData).then(async function(response){
                if(response.data.status == 'success'){
                    console.log("추가되었습니다.")
                    hideAddNewBizModal();
                    location.reload(); 
                }
            })
        } catch (error) {
            console.error('Error deleting data:', error);
            window.alert("추가에 실패하였습니다. 잠시후 다시 시도하여 주세요.");
        }
        turnOffLoadingScreen();
    }

    async function  deletebBizs(){
        console.log(document.getElementsByClassName("bizChecks"));

        const checks = document.getElementsByClassName("bizChecks");

        let i = 0;
        let checked = 0;
        const deleteTarget = [];

        for(i=0;i<checks.length;i++){
            const item = checks.item(i);
            if(item.checked) {
                checked++;
                deleteTarget.push(item.value);
            }
        }

        if(checked == 0){
            window.alert("삭제하고자 하는 정보를 선택하세요.");
            return;
        }else{
            if(window.confirm('한번 삭제한 정보는 되돌릴 수 없습니다. 계속하시겠습니까?')){
                turnOnLoadingScreen();
            try {
                var postData = new FormData();
                postData.append('targets', deleteTarget);

                //step 1. update auth-code 
                await axios.post('/setting/deleteBiz', postData).then(async function(response){
                    if(response.data.status == 'success'){
                        console.log("삭제되었습니다.")
                        location.reload(); 
                    }
                })
            } catch (error) {
                console.error('Error deleting data:', error);
                window.alert("삭제에 실패하였습니다. 잠시후 다시 시도하여 주세요.");
            }
            turnOffLoadingScreen();
            }
            
        }
    }

    async function  updateBizs(){
        console.log(document.getElementsByClassName("bizChecks"));

        const checks = document.getElementsByClassName("bizChecks");

        let i = 0;
        let checked = 0;
        const targets = [];

        for(i=0;i<checks.length;i++){
            const item = checks.item(i);
            if(item.checked) {
                checked++;
                targets.push(item.value);
            }
        }

        if(checked == 0){
            window.alert("수정하고자 하는 정보를 선택하세요.");
            return;
        }else{
            turnOnLoadingScreen();

            //make data
            let inputs = []; 

            targets.forEach(e=>{
                inputs.push(document.getElementById(e).value);
            });

            try {
                var postData = new FormData();
                postData.append('targets', targets);
                postData.append('inputs', inputs);
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
    }
</script>
