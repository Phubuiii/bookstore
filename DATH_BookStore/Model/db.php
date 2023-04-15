<?php
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbName = "bookstoretest";
    $port = "3306";
    $con = new mysqli($servername, $username_db, $password_db, $dbName, $port);

    if ($con -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
    
?>