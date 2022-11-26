<div class="blog-slider">
    <div class="blog-slider__wrp swiper-wrapper">
        <div>
            <center><h2>Update an article</h2></center>
            <center style="margin:20px">You want cancel ? <a id="login_bt" style="text-decoration:none;" href="/">HOME</a></center>
            <form action="/update" method="post" style="display:grid; gap:20px">
                <center>
                <div style="grid-row:1; " >
                    <label >Choice an article to update :</label>
                    <select name="choice" required>
                    <option value="">choice</option>
                    <?php
                            foreach($articles as $article): 
                            ?>
                            <option value="<?=$article->getId()?>"><?=$article->getTitle()?></option>
                            <?php endforeach; ?>
                    </select>
            </div>
                </center>
                <button style="grid-row:4; grid-column:2"  type="submit" name="update">Submit</button>
            </form>
        </div>
    </div>
</div>
