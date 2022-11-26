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
                            <span class="blog-slider__code"><?=$article->getPubdate()?> by @<?=$article->getAuthor()?> <a id='login_bt' style='text-decoration:none;' href='/'>HOME</a></span>
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

<!-- affiche tous les commentaires et ses enfants-->
<div class="comment">
    <div class="blog-slider__title_comment" style="margin:5px">Comments</div>
    <div class="addComment">
        <div class="blog-slider__text_comment">Add comment:</div>
        <form action="/article/<?=$article->getId()?>/" method="post">
            <input style="width:100%" type="text" name="contentComment" placeholder="parent comment">  
            <input type="submit" value="submit">
        </form>
    </div>
    <hr>
    <?php    
        foreach($comments as $comment): 
    ?>
            <?php   
            if($comment->getId_parent_comment()==NULL):
            ?>
                <div class="oneComment">
                    <div class="parent_comment">
                        <span class="blog-slider__code_parent_comment">@<?=$comment->getAuthor()?></span>
                    <?php
                    if($logStatut){
                        echo "<form action='/article/".$article->getId()."/' method='post'><input type='hidden' name='comment_id' value='".$comment->getId()."'><button id='del_btn' type='submit'><span class='material-symbols-outlined' id='del_btn'>delete</span></button></form>";
                    }
                    ?> 
                        <div class="blog-slider__text_parent_comment"><?=$comment->getContent()?></div>
                        <span class="child_comment_date"><?=$comment->getPubdate()?></span>
                        <form action="/article/<?=$article->getId()?>/" method="post">
                            <input  type="text" name="contentComment" placeholder="child comment">
                            <input type="hidden" name="id_parent_comment" value="<?=$comment->getId()?>">
                        </form>
                    </div>
            <?php
                    foreach($comments as $childComment): 
                        if($comment->getId()==$childComment->getId_parent_comment()): 
            ?>
                            <div class="child_comment">
                                <span class="blog-slider__code_child_comment">@<?=$childComment->getAuthor()?></span>
                                <?php
                                if($logStatut){
                                    echo "<form action='/article/".$article->getId()."/' method='post'><input type='hidden' name='comment_id' value='".$childComment->getId()."'><button id='del_btn' type='submit'><span class='material-symbols-outlined' id='del_btn'>delete</span></button></form>";
                                }
                                ?>
                                <div class="blog-slider__text_child_comment"><?=$childComment->getContent()?></div>
                                <span class="child_comment_date"><?=$childComment->getPubdate()?></span>
                            </div>
             <?php        
                        endif ;
                    endforeach;
            ?>
                </div>
            <?php
            endif;
            ?>
        <?php
        endforeach;
        ?>
</div>         