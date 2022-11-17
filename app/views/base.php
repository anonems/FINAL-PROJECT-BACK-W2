<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title><?= $_pageTitle ?></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css'>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
    <div class="blog-slider">
        <div class="blog-slider__wrp swiper-wrapper">
            <?php $_pageContent ?>
        </div>
        <div class="blog-slider__pagination"></div>
    </div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script><script  src="./script.js"></script>
    </body>
    <footer>
    </footer>
</html>