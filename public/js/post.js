function deletePost(postId, returnUrl){
    if(!postId){
        return;
    }

    turnOnLoadingScreen();

    try {
        if(window.confirm("게시물을 영구히 삭제하시겠습니까?")){
            var postData = new FormData();
            postData.append('id',postId);
    
            axios.post('/api/deletePost', postData).then(function(response){
                console.log("success:", response);
                window.alert(response.data.message);

                if(returnUrl){
                    location.href=returnUrl;
                }else{
                    location.reload();
                }

                return;
            }).catch(function(error){
                console.log("error:", error);
            });
        }
    } catch (error) {
        console.error('Error deleting data:', error);
        window.alert("게시물을 삭제할 수 없습니다. 잠시 후 다시 시도하여 주세요.")
    }

    turnOffLoadingScreen();

    
}