<?php 
    if(!$isAdmin){
        echo '<script>window.alert("유효하지 않은 접근입니다.")</script>';
        echo '<script>location.href="/";</script>';
    }
?>

<div class="for-lg " >
    <div class="d-flex flex-column justify-content-start mt-70">
        <p class="fw-bold" style="font-size: 32px;">조합원 관리</p>
        <small><p>경북공예문화협동조합의 승인된 사용자만 가입할 수 있도록 관리자가 <strong>승인처리</strong>를 해야 합니다.<br/>승인처리를 하지 않으면 로그인할 수 없습니다.</p></small>
    </div>
    <table class="table align-middle mb-0 bg-white mt-2">
        <thead>
            <th>고유번호</th>
            <th>이메일</th>
            <th>이름</th>
            <th>승인</th>
            <th>탈퇴</th>
        </thead>
        <tbody>
            <?php foreach($data as $user) { ?>
                <tr disabled>
                    <td > <?= $user['id'] ?> </td>
                    <td > <?= $user['user_id'] ?> </td>
                    <td > <?= $user['user_name'] ?> </td>
                    <td> 
                        <button 
                            type="button" 
                            class="btn btn-<?= $user['approved'] ? "warning" : "secondary" ?>" 
                            <?= $user['approved'] ? "onclick='disapprove(".$user['id'].")'" : "onclick='approve(".$user['id'].")'" ?>
                            <?=$user['user_id']=='admin'? 'disabled' : ''?>
                        ><?= $user['approved'] ? "미승인" : "승인" ?></button> </td>
                    <td><button type="button" class="btn btn-danger" onclick="unsubscribe(<?= $user['id']?>)"  <?=$user['user_id']=='admin'? 'disabled' : ''?>>탈퇴</button></td>
                </tr>
            <?php } ?>
            

        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exitModal" tabindex="-1" aria-labelledby="exitModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> -->
                <div class="modal-body">
                    탈퇴된 사용자의 정보는 모두 삭제됩니다. 진행하시겠습니까?
                </div>
                <div class="modal-footer">
                    <button type="button" class="sm-black-btn" data-bs-dismiss="modal">닫기</button>
                    <button type="button" class="sm-black-btn" onclick="deleteGallery()">탈퇴 처리</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // function send(){
    //     axios.post('/api/sendEmail').then(function(response){
    //         console.log(response);
    //     }).catch(function(error){
    //         console.log("error:", error);
    //     });
    // }

    async function approve(userId){
        turnOnLoadingScreen();

        var postData = new FormData();
        postData.append('id',userId);

        await axios.post('/auth/approve',postData).then(function(response){
            if(response.data.status == 'success'){
                    window.alert("승인 처리되었습니다.");
                    location.reload();
                }else{
                    window.alert('처리에 실패하셨습니다. 잠시 후 다시 시도해 주세요.');
                }
            
        }).catch(function(error){
            console.log("error:", error);
        });
        turnOffLoadingScreen();
    }

    async function disapprove(userId){
        turnOnLoadingScreen();
        if(window.confirm('미승인 처리시 해당 사용자는 더이상 로그인을 할 수 없습니다. 그래도 진행하시겠습니까?')){
            var postData = new FormData();
            postData.append('id',userId);

            await axios.post('/auth/disapprove',postData).then(function(response){
                if(response.data.status == 'success'){
                    window.alert("미승인 처리되었습니다.");
                    location.reload();
                }else{
                    window.alert('처리에 실패하셨습니다. 잠시 후 다시 시도해 주세요.');
                }
            }).catch(function(error){
                console.log("error:", error);
            });
        }
        turnOffLoadingScreen();
    }
    
    async function unsubscribe(userId){
        turnOnLoadingScreen();
        if(window.confirm('탈퇴된 사용자의 정보는 모두 삭제됩니다. 진행하시겠습니까?')){
            var postData = new FormData();
            postData.append('id',userId);

            await axios.post('/auth/unsubscribe',postData).then(function(response){
                if(response.data.status == 'success'){
                    window.alert("탈퇴처리 완료되었습니다.");
                    location.reload();
                }else{
                    window.alert('처리에 실패하셨습니다. 잠시 후 다시 시도해 주세요.');
                }
            }).catch(function(error){
                console.log("error:", error);
            });
        }
        turnOffLoadingScreen();
    }
</script>