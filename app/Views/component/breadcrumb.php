<?php
    $breads = [];

    if(isset($breadsInput)){
        $breads = $breadsInput;
    }
?>

<div class="for-lg pt-100 " >
    <nav class="text-black d-flex flex-row gap-3 ps-2 " >
        <div >
            <a href="/">
                <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer" >
                    <path d="M5 0L0 4V12H3.125V7.33333H6.875V12H10V4L5 0Z" fill="#17171B"/>
                </svg>
            </a>
        </div>
        <?php 
            if(count($breads) > 0 ) { 
                foreach($breads as $bread) {
        ?>
            <!-- arrow -->
            <div> 
                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.58525 0.237468L7.79724 5.55673C7.87097 5.62005 7.92307 5.68865 7.95355 5.76253C7.98452 5.83641 8 5.91557 8 6C8 6.08443 7.98452 6.16359 7.95355 6.23747C7.92307 6.31135 7.87097 6.37995 7.79724 6.44327L1.58525 11.7784C1.41321 11.9261 1.19816 12 0.940091 12C0.682026 12 0.460828 11.9208 0.276496 11.7625C0.0921646 11.6042 -9.02928e-07 11.4195 -8.84474e-07 11.2084C-8.66021e-07 10.9974 0.0921646 10.8127 0.276497 10.6544L5.69585 6L0.276497 1.34565C0.104455 1.19789 0.0184326 1.01594 0.0184326 0.79979C0.0184327 0.58322 0.110599 0.395779 0.294931 0.237468C0.479262 0.0791562 0.694316 3.14991e-07 0.940092 3.36477e-07C1.18587 3.57964e-07 1.40092 0.0791563 1.58525 0.237468Z" fill="#17171B"/>
                </svg>
            </div>
            <div class="fw-bold cursor-pointer" style="padding-top:1px;" class="cursor-pointer" onclick="location.href='<?=$bread['url']?>'">
                <?=$bread['name']?>
            </div>
        <?php } } ?>
    </nav>
</div>

<div class="for-sm pt-30 ">
    <nav class="text-black d-flex flex-row gap-3 ps-2 " >
        <div >
            <a href="/">
                <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer" >
                    <path d="M5 0L0 4V12H3.125V7.33333H6.875V12H10V4L5 0Z" fill="#17171B"/>
                </svg>
            </a>
        </div>
        <?php 
            if(count($breads) > 0 ) { 
                foreach($breads as $bread) {
        ?>
            <!-- arrow -->
            <div> 
                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.58525 0.237468L7.79724 5.55673C7.87097 5.62005 7.92307 5.68865 7.95355 5.76253C7.98452 5.83641 8 5.91557 8 6C8 6.08443 7.98452 6.16359 7.95355 6.23747C7.92307 6.31135 7.87097 6.37995 7.79724 6.44327L1.58525 11.7784C1.41321 11.9261 1.19816 12 0.940091 12C0.682026 12 0.460828 11.9208 0.276496 11.7625C0.0921646 11.6042 -9.02928e-07 11.4195 -8.84474e-07 11.2084C-8.66021e-07 10.9974 0.0921646 10.8127 0.276497 10.6544L5.69585 6L0.276497 1.34565C0.104455 1.19789 0.0184326 1.01594 0.0184326 0.79979C0.0184327 0.58322 0.110599 0.395779 0.294931 0.237468C0.479262 0.0791562 0.694316 3.14991e-07 0.940092 3.36477e-07C1.18587 3.57964e-07 1.40092 0.0791563 1.58525 0.237468Z" fill="#17171B"/>
                </svg>
            </div>
            <div class="fw-bold" style="padding-top:1px;" class="cursor-pointer" onclick="location.href='<?=$bread['url']?>'">
                <?=$bread['name']?>
            </div>
        <?php } } ?>
    </nav>
</div>