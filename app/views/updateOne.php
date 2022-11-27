<div class="blog-slider">
    <div class="blog-slider__wrp swiper-wrapper">
        <div>
            <center><h2>Update an article</h2></center>
            <center style="margin:20px">You want cancel ? <a id="login_bt" style="text-decoration:none;" href="/">HOME</a></center>
            <form action="/updateOne/<?=$article_id?>" method="post" style="display:grid; gap:20px">
                <div style="grid-row:2; " >
                    <label >New article title</label>
                    <input type="text"  name="title" value="<?=$article->getTitle()?>">
                </div>
                <div style="grid-row:3; grid-column:1" >
                    <label >New description</label>
                    <input type="text" name="descript" value="<?=$article->getDescript()?>">
                </div>
                <div style="grid-row:4; grid-column:1" >
                    <label >New illustration</label>
                    <input type="url" name="illustration" value="<?=$article->getIllustration()?>">
                </div>
                <div style="grid-row:2; grid-column:2" >
                    <label >New content</label>
                    <textarea name="content" rows="5" cols="33" value="<?=$article->getContent()?>"><?=$article->getContent()?></textarea>
                </div>

                <div style="grid-row:3; grid-column:2" >
                    <label >New Statut</label>
                    <select name="statut" value="<?=$article->getcategory()?>">
                        <option value="1">public</option>
                        <option value="0">private</option>
                    </select>
                </div>

                <div style="grid-row:4; grid-column:2" >
                    <label >New Category</label>
                    <select name="category" value="<?=$article->getcategory()?>">
                        <option selected>Choice</option>
                        <option value="ecolo">écologie</option>
                    </select>
                </div>
                <button style="grid-row:5; grid-column:2"  type="submit" name="update">Submit</button>
            </form>
        </div>
    </div>
</div>
