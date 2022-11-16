<?php
try{ 

    $engine = "mysql";
    $host = "db";
    $port = 3306;
    $dbName = "blog";
    $username = "root";
    $password = "password";
    $pdo = new PDO("$engine:host=$host:$port;dbname=$dbName", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(Exception $e){

    die('Error : ' . $e -> getMessage());
    
}
?>