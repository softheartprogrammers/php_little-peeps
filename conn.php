<?php

try{
    $host = "localhost";
    $dbname = "todos";
    $user = "root";
    $pass = "";

    // This line essentially establishes a connection to the MySQL database using the provided credentials.
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
    echo "Error is" . $e->getMessage();

}