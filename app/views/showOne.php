<!-- affiche un article en entier -->
<div class="blog-slider">
    <div class="blog-slider__wrp swiper-wrapper">
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
        <?php 
            endif;
        ?>
        </div>
    <div class="blog-slider__pagination"></div>
</div>

<!-- affiche tous les commentaires -->
<div class="comment">
    <div class="blog-slider__title_comment">Comments</div>
    <div class="addComment">
        <div class="blog-slider__text_comment">Add comment:</div>
        <form action="/article/<?=$article->getId()?>/" method="post">
            <input style="width:100%" type="text" name="contentComment" >  
            <input type="submit" value="submit">
        </form>
    </div>
    <hr>
    <?php    
        foreach($comments as $comment): 
    ?>
            <div class="oneComment">
                <span class="blog-slider__code_comment"><?=date('Y-m-d H:i:s',$comment->getPubdate())?> by @<?=$comment->getAuthor()?></span>
                <div class="blog-slider__text_comment"><?=$comment->getContent()?></div>
                <form action="/article/<?=$article->getId()?>/" method="post"><input style="width:100%" type="text" name="contentCommmentChild"></form>
                <?php foreach($childComments as $childComment): 
                    if($childComment->getId_parent_comment()==$comment->getId_parent_comment()): ?>
                    <span class="blog-slider__code_comment"><?=date('Y-m-d H:i:s',$childComment->getPubdate())?> by @<?=$childComment->getAuthor()?></span>
                    <div class="blog-slider__text_comment"><?=$childComment->getContent()?></div>
                <?php endif ; endforeach; ?>
            </div>
    <?php 
        endforeach;
    ?>
</div>



            