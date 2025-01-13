<div id="menuWrapper" class="d-flex flex-row justify-content-between fw-bold gap-4 " style="font-size: 32px;">
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

    <div class="logged-in">
        <?php if($gubun ==2){ ?>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="plus-icon cursor-pointer"
                viewBox="0 0 24 24"
                width=24 height=24
                data-bs-toggle="modal" data-bs-target="#addEventModal"
            >
                <circle cx="12" cy="12" r="11" stroke="black" stroke-width="2" fill="black" />
                <line x1="12" y1="6" x2="12" y2="18" stroke="white" stroke-width="2" />
                <line x1="6" y1="12" x2="18" y2="12" stroke="white" stroke-width="2" />
            </svg>
        <?php }else{?>
        <a  href="/community/new?sub=<?=$gubun?>" >
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
        <?php } ?>
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
   