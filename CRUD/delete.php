<?php
include "connect.php";
$id=$_GET['id'];
$connect ;
$sql = "DELETE FROM crudtable  WHERE id = '$id'";

$result =mysqli_query($connect, $sql);
if($result){
    // echo "Data Added successfully";
    header('location:read.php');
}


