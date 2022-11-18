<?php
    if($article->getStatut()):
        ?>
       <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                    <img src="<?=$article->getIllustration()?>">
                </div>
                <div class="blog-slider__content">
                    <span class="blog-slider__code"><?=date('Y-m-d H:i:s',$article->getPubdate())?> by @<?=$article->getAuthor()?> <a id='login_bt' style='text-decoration:none;' href='/'>HOME</a></span>
                    <div class="blog-slider__title"><?=$article->getTitle()?></div>
                    <div class="blog-slider__text"><?=$article->getContent()?></div>
                </div>
            </div>
<?php endif;


            