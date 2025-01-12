<!-- Carousel -->
<?= view('/home/section/carousel') ?? '' ?>

<!-- Introduction -->
<?= view('/home/section/intro.html') ?? '' ?>

<!-- Arts -->
<?= view('/home/section/arts') ?? '' ?>

<!-- Instagram -->
<?= view('/home/section/notice'); ?>

<script>
    window.addEventListener('load', () => {
        document.body.classList.add('loaded');
    });
</script>




