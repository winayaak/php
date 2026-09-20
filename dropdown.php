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
        Age:- 
        <input type="number" name="age">
        <br>
        Address:-:- 
        <input type="text" name="address">
        <br>
        Course:-
        <select name="course">
            <option value="BE">BE</option>
            <option value="MSc">MSc</option>
            <option value="MBA">MBA</option>
        </select>
        <button type="submit">SUBMIT</button>
    </form>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"]==="POST") {
        $id = $_POST["id"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $age = $_POST["age"];
        $address = $_POST["address"];
        $course = $_POST["course"];

        echo "ID: $id <br>";
        echo "Username: $username <br>";
        echo "Email: $email <br>";
        echo "Age: $age <br>";
        echo "Address: $address <br>";
        echo "Course: $course <br>";
    }

?>