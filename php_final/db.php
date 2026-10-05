<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "php_final";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        echo("Not connected");
    }
    else {
        echo("");
    }
        
    
    ?>