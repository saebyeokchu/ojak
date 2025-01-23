<?php
    if(isset($data)) {
        $posts = $data;
        $rowCount = count($data);
    }else{
        $rowCount = 0;
    }

    $detailUrl = "/community/detail?gubun=1&pageIndex=1&id=";
    $thisUrl = '/my/community?gubun=';
?>

<div class="for-lg " >
    <div class="d-flex flex-column justify-content-start mt-70">
        <p class="fw-bold" style="font-size: 32px;">커뮤니티 관리</p>
        <p class="text-secondary">등록한 커뮤니티 게시글을 관리할 수 있습니다.</p>
    </div>

    <div  class="d-flex flex-row justify-content-start fw-bold gap-4 mt-3 " style="font-size: 24px;">
        <p class="cursor-pointer ">
            <a href='<?= $thisUrl?>0' class=" <?= $gubun != 0 ? 'ojak-light-gray hover-underline no-text-decoration' : 'text-decoration-underline  text-dark' ?>">전체</a>
        </p>
        <p class="cursor-pointer ">
            <a href='<?= $thisUrl?>1' class=" <?= $gubun != 1 ? 'ojak-light-gray hover-underline no-text-decoration' : 'text-decoration-underline  text-dark' ?>">
                공지사항
            </a>
        </p>
        <p class="cursor-pointer ">
            <a href='<?= $thisUrl?>2' class=" <?= $gubun != 2 ? 'ojak-light-gray hover-underline no-text-decoration' : 'text-decoration-underline  text-dark' ?>">이벤트</a>
        </p>
        <p class="cursor-pointer ">
            <a href='<?= $thisUrl?>3' class="<?= $gubun != 3 ? 'ojak-light-gray hover-underline no-text-decoration' : 'text-decoration-underline  text-dark' ?>">Q&A</a>    
        </p>
    </div>

    <table class="table text-center mt-2" >
        <thead>
            <tr>
                <th>번호</th>
                <th class="w-50">제목</th>
                <th>작성일</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($posts) > 0 ) {
                foreach($posts as $item) { 
                    if($item["gubun"]==$gubun || $gubun == 0){                    
            ?> <tr>
                    <td><?=$item["id"]?></td> 
                    <td >
                        <a class="no-text-decoration hover-underline text-dark" href="<?=$detailUrl?><?=$item["id"]?>"><?=$item["title"]?></a>
                    </td>
                    <td><?=$item["created_at"]?></td>
                    <td> 
                        <?php 
                            if($item["gubun"] != 2){ 
                        ?>
                            <span class="btn btn-dark cursor-pointer me-3" onclick="moveToDetail(<?=$item['id']?>, <?=$item['gubun']?>)">
                                수정
                            </span>
                        <?php }if($item["gubun"] == 2){ ?>
                            <span class="btn btn-dark cursor-pointer" onclick="onEventDeleteBtnClick(<?=$item['id']?>)">
                        <?php }else{ ?>
                            <span class="btn btn-dark cursor-pointer" onclick="deletePost(<?=$item['id']?>)">
                        <?php  }?>
                            삭제
                        </span>
                    </td>
                </tr>
                </tr>
                <?php } 
            } } else { ?>
                <tr>
                    <td></td>
                    <td>등록된 게시글이 없습니다</td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    function moveToDetail(id, gubun){
        const urls = getUrl(id, gubun, 1);
        location.href = urls.communityEditor;
    }
</script>