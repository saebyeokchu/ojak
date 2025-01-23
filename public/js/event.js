
function onEventDeleteBtnClick(targetId, pageIndex){
    if(window.confirm("이벤트를 영구히 삭제하시겠습니까?")){
        turnOnLoadingScreen();

        try {
            var postData = new FormData();
            postData.append('id',targetId);

            axios.post('/api/deletePost', postData).then(function(response){
                console.log("success:", response);
                window.alert(response.data.message);

                if(pageIndex){
                    location.href=getUrl(0,0,pageIndex).communityEvent;
                }else{
                    location.reload();
                }
                return;
            }).catch(function(error){
                console.log("error:", error);
            });
            
        } catch (error) {
            console.error('Error deleting data:', error);
            window.alert("이벤트를 삭제할 수 없습니다. 잠시 후 다시 시도하여 주세요.")
        }

        turnOffLoadingScreen();
    }
}