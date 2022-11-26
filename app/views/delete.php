
            <div>
    <center><h2>Delete an article</h2></center>
    <center style="margin:20px">You want cancel ? <a id="login_bt" style="text-decoration:none;" href="./index.php">HOME</a></center>
            <form action="./middleware/crud.php" method="post" >
                <label >Choice an article to delete :</label>
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
                
                <button type="submit" name="delete">Delete</button>
            </form>
<?php if($_SESSION["username"] == 'test'){?>
            <center><h2>Delete a user account</h2></center>
                    <form action="./middleware/crud.php" method="post" >
                        <label >Choice a user to delete it:</label>
                        <select name="choice" required>
                        <option selected>choice</option>
                        <?php
                            $username = $_SESSION["username"];
                            $maRequete = $pdo->prepare("SELECT * FROM user WHERE username != :username");
                            $maRequete->execute(['username'=>$username]);
                            $postes = $maRequete->fetchAll(PDO::FETCH_ASSOC);
                                foreach($postes as $poste): 
                                ?>
                                <option value="<?=$poste['username']?>"><?=$poste['username']?></option>
                                <?php endforeach; ?>
                        </select>
                        
                        <button type="submit" name="delete_user">Delete</button>
                    </form>
            </div>
<?php } ?>
