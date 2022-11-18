<div class="blog-slider">
    <div class="blog-slider__wrp swiper-wrapper">
        <?php

        foreach($articles as $article): 
            if($article->getStatut()){
                ?>
                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">
                        <img src="<?=$article->getIllustration()?>">
                    </div>
                    <div class="blog-slider__content">
                        <span class="blog-slider__code"><?=date('Y-m-d H:i:s',$article->getPubdate())?> by @<?=$article->getAuthor()?></span>
                        <div class="blog-slider__title"><?=$article->getTitle()?></div>
                        <div class="blog-slider__text"><?=$article->getDescript()?></div>
                        <a class='blog-slider__button' href='/article/<?=$article->getId()?>/' >READ MORE</a>
                    </div>
                </div>
        <?php };
        endforeach;
        ?>
    </div>
    <div class="blog-slider__pagination"></div>
</div>


            