<?php 
  // allGallery exhibits
  $exhibits = $contents['target_data']['exhibits'] ?? [] ; 
  $allGallery = $contents['target_data']['allGallery'] ?? [] ; 

?>


<div class="for-lg " >
  <div class="d-flex flex-column justify-content-start mt-70">
      <p class="fw-bold" style="font-size: 32px;">대표 작품 관리</p>
      <small>대표작품은 맨 앞장에서 나오는 4가지 대표 작품을 관리합니다.</small>
  </div>

  <!-- row 3 column씩 -->
<div class="home-exhibition  pb-30">

<div class="row p-3 row-gap-3">
  <!-- 2개 이하이면 -->
  <?php foreach($exhibits as $exhibit) { ?> 
      <div class="col-sm-3">
        <div class="card d-flex justify-content-center align-items-center" style="min-height: 400px;" >
          <img class="img-responsive w-100 h-100" src="/img/user/<?= $exhibit -> img_url ?>" alt="" style="object-fit: cover">
          <div class="card-footer w-100 cursor-pointer d-flex justify-content-center" onclick="deleteDisplayGallery(<?=$exhibit->id?>)">
            <span >삭제하기</span>
          </div>
        </div>
      </div>
    <?php } ?>
    
    <?php if(count($exhibits) < 4) { ?>
      <div class="col-sm-3">
          <div class="card d-flex justify-content-center align-items-center" style="min-height: 400px;" >
              <svg data-bs-toggle="modal" data-bs-target="#addHomeArt" class="cursor-pointer" fill="#eeeeee" height="150px" width="150px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier"> <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 455,242.5 "></polygon> </g>
              </svg>
          </div>
      </div>
    <?php } ?>

  </div>
</div>
 
</div>




<!-- Modal -->
<div class="modal fade" id="addHomeArt" tabindex="-1" aria-labelledby="addHomeArtLabel" aria-hidden="true" style="min-width: 600px">
  <div class="modal-dialog">
    <div class="modal-content" style="min-height: 300px; min-width: 600px; overflow-y:scroll;">
        <div id="addHomeArtForm">
          <div class="modal-body position-relative" style="min-height: 150px" >
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-gallery-tab" data-bs-toggle="tab" data-bs-target="#nav-gallery" type="button" role="tab" aria-controls="nav-gallery" aria-selected="true">
                  갤러리  
                </button>
                <button class="nav-link" id="nav-upload-tab" data-bs-toggle="tab" data-bs-target="#nav-upload" type="button" role="tab" aria-controls="nav-upload" aria-selected="false">
                  업로드
                </button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-gallery" role="tabpanel" aria-labelledby="nav-gallery-tab" tabindex="0">
                <?php if(count($allGallery) > 0) { ?>  
                  <div style="font-size: x-small;" class="py-3">
                    등록된 작품 중 대표작품을 설정합니다.
                  </div>
                  <div class="row row-gap-3">
                    <?php foreach($allGallery as $gallery) { ?>
                      <div class="col-sm-4">
                        <img id="existed-item-<?=$gallery['id']?>" onclick="selectExistedItem(event)" class="cursor-pointer img-responsive w-100 h-100 exist-gallery-items" src="/img/user/<?= $gallery['img_url'] ?>" alt="" style="object-fit: cover">
                      </div>
                      <?php } ?>
                  </div>
                <?php }else{ ?>
                  <div class="d-flex justify-content-center align-items-center">
                    <div class="d-flex justify-content-center align-items-center" style="min-height: 300px">
                      전시된 작품을 찾을 수 없습니다.
                    </div>
                  </div>
                <?php } ?>
                <div class="modal-footer  mt-3" >
                  <button type="button" class="btn btn-dark" onClick="addArtWithExistedGallery()">등록</button>
                </div> 
              </div>
              <div class="tab-pane fade" id="nav-upload" role="tabpanel" aria-labelledby="nav-upload-tab" tabindex="0">
                <div style="font-size: x-small;" class="py-3">
                  <span>새로운 작품을 설정합니다.</span><span class="text-danger"> 여기서 등록된 작품은 갤러리에 자동저장됩니다.</span>
                </div>
                <div>
                  <input class="form-control" type="file" id="uploadNewDisplayGallery" name="uploadNewDisplayGallery" accept="image/*"  />
                </div>
                <div class="modal-footer  mt-3" >
                  <button type="button" class="btn btn-dark" onclick="addArt()">등록</button>
                </div>  
              </div>
            </div>
              
            <div id="displayGalleryLoadinSpinner" class="spinner-border position-absolute start-50 loading-spinner hide-item" style="top:40%;"  role="status" id="login-loading">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>




  </div>
