<?php
$server = 'localhost';
$dbname = 'crud';
$dbuser = 'root';
$dbpass = '';

$connect = mysqli_connect($server, $dbuser, $dbpass , $dbname);

if(!$connect){
    echo mysqli_connect_error();
}
?>