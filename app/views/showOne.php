<?php

    var_dump($article);
    if($article['statut']){
        ?>
       <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                    <img src="<?=$article['illustration']?>">
                </div>
                <div class="blog-slider__content">
                    <span class="blog-slider__code"><?=$article['pubdate']?> by @<?=$article['author']?> <a id='login_bt' style='text-decoration:none;' href='../index.php'>HOME</a></span>
                    <div class="blog-slider__title"><?=$article['title']?></div>
                    <div class="blog-slider__text"><?=$article['content']?></div>
                </div>
            </div>
           
<?php };


            