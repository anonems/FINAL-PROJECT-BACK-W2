<?php

foreach($articles as $article): 
    if($article->getStatut()){
        ?>
        <div class="blog-slider__item swiper-slide">
            <div class="blog-slider__img">
                <img src="<?=$article->getIllustration()?>">
            </div>
            <div class="blog-slider__content">
                <span class="blog-slider__code"><?=$article->getPubdate()?> by @<?=$article->getAuthor()?> <a id='login_bt' style='text-decoration:none;' href='./index.php'>HOME</a></span>
                <div class="blog-slider__title"><?=$article->getTitle()?></div>
                <div class="blog-slider__text"><?=$article->getDescript()?></div>
                <a href="./blog/read_more.php?id=<?=$article->getId()?>" class="blog-slider__button">READ MORE</a>
            </div>
        </div>
<?php };
endforeach;

    // if(!isset($_SESSION['connecte'])){ //not connected => login/signin
    //     include('./auth/login.php');
    // }elseif($_SESSION['connecte']){ //connected => home blog
    //     include('./blog/blog.php');
    // }
            