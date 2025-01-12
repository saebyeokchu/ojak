<?php
    if(isset($data)) {
        $items = $data;
        $count = count($data);
    }else{
        $count = 0;
    }
    
?>

<!-- Gallery Contents -->
<?php if($count == 0){ ?>
    <div class="page-wrap d-flex flex-row align-items-center" style="min-height: 60vh;">
        <div class="container my-3">
            <div class="row justify-content-center text-center">
                <span class="h3">등록된 작품이 없습니다.</span>
            </div>
        </div>
    </div>
<?php }else{ ?>

    <table class="table align-middle mb-0 bg-white mt-2">
        <tbody>
            <?php
                $index = 1;
                foreach($items as $item) { ?>
                    <tr>
                        <td >
                            <strong><?= $index ?></strong>
                        </td>
                        <td>
                            <?= $item['created_at'] ?>
                        </td>
                        <td >
                            <p class="hover-underline cursor-pointer">
                                <a href="/gallery/<?= $item['id'] ?>" class="text-secondary no-text-decoration"><?= $item['title'] ?></a>
                            </p>
                        </td>
                        <td class="d-flex justify-content-end post-edit-buttons item-<?=$item['user_id']?>" >
                            <div class="for-lg  pt-3 pb-3">
                                <a href="/gallery/edit/<?= $item['id'] ?>" class="no-text-decoration">
                                    <span class="sm-black-btn cursor-pointer me-3" >
                                        수정
                                    </span>
                                </a>
                                <span class="sm-black-btn cursor-pointer" onclick="deleteItem(<?= $item['id'] ?>)">
                                    삭제
                                </span>
                            </div>

                            <div class="for-sm  pt-3 pb-3">
                                <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    :
                                </button>
                                <ul class="dropdown-menu">
                                    <li ><a class="dropdown-item" ref="/gallery/edit/<?= $item['id'] ?>">수정</a></li>
                                    <li  onclick="deleteItem(<?= $item['id'] ?>)"><a class="dropdown-item">삭제</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
            <?php $index++; } ?>
        </tbody>
    </table>
<?php } ?>

<script>
    function deleteItem(id){
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
                    window.alert("게시물을 삭제할 수 없습니다. 잠시 후 다시 시도하여 주세요.")
                }
            }
        }
    }
</script>



