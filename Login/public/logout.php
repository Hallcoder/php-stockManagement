<?php
require "../private/autoload.php";
if (isset($_SESSION['url_address'])){
    unset($_SESSION['url_address']);
}

if (isset($_SESSION['username'])){
    unset($_SESSION['username']);
}

header('Location:login.php');