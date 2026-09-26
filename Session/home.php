<?php

include "db.php";
session_start();
?>
<h2>Hello</h2> <?php 
echo $_SESSION['name'];
?>

<a href="logout.php">logout</a>