</div>


<script>
  async function addArt(){
      event.preventDefault();
      const file = document.getElementById('uploadNewDisplayGallery');
      const spinner = document.getElementById('displayGalleryLoadinSpinner');

      if(!file){
        window.alert("등록하고자 하는 작품을 선택해 주세요");
        return;
      }

      try {
          spinner.classList.remove('hide-item');
          spinner.classList.add('show-item');

          //step1 add item to gallery
          var postData = new FormData();
          postData.append('title', '대표작품');
          postData.append('content', '');
          postData.append('image', file.files[0]);
          postData.append('user_id',1);
          postData.append('id', 0);

          await axios.post('/gallery/insert', postData, { headers: {
                      'Content-Type': 'multipart/form-data', // Ensure correct headers
          }}).then(async function(response){
              console.log("upload to gallery", response)
              const data = response.data;
              if(data['status'] == 'success'){
                  var postData2 = new FormData();
                  postData2.append('galleryId', response.data.insertedId);
                  //step2 add item to category
                  await axios.post('/setting/uploadDisplayGallery', postData2).then(function(response){
                    const data =  response.data;
                    console.log("upload to setting", response)

                      if(data['status'] == 'success'){
                          window.alert(response.data.message);
                          location.reload();
                      }
              
          }).catch(function(error){
              console.log("error:", error);
          });
              }
              
          }).catch(function(error){
              console.log("error:", error);
          });

          
          
          return;
      } catch (error) {
          console.error('Error inserting data:', error);
          window.alert('등록에 실패하였습니다. 잠시후 다시 시도하여 주세요');
      }

      spinner.classList.remove('show-item');
      spinner.classList.add('hide-item');
  }

  async function addArtWithExistedGallery(){
      event.preventDefault();
      const selectedExistedItem = document.getElementsByClassName('selected-gallery');
      const spinner = document.getElementById('displayGalleryLoadinSpinner');

      if(!selectedExistedItem[0]){
        window.alert("등록하고자 하는 작품을 선택해 주세요");
        return;
      }

      try {
        spinner.classList.remove('hide-item');
        spinner.classList.add('show-item');

        //add item to setting table
        const targetGalleryId = selectedExistedItem[0].id.split("-")[2];
        var postData = new FormData();
        postData.append('galleryId', targetGalleryId);

        await axios.post('/setting/uploadDisplayGallery', postData).then(function(response){
                  const data =  response.data;
                  console.log("upload to setting", response);

                    if(data['status'] == 'success'){
                        window.alert(response.data.message);
                        location.reload();
                    }
                }).catch(function(error){
                    console.log("error:", error);
                });
      } catch (error) {
          console.error('Error inserting data:', error);
          window.alert('등록에 실패하였습니다. 잠시후 다시 시도하여 주세요');
      }

      spinner.classList.remove('show-item');
      spinner.classList.add('hide-item');
  }

  function selectExistedItem(event){
    //delete evert img dark class
    const images = document.getElementsByClassName('exist-gallery-items');

    for(i=0;i<images.length;i++){
      images[i].classList.remove('img-dark'); // Remove the dark effect
      images[i].classList.remove('selected-gallery'); 
    }

    const imgElement = event.srcElement;
    // Check if the img already has the 'img-dark' class
    if (imgElement.classList.contains('img-dark')) {
        imgElement.classList.remove('img-dark'); // Remove the dark effect
        imgElement.classList.remove('selected-gallery'); 
    } else {
        imgElement.classList.add('img-dark'); // Apply the dark effect
        imgElement.classList.add('selected-gallery'); 
    }
  }

  async function deleteDisplayGallery(settingId){
    if(window.confirm("삭제를 진행하시겠습니까?")){
      try {
        turnOnLoadingScreen();
        var postData = new FormData();
        postData.append('id',settingId);

        await axios.post('/setting/deleteDisplayGallery', postData).then(function(response){
            console.log("success:", response);
            window.alert(response.data.message);
            turnOffLoadingScreen();

            locatoin.href="/my/display-gallery";
            return;
        }).catch(function(error){
            console.log("error:", error);
        });
        
        return;
      } catch (error) {
          console.error('Error deleting data:', error);
      }
    }

    window.alert("전시작품을을 삭제할 수 없습니다. 잠시 후 다시 시도하여 주세요.");
    turnOffLoadingScreen();
  }
</script>