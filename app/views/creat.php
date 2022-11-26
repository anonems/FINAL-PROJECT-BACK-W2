<div class="blog-slider">
    <div class="blog-slider__wrp swiper-wrapper">
    <div>
        <center><h2>Create an article</h2></center>
        <center  style="margin:20px">You want cancel ? <a id="login_bt" style="text-decoration:none;" href="/">HOME</a></center>
            <form action="/creat" method="post" style="display:grid; gap:20px">
                <div style="grid-row:1; " >
                <label >Title of article</label>
                <input type="text"  name="title" required>
                </div>
                <div style="grid-row:2; grid-column:1" >
                <label >description</label>
                <input type="text" name="descript" required>
                </div>
                <div style="grid-row:3; grid-column:1" >
                <label >illustration</label>
                <input type="url" name="illustration" required>
                </div>
                <div style="grid-row:1; grid-column:2" >
                <label >content</label>
                <input type="texte" name="content" required>
                </div>
                <div style="grid-row:2; grid-column:2" >
                <label >Category</label>
                <select name="category"required>
                    <option selected>Choice</option>
                    <option value="ecolo">écologie</option>
                </select>
                </div>
                <button style="grid-row:3; grid-column:2"  type="submit" name="create">Submit</button>
            </form>
        </div>
    </div>
</div>
