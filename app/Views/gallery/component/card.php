<a href="gallery/<?= $item -> id?>">
    <img 
        class="img-responsive w-100 cursor-pointer" 
        src="/img/<?= $item->img_url ?>" 
        alt="" style="object-fit: cover" />
</a>
<div class="p-1">
    <span ><h5><?= $item -> title ?></h5></span>
    <span ><small class="text-secondary"><?= $item -> content  ?></small></span>
</div>