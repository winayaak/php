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
        <button type="submit">SUBMIT</button>
    </form>
</body>
</html>

<?php
    include "db.php";
    if ($_SERVER["REQUEST_METHOD"]==="POST") {
        $id= $_POST["id"];
        $username= $_POST["username"];
        $email= $_POST["email"];
        $age= $_POST["age"];
        $address= $_POST["address"];
    
        $sql = $conn ->prepare("insert into emp values(?,?,?,?,?)");
        $sql->bind_param("issis",$id,$username,$email,$age,$address);
        if($sql->execute()){
            echo "Record inserted successfully";
        }
    }
    ?>