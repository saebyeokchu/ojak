function deleteGallery(id){
    console.log("deleteGALLERY")
    if(id){
        if(window.confirm('작품을 삭제하시겠습니까?')){
            try {
                var postData = new FormData();
                postData.append('id',id);

                axios.post('/api/deleteGallery', postData).then(function(response){
                    console.log("success:", response);
                    window.alert(response.data.message);
                    location.reload();
                    return;
                }).catch(function(error){
                    console.log("error:", error);
                });
                
            } catch (error) {
                console.error('Error deleting data:', error);
                // window.alert("게시물을 삭제할 수 없습니다. 잠시 후 다시 시도하여 주세요.")
            }
        }
    }
}

function updateEditModalContent(targetData){
    console.log(targetData); 
    //id입력
    const editModalId = document.getElementById("editModalId");
    if(targetData["id"]) editModalId.value = targetData["id"];

    //title입력
    const editModalTitle = document.getElementById("editModalTitle");
    if(targetData["title"]) editModalTitle.value = targetData["title"];

    const editModalSubTitle = document.getElementById("editModalSubTitle");
    if(targetData["sub_title"]) editModalSubTitle.value = targetData["sub_title"];

    //content입력
    const editModalContent = document.getElementById("editModalContent");
    if(targetData["content"]) editModalContent.value = targetData["content"];

    //buy_link입력
    const editModalBuyLink = document.getElementById("editModalBuyLink");
    if(targetData["buy_link"]) editModalBuyLink.value = targetData["buy_link"];


    //이미지 입력
    const previousInputUrl = document.getElementById("previousInputUrl");
    if(targetData["img_url"]){
        previousInputUrl.innerText =  targetData["img_url"];
    }

    //이미지 입력2
    const previousInputUrl2 = document.getElementById("previousInputUrl2");
    if(targetData["img_url2"]){
        previousInputUrl2.innerText =  targetData["img_url2"];
    }

    //이미지 입력3
    const previousInputUrl3 = document.getElementById("previousInputUrl3");
    if(targetData["img_url3"]){
        previousInputUrl3.innerText =   targetData["img_url3"];
    }

    //이미지 입력4
    const previousInputUrl4 = document.getElementById("previousInputUrl4");
    if(targetData["img_url4"]){
        previousInputUrl4.innerText =  targetData["img_url4"];
    }

}

async function openEditModal(galleryId){
    const editGalleryModal = document.getElementById("editGalleryModal");
    const editModalHeader = document.getElementById("editModalHeader");
    const editModalBtn = document.getElementById("editModalBtn");

    turnOnLoadingScreen();

    if(galleryId){
        //update

        try {
            var postData = new FormData();
            postData.append('id',galleryId);

            await axios.post('/api/getGalleryById',postData).then(function(response){

                //성공적으로 데이터 불러왔으면 업데이트 하기
                if(response.status == 200){
                    editGalleryModal.style.display = "flex";
                    updateEditModalContent(response.data.item[0]);

                    if(editModalHeader) editModalHeader.innerText = "작품 수정";
                    if(editModalBtn) editModalBtn.innerText = "수정";
                }
                // window.alert(response.data.message);
                return;
            }).catch(function(error){
                console.log("error:", error);
            });
            
        } catch (error) {
            console.error('Error deleting data:', error);
        }
    }else{
        //insert
        editGalleryModal.style.display = "flex";

        //데이터가 없다는건 등록이라는 뜻이므로 required true
        const editModalInputFile = document.getElementById("editModalInputFile");
        if(editModalInputFile) editModalInputFile.setAttribute("required",true);

        if(editModalHeader) editModalHeader.innerText = "작품 등록";
        if(editModalBtn) editModalBtn.innerText = "등록";
    }

    turnOffLoadingScreen();
}