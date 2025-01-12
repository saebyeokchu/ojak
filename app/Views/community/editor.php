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

    if(isset($contents['post']) && isset($contents['pageIndex'])){
        if($post && $pageIndex){
            $qnaLink = '/community/edit?id='.$post['id'].'&gubun=3&pageIndex='.$pageIndex;
            $noticeLink = '/community/edit?id='.$post['id'].'&gubun=1&pageIndex='.$pageIndex;
        }
    }else{
        $qnaLink = '/community/new?sub=3';
        $noticeLink = '/community/new?sub=1';
    }
    
?>

<!-- New post -->
<div class="bg-light h-100 pt-150 pb-100" >

    <div class="d-flex container flex-column justify-content-start">
        <p class="fw-bold" style="font-size: 32px;">커뮤니티 게시물 등록</p>
    </div>

    <div class = "for-lg container">
        <div class="d-flex justify-content-between pt-3 pb-2 " >
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
    <div class = "for-sm container">
        <div class="pt-5 pb-2 d-flex justify-content-start gap-3">
            <span style="font-size:20px;" >
                <a href="<?= $noticeLink?>" class="<?= $sub == 1 ? 'fw-bold text-dark text-decoration-underline' : 'ojak-middle-gray hover-underline no-text-decoration' ?>">공지사항</a>
            </span>
            <span style="font-size:20px;" >
                <a href="<?= $qnaLink?>" class="<?= $sub == 3 ? 'fw-bold text-dark text-decoration-underline' : 'ojak-middle-gray hover-underline  no-text-decoration' ?>">Q&A</a>
            </span>
        </div>
        <div class="d-flex justify-content-between mt-2" >
            <div class="w-75">
                <input type="text" class="form-control community-title" aria-describedby="communityTitleSM" placeholder="제목"  value="<?= ( isset($post) && isset($post['title']) ) ? $post['title'] : '' ?>" />
            </div>
            <div class="dropdown pe-3">
                <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    :
                </button>
                <ul class="dropdown-menu">
                    <li  onclick="savedata(event)"><a class="dropdown-item" >저장</a></li>
                    <li onclick="goBack(event)" ><a class="dropdown-item"  >취소</a></li>
                </ul>
            </div>
            
        </div>
    </div>
    <div class="mt-3 container">
        <span class="text-secondary" style="font-size:12px;">최대 400자까지 입력하실 수 있습니다. ( <span id="editorCounter"><?= ( isset($post) && isset($post['content']) ) ? mb_strlen($post['content']) : 0  ?></span>자 / 200자 ) </span>
        <textarea id="textInput" class="w-100 form-control" rows="15" ><?= ( isset($post) && isset($post['content']) ) ? $post['content'] : ''  ?></textarea>
    </div>
</div>




<script>
    
    window.onload = function(){
        const textInput = document.getElementById("textInput");

        if (textInput.addEventListener) {
            textInput.addEventListener('input', function() {
                onTextTyped(textInput);
            }, false);
        } else if (textInput.attachEvent) {
            textInput.attachEvent('onpropertychange', function() {
            });
        }
    }
    

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


    async function savedata(event){
        event.preventDefault();

        // const markup = document.getElementById("pell-markup");
        const markup = document.getElementById("textInput");
        const titles = document.getElementsByClassName("community-title");
        let title = '';

        let i = 0;

        for(i=0;i<2;i++){
            if(titles[i].value){
                title += titles[i].value;
            }
        }

        if(markup){
            if( title == "" ) {
                window.alert("제목을 입력해주세요.");
                return;
            }if( markup.value.trim() == '' ){
                window.alert("내용이 존재하지 않습니다.");
                return;
            }else{
                turnOnLoadingScreen();
                try {
                    //구분값 가지고 오기
                    var smGubunVal = document.getElementById('sm-gubun-select');
                    var lgGubunVal = document.getElementById('lg-gubun-select');
                    

                    const gubunVal = smGubunVal ? smGubunVal.value : lgGubunVal.value ;

                    var postData = new FormData();
                    postData.append('title', title);
                    postData.append('content', markup.value);
                    postData.append('id','<?= ( isset($post) && isset($post['id']) ) ? $post['id'] : '' ?>');
                    postData.append('user_id', getCookieByName('user_id'));
                    postData.append('gubun',gubunVal);

                    axios.post('/api/insertPost', postData).then(function(response){
                        console.log("success:", response);
                        location.href="detail?gubun=<?=$sub?>&id=" + response.data.insertedId + "&pageIndex=<?=$pageIndex?>";
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

    function goBack(event){
        event.preventDefault();
        location.href="/community/list/<?=$sub?>?pageIndex=1"
    }
</script>

<style>

    .pell-content{
        background: white;
        border-bottom: 1px solid black;
        height: 100vh;
        
    }

</style>

