<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "libero_manatad";
 
    $connect = new mysqli($host,$user,$pass,$database);
    if(!$connect) echo "There are some problems while connecting to database.";
?>