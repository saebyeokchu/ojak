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

?>

<!-- New post -->
<div class="bg-light pt-50" style="height:100vw;" >
    <div class = "for-lg container">
        <div class="d-flex justify-content-between pt-5 pb-2 " >
            <div class=" w-50">
                <input type="text" class="form-control community-title" aria-describedby="communityTitleLG" placeholder="제목" value="<?= ( isset($post) && isset($post['title']) ) ? $post['title'] : '' ?>" />
            </div>
            <div class="d-flex flex-row gap-3 gap-x-3 w-25">
                <select class="form-select w-50" id="lg-gubun-select" aria-label="Default select example">
                    <option value="1" <?= $sub == 1 ? 'selected' : '' ?>>공지사항 </option>
                    <option value="2" <?= $sub == 2 ? 'selected' : '' ?>>이벤트</option>
                    <option value="3" <?= $sub == 3 ? 'selected' : '' ?>>Q&A</option>
                </select>
                <button class="btn btn-dark" onclick="goBack(event)">취소</button>
                <button class="btn btn-dark" onclick="savedata(event)">등록</button>
            </div>
        </div>
    </div>
    <div class = "for-sm container">
        <div class="d-flex justify-content-between pt-5 pb-2 " >
            <div class="w-75">
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
            <div class="ps-3">
                <select class="form-select" id="sm-gubun-select" style="width:10rem;" aria-label="Default select example">
                    <option value="1" <?= $sub == 1 ? 'selected' : '' ?>>공지사항</option>
                    <option value="2" <?= $sub == 2 ? 'selected' : '' ?>>이벤트</option>
                    <option value="3" <?= $sub == 3 ? 'selected' : '' ?>>Q&A</option>
                </select>
            </div>
        </div>
    </div>
    <div class="mt-3 container">
        <span class="text-secondary" style="font-size:12px;">최대 400자까지 입력하실 수 있습니다. ( <span id="editorCounter">0</span>자 / 400자 ) </span>
        <textarea id="textInput" class="w-100 form-control" rows="30" onkeydown="onTextTyped()"></textarea>
        <!-- <div id="pell-editor" class="mt-2" style="height:400px !important;"></div>
        <div id="pell-markup" style="display:none;"></div> -->
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
            actions: [
                'bold',              // Bold ("B")
                'italic',            // Italic ("/")
                'underline',         // Underline ("U")
                'strikethrough',     // Strikethrough ("S")
                {
                    name: 'heading1',  // H1
                    icon: 'H1',
                    title: 'Heading 1',
                    result: () => pell.exec('formatBlock', '<h1>')
                },
                {
                    name: 'heading2',  // H2
                    icon: 'H2',
                    title: 'Heading 2',
                    result: () => pell.exec('formatBlock', '<h2>')
                },{
                    name: 'heading3',  // H2
                    icon: 'H3',
                    title: 'Heading 3',
                    result: () => pell.exec('formatBlock', '<h3>')
                },
                {
                    name: 'orderedList',  // Numbered List (#)
                    icon: '#',
                    title: 'Ordered List',
                    result: () => pell.exec('insertOrderedList')
                },
                {
                    name: 'unorderedList', // Bulleted List (•)
                    icon: '•',
                    title: 'Unordered List',
                    result: () => pell.exec('insertUnorderedList')
                }
            ],
            onChange: (html) => {
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;
                const textContent = tempDiv.textContent || tempDiv.innerText || '';

                // markup.innerHTML = "HTML Output: <br /><br />";
                const countText = editor.textContent.replace("BIUSH1H2H3#•","").trim().length;

                if(countText <=  400 ){
                    editorCounter.innerText = countText;
                    markup.innerText = html;
                }else{
                    const truncatedText = textContent.substring(0, 400);

                    // Update the editor content with the truncated text
                    tempDiv.textContent = truncatedText;
                    document.querySelector('.pell-content').innerHTML = markup.innerHTML;
                }
            }
        })

        const isPost = <?= ( isset($post)) && ( isset($post['content'])) ? 1 : 0 ?>;

        console.log(isPost > 0);

        if(isPost > 0){
            const pellContent = document.querySelector('.pell-content');
            const markup = document.getElementById("pell-markup");

            const encodedHtml = '<?php if(isset($post['content'])) echo urldecode(addslashes($post['content'])); ?>';
            // const decodedHtml = decodeURIComponent(encodedHtml);

            const tempDiv = document.createElement('div'); // Create a temporary DOM element
            tempDiv.innerHTML = encodedHtml;              // Set the HTML content
            const decodedHtml = tempDiv.innerHTML; 
            
            markup.innerText = decodedHtml;
            pellContent.innerHTML = decodedHtml;
        }else{
            
            const pellContent = document.querySelector('.pell-content');
            pellContent.innerHTML = "<div>&nbsp</div>";
        }
        
    }

    function onTextTyped(){
            const textInput = document.getElementById("textInput");
            const editorCounter = document.getElementById("editorCounter");

            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = textInput.innerHTML;
            const textContent = tempDiv.textContent || tempDiv.innerText || '';

            // markup.innerHTML = "HTML Output: <br /><br />";
            const countText = textInput.textContent.trim().length;

            if(countText <=  400 ){
                editorCounter.innerText = countText;
            }else{
                const truncatedText = textContent.substring(0, 400);

                // Update the editor content with the truncated text
                tempDiv.textContent = truncatedText;
                textInput.innerHTML = tempDiv.innerHTML;
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
            }if( markup.textContent.trim() == '' ){
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
                    postData.append('content', markup.textContent);
                    postData.append('id','<?= ( isset($post) && isset($post['id']) ) ? $post['id'] : '' ?>');
                    postData.append('user_id', getCookieByName('user_id'));
                    postData.append('gubun',gubunVal);

                    axios.post('/api/insertPost', postData).then(function(response){
                        console.log("success:", response);
                        location.href="/community/detail/" + response.data.insertedId + "?pageIndex=<?=$pageIndex?>";
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

