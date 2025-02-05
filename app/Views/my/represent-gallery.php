<?php 
    

    $rg = $contents['target_data']['rg'] ?? [] ; 
    $eg = $contents['target_data']['eg'] ?? [] ; 

    $item = [null,null,null];

    foreach($rg as $d){
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
      <p class="fw-bold" style="font-size: 32px;">슬라이드 작품 관리</p>
      <small>1. 슬라이드 작품은 맨 앞장에서 나오는 슬라이드 작품을 관리합니다.(투명도 관리를 위해 <span class="fw-bold text-danger">jpg</span>만 가능)</small>
      <small>2. 슬라이드 작품은 캐시를 사용합니다. <span class="fw-bold text-danger">캐시삭제를 하거나 잠시 기다리시면</span> 등록된 작품을 확인하실 수 있습니다.</small>
      <small>3. 슬라이드 작품은 자동으로 세로는 화면에 꽉 차도록 가로는 사용자의 화면에 따라 늘어나도록 설정되어 있습니다. 따라서 이미지 일부분이 잘리거나 보이지 않을 수 있습니다.</small>
      <small>4. 아래 미리보기는 실제 비율을 <span class="fw-bold text-danger">최대한 비슷하게 구현한것</span>으로 보이는 환경마다 다르게 보일 수 있습니다.</small>
  </div>

  <ul class="nav nav-tabs pt-30" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">첫번째 슬라이드</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">두번째 슬라이드</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">세번째 슬라이드</button>
    </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class=" d-flex flex-column gap-4 justify-content-start mt-30" >
                <div>
                    <button onclick="setTargetCarouselNo(1)" data-bs-toggle="modal" data-bs-target="#addHomeArt" type="button" class="btn btn-dark"> 수정하기 </button>
                </div>
                <img src="/img/user/<?=$item[0]['value']?>" alt="" style="object-fit: cover; height:800px; width:100%;">
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class=" d-flex flex-column gap-4 justify-content-start mt-30" >
                <div>
                    <button onclick="setTargetCarouselNo(2)" data-bs-toggle="modal" data-bs-target="#addHomeArt" type="button" class="btn btn-dark"> 수정하기 </button>
                </div>
                <img src="/img/user/<?=$item[1]['value']?>" alt="" style="object-fit: cover; height:800px; width:100%;">
            </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class=" d-flex flex-column gap-4 justify-content-start mt-30" >
                <div>
                    <button onclick="setTargetCarouselNo(3)" data-bs-toggle="modal" data-bs-target="#addHomeArt" type="button" class="btn btn-dark"> 수정하기 </button>
                </div>
                <img src="/img/user/<?=$item[2]['value']?>" alt="" style="object-fit: cover; height:800px; width:100%;">
            </div>
        </div>
    </div>

    <input type="hidden" id="selectedImgName" />
    <input type="hidden" id="selectedCarouselNo" />
    <input type="hidden" id="selectedImgId" />

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
                <?php if(count($eg) > 0) { ?>  
                  <div style="font-size: x-small;" class="py-3">
                    등록된 작품 중 슬라이드작품을 설정합니다.
                  </div>
                  <div class="row row-gap-3">
                    <?php foreach($eg as $gallery) { ?>
                      <div class="col-sm-4">
                        <img id="existed-item-<?=$gallery['id']?>" onclick="selectExistedItem(event, '<?= $gallery['img_url'] ?>')" class="cursor-pointer img-responsive w-100 h-100 exist-gallery-items" src="/img/user/<?= $gallery['img_url'] ?>" alt="" style="object-fit: cover">
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
                  <span>새로운 작품을 등록합니다.</span><span class="text-danger"> 여기서 등록된 작품은 갤러리에 자동저장됩니다.</span>
                </div>
                <div>
                  <input class="form-control" type="file" id="uploadNewDisplayGallery" name="uploadNewDisplayGallery" accept=".jpg"  />
                </div>
                <div class="modal-footer  mt-3" >
                  <button type="button" class="btn btn-dark" onclick="update()">등록</button>
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

<style>
    .img-dark {
        filter: brightness(50%);
    }
</style>




<script>

    function setTargetCarouselNo(no){
        document.getElementById('selectedCarouselNo').value = no;
    }

    function setTargetImgName(name){
        document.getElementById('selectedImgName').value = name;
    }

    function setSelectedImgId(id){
        document.getElementById('selectedImgId').value = id;
    }

    async function update(){
        const spinner = document.getElementById('displayGalleryLoadinSpinner');


        const file = document.getElementById('uploadNewDisplayGallery').files[0];

        console.log(file);

        if(file == undefined){
            window.alert("등록된 이미지를 찾을 수 없습니다.");
            return;
        }

        try {
            spinner.classList.remove('hide-item');
            spinner.classList.add('show-item');

            var postData = new FormData();
            postData.append('selectedCarouselNo', document.getElementById('selectedCarouselNo').value);
            postData.append('inputFile', file);

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

        spinner.classList.remove('show-item');
        spinner.classList.add('hide-item');
    }

    function selectExistedItem(event, imgUrl){
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

        setTargetImgName(imgUrl);
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
        var postData = new FormData();
        //set selected image id
        postData.append('selectedImgName', document.getElementById('selectedImgName').value);
        postData.append('selectedCarouselNo', document.getElementById('selectedCarouselNo').value);

        await axios.post('/setting/updateShowpiece', postData).then(function(response){
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


</script>
