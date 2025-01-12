<!-- find 공지 -->
 <?php 

    function getPinned($post){
        return $post->pinned;
    }

    $pinned = array_filter($posts,"getPinned");
    $detailUrl = "/community/detail?gubun=1&pageIndex=".$pageIndex."&id="
 ?>

<div class="d-flex justify-content-end text-end logged-in mb-3">
            <a  href="/community/new?sub=<?=$gubunNum?>" >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="plus-icon cursor-pointer"
                    viewBox="0 0 24 24"
                    width=24 height=24
                >
                    <circle cx="12" cy="12" r="11" stroke="black" stroke-width="2" fill="black" />
                    <line x1="12" y1="6" x2="12" y2="18" stroke="white" stroke-width="2" />
                    <line x1="6" y1="12" x2="18" y2="12" stroke="white" stroke-width="2" />
                </svg>
            </a>
        </div>
        
<div class="for-lg" >
    <table class="table text-center" >
        <thead>
            <tr>
                <th>번호</th>
                <th class="w-50">제목</th>
                <th >작성자</th>
                <th>작성일</th>
                <th>조회</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($pinned) > 0)
                    foreach($pinned as $pin) {?>
                <tr>
                    <td><span class="notice">공지</span></td>
                    <td >
                        <a class="no-text-decoration hover-underline text-dark" href="<?=$detailUrl?><?=$pin->id?>"><?=$pin->title?></a>
                    </td>
                    <td><?=$pin->user_name?></td>
                    <td><?=date("Y-m-d H:i:s", $pin->created_at);?></td>
                    <td><?=$pin->view_count?></td>
                </tr>
            <?php } ?>
            <?php if(count($posts) > 0 ) {
                foreach($posts as $post) { ?>
                <tr>
                    <td><?=$post->id?></td>
                    <td >
                        <a class="no-text-decoration hover-underline text-dark" href="<?=$detailUrl?><?=$post->id?>"><?=$post->title?></a>
                    </td>
                    <td><?=$post->user_name?></td>
                    <td><?=date("Y-m-d H:i:s", $post->created_at);?></td>
                    <td><?=$post->view_count?></td>
                </tr>
                <?php } 
            } else { ?>
                <tr>
                    <td></td>
                    <td>등록된 공지사항이 없습니다</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="for-sm" >
    <table class="table text-center" >
        <thead>
            <tr>
                <th>번호</th>
                <th class="w-50">제목</th>
                <th>조회</th>
            </tr>
        </thead>
        <tbody>
            </tr>
            <?php if(count($pinned) > 0)
                    foreach($pinned as $pin) {?>
                <tr>
                <td>
                    <span class="notice">공지</span></td>
                    <td >
                        <a class="no-text-decoration hover-underline text-dark" href="<?=$detailUrl?><?=$pin->id?>"><?=$pin->title?></a>
                    </td>
                    <td><?=$pin->view_count?></td>
                </tr>
            <?php } ?>
            <?php if(count($posts) > 0 ) { ?>
            <?php foreach($posts as $post) { ?>
                <tr>
                    <td><?=$post->id?></td>
                    <td >
                        <a class="no-text-decoration hover-underline text-dark" href="<?=$detailUrl?><?=$post->id?>"><?=$post->title?></a>
                    </td>
                    <td><?=$post->view_count?></td>
                </tr>
            <?php } ?>
            <?php  } else { ?>
                <tr>
                    <td></td>
                    <td>등록된 공지사항이 없습니다</td>
                    <td></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>