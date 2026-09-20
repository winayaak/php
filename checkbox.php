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
        Are you Subscribed:-
        <input type="checkbox" name="subscribe" value="yes">
        <br>
        <button type="submit">SUBMIT</button>
        </form>
</body>
</html>


<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];

    $subscribe = isset($_POST["subscribe"]) ? "yes" : "no";

    echo "My email is $email and my subscription status is $subscribe";
}

?>