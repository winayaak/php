<?php
include"db.php";
header("Content-type=text/csv");
header("Content-disposition:attachment;filename=product.csv");
$output=Fopen("php://output","w");
Fputcsv($output,array("pid","pname","category","price","quantity","brand","description"));
$result=$conn->query("select * from products");
while($row=$result->fetch_assoc()){
    
}
?>