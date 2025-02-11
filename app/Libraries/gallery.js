async function deleteGallery(id, returnUrl){
    if(!id){
        return;
    }

    if(window.confirm('작품을 삭제하시겠습니까?')){
        try {
            var postData = new FormData();
            postData.append('id',id);

            await axios.post('/api/deleteGallery', postData).then(function(response){
                console.log("success:", response);
                window.alert(response.data.message);

                if(returnUrl){
                    location.href = returnUrl;
                }else{
                    location.reload();
                }
                return;
            }).catch(function(error){
                console.log("error:", error);
            });
            
        } catch (error) {
            console.error('Error deleting data:', error);
           
        }
    }
}