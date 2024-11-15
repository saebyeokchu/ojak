<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ojak</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="favicon.png">

    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- AOS - Scroll Anime -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/image.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/pell/dist/pell.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <?= view('/templates/header') ?? '' ?>

    <!-- CONTENT -->
    <div class="bg-body-secondary" style="padding-top:65px;">
        <?= ( isset($contents) ? view($yield, $contents) : view($yield) ) ?? '' ?>
    </div>  

    
    <?= (isset($view_footer) ? ( $view_footer == true && view('/templates/footer') ) : view('/templates/footer') ) ?? '' ?>

    <!-- SCRIPTS -->
    <script>
        AOS.init();
        </script>
    <!-- -->

</body>
</html>
