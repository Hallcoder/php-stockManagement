<?php
require "./autoload.php";

if (isset($_SESSION['username'])){
    unset($_SESSION['username']);
}

header('Location:login.php');