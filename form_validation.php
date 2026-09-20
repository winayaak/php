<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form action="" method="POST">
    ID:- 
        <input type="text" name="id">
        <br>
        Username:- 
        <input type="text" name="username">
        <br>
        Email:- 
        <input type="text" name="email">
        <br>
        Password:- 
        <input type="password" name="password">
        <br>
        Confirm Password:- 
        <input type="password" name="confirm_password">
        <br>
        Address:-:- 
        <input type="text" name="address">
        <button type="submit">SUBMIT</button>
    </form>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"]==="POST") {
        $id = $_POST["id"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $address = $_POST["address"];

        if ($password !== $confirm_password) {
            echo ("<script>alert('Passwords do not match!');</script>");
        }
        if(empty($username)){
            echo ("<script>alert('Username is required!');</script>");
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo ("<script> alert('Invalid email format!!!');</script>");
        }
        
        echo "ID: $id <br>";
        echo "Username: $username <br>";
        echo "Email: $email <br>";
        echo "Address: $address <br>";
    }
    ?>