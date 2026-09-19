<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <br>
        Username:- 
        <input type="text" name="username">
        <br>
        Email:- 
        <input type="text" name="email">
        <br>
        Password:- 
        <input type="text" name="password">
        <br>
        <button type="submit">SUBMIT</button>

    </form>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"]==="POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        echo($username);
        echo($email);
        echo($password);
        
    }
    ?>