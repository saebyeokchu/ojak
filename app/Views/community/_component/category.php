<div id="menuWrapper" class="d-flex flex-column">
    <div class="d-flex flex-row justify-content-between fw-bold gap-4 " style="font-size: 25px;">
        <div class="d-flex flex-row gap-4">
            <p class="cursor-pointer ">
                <a id="communityMiddleNotice" class=" <?= $gubun != 1 ? 'ojak-light-gray hover-underline no-text-decoration' : 'text-decoration-underline  text-dark' ?>">
                    공지사항
                </a>
            </p>
            <p class="cursor-pointer ">
                <a id="communityMiddleEvent"   class=" <?= $gubun != 2 ? 'ojak-light-gray hover-underline no-text-decoration' : 'text-decoration-underline  text-dark' ?>">이벤트</a>
            </p>
            <p class="cursor-pointer ">
                <a id="communityMiddleQna"  class="<?= $gubun != 3 ? 'ojak-light-gray hover-underline no-text-decoration' : 'text-decoration-underline  text-dark' ?>">Q&A</a>    
            </p>
        </div>

        <div class="logged-in for-lg">
            <?php if($gubun ==2){ ?>
                <span data-bs-toggle="modal" data-bs-target="#addEventModal" class="bs-button">이벤트 추가하기</span>
            <?php }else{?>
                <span onclick='location.href="/community/new?sub=<?=$gubun?>"' class="bs-button"><?= $gubun == 1 ? "공지사항" : "Q&A" ?> 추가하기</span>
            <?php } ?>
        </div>
    </div>


</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        //link
        const communityMiddleNotice = document.getElementById("communityMiddleNotice");
        const communityMiddleEvent = document.getElementById("communityMiddleEvent");
        const communityMiddleQna = document.getElementById("communityMiddleQna");

        communityMiddleNotice.href = getAllUrl().communityNotice;
        communityMiddleEvent.href = getAllUrl().communityEvent;
        communityMiddleQna.href = getAllUrl().communityQna;


        //layout
        const menuWrapper = document.getElementById("menuWrapper");
        const innerWidth = window.innerWidth;

        if(menuWrapper){
            if(innerWidth < 700){
                menuWrapper.style.marginTop = "70px";
                menuWrapper.style.fontSize = "18px";
            }else{
                menuWrapper.style.marginTop = "100px";
                menuWrapper.style.fontSize = "32px";
            }
        }
    });
</script>
   