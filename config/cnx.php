<?php
    include"config.php";
    try{
        $cnx = new PDO("mysql:host=$hostname;dbname=$db_name",$user_db, $pwd_db);
        $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e) {
        echo $e->getMessage();
    }
