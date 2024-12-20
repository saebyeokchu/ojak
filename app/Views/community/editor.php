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

?>

<!-- New post -->
<div class="bg-light pt-50">
    <div class="container" >
        <div class = "for-lg">
            <div class="d-flex justify-content-between pt-5 pb-2 " >
                <div class="ps-3 w-50">
                    <input type="text" class="form-control community-title" aria-describedby="communityTitleLG" placeholder="제목" value="<?= ( isset($post) && isset($post['title']) ) ? $post['title'] : '' ?>" />
                </div>
                <div class="d-flex flex-row gap-3 gap-x-3 w-25">
                    <select class="form-select w-50" id="lg-gubun-select" aria-label="Default select example">
                        <option value="1" selected>공지사항</option>
                        <option value="2">이벤트</option>
                        <option value="3">Q&A</option>
                    </select>
                    <button class="btn btn-dark" onclick="goBack(event)">취소</button>
                    <button class="btn btn-dark" onclick="savedata(event)">등록</button>
                </div>
            </div>
        </div>

        <div class = "for-sm ">
            <div class="d-flex justify-content-between pt-5 pb-2 " >
                    <div class="ps-3 w-75">
                        <input type="text" class="form-control community-title" aria-describedby="communityTitleSM" placeholder="제목" />
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
                <div class="ps-3">
                    <select class="form-select" id="sm-gubun-select" style="width:10rem;" aria-label="Default select example">
                        <option value="1" selected>공지사항</option>
                        <option value="2">이벤트</option>
                        <option value="3">Q&A</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <div id="pell-editor"></div>
            <div id="pell-markup" ></div>
        </div>
    </div>
</div>


<script src="https://unpkg.com/pell"></script> 
<script>
    window.onload = function(){
        const pell = window.pell;
        const editor = document.getElementById("pell-editor");
        const markup = document.getElementById("pell-markup");
        
        pell.init({
            element: editor,
            onChange: (html) => {
                // markup.innerHTML = "HTML Output: <br /><br />";
                markup.innerText = html;
            }
        })

        const isPost = <?= ( isset($post)) && ( isset($post['content'])) ? 1 : 0 ?>;

        console.log(isPost > 0);

        if(isPost > 0){
            const pellContent = document.querySelector('.pell-content');

            const encodedHtml = '<?php if(isset($post['content'])) echo urldecode(addslashes($post['content'])); ?>';
            const decodedHtml = decodeURIComponent(encodedHtml);

            pellContent.innerHTML = decodedHtml;
        }else{
            
            const pellContent = document.querySelector('.pell-content');
            pellContent.innerHTML = "<div>&nbsp</div>";
        }
        
    }
    

    async function savedata(event){
        event.preventDefault();

        const markup = document.getElementById("pell-markup");
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
            }if( markup.textContent.trim() == "" ){
                window.alert("내용이 존재하지 않습니다.");
                return;
            }else{
                try {
                    //구분값 가지고 오기
                    var smGubunVal = document.getElementById('sm-gubun-select');
                    var lgGubunVal = document.getElementById('lg-gubun-select');

                    const gubunVal = smGubunVal ? smGubunVal.value : lgGubunVal ;

                    var postData = new FormData();
                    postData.append('title', title);
                    postData.append('content', markup.textContent);
                    postData.append('id','<?= ( isset($post) && isset($post['id']) ) ? $post['id'] : '' ?>');
                    postData.append('user_id', getCookieByName('user_id'));
                    postData.append('gubun',gubunVal);

                    axios.post('/api/insertPost', postData).then(function(response){
                        console.log("success:", response);
                        location.href="/community/detail/" + response.data.insertedId + "/" + <?=$pageIndex?>;
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
    }

    function goBack(event){
        event.preventDefault();
        history.back();
    }
</script>

<style>

    .pell-content{
        background: white;
        border-bottom: 1px solid black;
        height: 100vh;
        
    }

</style>

