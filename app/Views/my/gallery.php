<?php
    if(isset($data)) {
        $items = $data;
        $count = count($data);
    }else{
        $count = 0;
    }
    
    $detailUrl = "/gallery/35?pageIndex=1"
?>

    
<div class="for-lg " >
    <div class="d-flex flex-column justify-content-start mt-70">
        <p class="fw-bold" style="font-size: 32px;">작품 관리</p>
        <p class="text-secondary">등록한 작품을 관리할 수 있습니다.</p>
    </div>

    <table class="table text-center mt-15" >
        <thead>
            <tr>
                <th>번호</th>
                <th class="w-50">제목</th>
                <th>작성일</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($items) > 0 ) {
                $target_item = null;

                foreach($items as $item) { ?>
                <tr>
                    <td><?=$item["id"]?></td> 
                    <td >
                        <a class="no-text-decoration hover-underline text-dark" href="/gallery/<?=$item["id"]?>?pageIndex=1X"><?=$item["title"]?></a>
                    </td>
                    <td><?=$item["created_at"];?></td>
                    <td>
                        <span class="btn btn-dark cursor-pointer me-3" onclick="openEditModal(<?= $item['id'] ?>)">
                            수정
                        </span>
                        <span class="btn btn-dark cursor-pointer" onclick="deleteGallery(<?= $item['id'] ?>)">
                            삭제
                        </span>
                    </td>
                </tr>
                </tr>
                <?php } 
            } else { ?>
                <tr>
                    <td></td>
                    <td>등록된 작품이 없습니다</td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


