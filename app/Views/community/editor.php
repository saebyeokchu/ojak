<?php

    if(!isset($_COOKIE['user_id'])){
        echo '<script>window.alert("유효하지 않은 접근입니다.")</script>';
        echo '<script>location.href="/";</script>';
    }

    if(isset($contents['post'])){
        $post = $contents['post'];
    }

    if(isset($contents['pageIndex'])){
        $pageIndex = $contents['pageIndex'];
    }


    if(isset($contents['sub'])){
        $sub = $contents['sub'];
    }

    // if(isset($contents['post']) && isset($contents['pageIndex'])){
    //     if($post && $pageIndex){
    //         $qnaLink = '/community/edit?id='.$post['id'].'&gubun=3&pageIndex='.$pageIndex;
    //         $noticeLink = '/community/edit?id='.$post['id'].'&gubun=1&pageIndex='.$pageIndex;
    //     }
    // }else{
    //     $qnaLink = '/community/new?sub=3';
    //     $noticeLink = '/community/new?sub=1';
    // }
    
?>

<!-- New post -->
<div class="d-flex justify-content-center    pt-150 pb-100 bg-light " >
    <div class="d-flex flex-column px-5    w-100" style="max-width:1440px;" >

        <div class="d-flex container flex-column justify-content-start">
            <p class="fw-bold for-lg" style="font-size: 32px;">커뮤니티 게시물 등록</p>
            <p class="fw-bold for-sm" style="font-size: 26px;">커뮤니티 게시물 등록</p>
        </div>

        <div class = "container">
            <div class="pt-3 d-flex justify-content-start gap-3">
                <span class="cursor-pointer" style="font-size:20px;" id="noticeCategory" onclick="changeCategory('1');">공지사항</span>
                <span class="cursor-pointer" style="font-size:20px;" id="qnaCategory" onclick="changeCategory('3');">Q&A</a>
            </div>
            <div class="d-flex justify-content-between pt-3 pb-2 hide-item" >
                <div class=" w-50">
                    <input type="text" class="form-control community-title" aria-describedby="communityTitleLG" placeholder="제목" value="<?= ( isset($post) && isset($post['title']) ) ? $post['title'] : '' ?>" />
                </div>
                <div class="d-flex flex-row gap-3 gap-x-3 w-25">
                    <select class="form-select w-50" id="lg-gubun-select" aria-label="Default select example">
                        <option value="1" <?= $sub == 1 ? 'selected' : '' ?>>공지사항 </option>
                        <option value="3" <?= $sub == 3 ? 'selected' : '' ?>>Q&A</option>
                    </select>
                    <button class="btn btn-dark" onclick="goBack(event)">취소</button>
                    <button class="btn btn-dark" onclick="savedata(event)">등록</button>
                </div>
            </div>
        </div>


        <div class="container">
            <input id="editorTitle" type="text" class="form-control community-title" aria-describedby="communityTitle" placeholder="제목"  value="<?= ( isset($post) && isset($post['title']) ) ? $post['title'] : '' ?>" />
            <span class="text-secondary mt-2" style="font-size:10px;">최대 400자까지 입력하실 수 있습니다. ( <span id="editorCounter"><?= ( isset($post) && isset($post['content']) ) ? mb_strlen($post['content']) : 0  ?></span>자 / 200자 ) </span>
            <textarea id="textInput" class="w-100 form-control" rows="15" ><?= ( isset($post) && isset($post['content']) ) ? $post['content'] : ''  ?></textarea>
        </div>

        <div class="d-flex flex-row gap-3 justify-content-center mt-3">
            <button class="btn btn-dark" onclick="goBack(<?= isset($post) ? $post['id'] : 0 ?>,event)">취소</button>
            <button class="btn btn-dark" onclick="savedata(event)">등록</button>
        </div>
    </div>
</div>




<script>
    //noticeCategory qnaCategory

    let currentCategory = null;

    function activateCategory(on,off){
        on.classList.remove("ojak-middle-gray");
        on.classList.remove("hover-underline");
        on.classList.remove("no-text-decoration");
        on.classList.add("text-dark");
        on.classList.add("fw-bold");
        on.classList.add("text-decoration-underline");

        off.classList.remove("text-dark");
        off.classList.remove("fw-bold");
        off.classList.remove("text-decoration-underline");
        off.classList.add("ojak-middle-gray");
        off.classList.add("hover-underline");
        off.classList.add("no-text-decoration");
    }

    function changeCategory(category){
        //위쪽부분 링크설정
        const noticeCategory = document.getElementById("noticeCategory");
        const qnaCategory = document.getElementById("qnaCategory");

        currentCategory = category;
        
        if(category == '1'){
            activateCategory(noticeCategory,qnaCategory);
        }else{
            activateCategory(qnaCategory,noticeCategory);

        }
    }

    window.addEventListener('load', () => {
        //위쪽부분 링크설정
        changeCategory(<?=$sub?>);

        const textInput = document.getElementById("textInput");

        if (textInput.addEventListener) {
            textInput.addEventListener('input', function() {
                onTextTyped(textInput);
            }, false);
        } else if (textInput.attachEvent) {
            textInput.attachEvent('onpropertychange', function() {
            });
        }
    });
    

    function onTextTyped(textInput){
        const editorCounter = document.getElementById("editorCounter");

        // markup.innerHTML = "HTML Output: <br /><br />";
        const countText = textInput.value.trim().length;

        if(countText <=  200 ){
            editorCounter.innerText = countText;
        }else{
            const truncatedText = textInput.value.substring(0, 200);

            // Update the editor content with the truncated text
            textInput.value = truncatedText;
        }
    }

    function getReturnUrl(postId){
        if(window.location.href.includes('edit')){
            return getUrl(postId,currentCategory,<?=$pageIndex?>).communityDetail;
        }else{
            console.log(currentCategory)
            if(currentCategory==1){
                return getUrl(0,0,<?=$pageIndex?>).communityNotice;
            }else{
                return getUrl(0,0,<?=$pageIndex?>).communityQna;

            }
        }
    }

    async function savedata(event){
        event.preventDefault();

        // const markup = document.getElementById("pell-markup");
        const markup = document.getElementById("textInput");
        const editorTitle = document.getElementById("editorTitle").value;
        let i = 0;

        if(markup){
            if( editorTitle == "" ) {
                window.alert("제목을 입력해주세요.");
                return;
            }if( markup.value.trim() == '' ){
                window.alert("내용이 존재하지 않습니다.");
                return;
            }else{
                turnOnLoadingScreen();
                try {
                    var postData = new FormData();
                    postData.append('title', editorTitle);
                    postData.append('content', markup.value);
                    postData.append('id','<?= ( isset($post) && isset($post['id']) ) ? $post['id'] : '' ?>');
                    postData.append('user_id', getCookieByName('user_id'));
                    postData.append('gubun',currentCategory);

                    axios.post('/api/insertPost', postData).then(function(response){
                        console.log("success:", response);
                        location.href = getReturnUrl(response.data.insertedId);
                    }).catch(function(error){
                        console.log("error:", error);
                    });
                    
                    return;
                } catch (error) {
                    console.error('Error inserting data:', error);
                }
            }
        }

        window.alert("오류가 발생했습니다. 잠시후 다시 시도하여 주세요.");
        turnOffLoadingScreen();
    }

    function goBack(postId, event){
        event.preventDefault();
        location.href = getReturnUrl(postId);
    }
</script>

<style>

    .pell-content{
        background: white;
        border-bottom: 1px solid black;
        height: 100vh;
        
    }

</style>

