<div>
    <center><h2>Update an article</h2></center>
    <center style="margin:20px">You want cancel ? <a id="login_bt" style="text-decoration:none;" href="./index.php">HOME</a></center>
    <form action="./middleware/crud.php" method="post" style="display:grid; gap:20px">
        <center>
        <div style="grid-row:1; " >
            <label >Choise an article to update :</label>
            <select name="choice" required>
            <option selected>choice</option>
            <?php
                $username = $_SESSION["username"];
                $maRequete = $pdo->prepare("SELECT * FROM article WHERE author = :username");
                $maRequete->execute(['username'=>$username]);
                $postes = $maRequete->fetchAll(PDO::FETCH_ASSOC);
                    foreach($postes as $poste): 
                    ?>
                    <option value="<?=$poste['id']?>"><?=$poste['title']?></option>
                    <?php endforeach; ?>
            </select>
    </div>
        </center>
        <div style="grid-row:2; " >
            <label >New article title</label>
            <input type="text"  name="title" required>
        </div>
        <div style="grid-row:3; grid-column:1" >
            <label >New description</label>
            <input type="text" name="descript" required>
        </div>
        <div style="grid-row:4; grid-column:1" >
            <label >New illustration</label>
            <input type="url" name="illustration" required>
        </div>
        <div style="grid-row:2; grid-column:2" >
            <label >New content</label>
            <input type="texte" name="content" required>
        </div>
        <div style="grid-row:3; grid-column:2" >
            <label >New Category</label>
            <select name="category"required>
                <option selected>Choice</option>
                <option value="ecolo">écologie</option>
            </select>
        </div>
        <button style="grid-row:4; grid-column:2"  type="submit" name="update">Submit</button>
    </form>
</div>
