<?php
const DB_NAME = 'stock';
const DB_USER = 'laurent';
const DB_PASS = 'sh@d0w123';
const DB_HOST = 'localhost';

//if(!$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)){
//    die('Failed to connect to database');
//}

$string = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
if (!$connection = new PDO($string, DB_USER, DB_PASS)){
    die("Failed to connect to database");
}