<?php
require_once("User.php");

$p = new User();
//INSERT
//$data = ['title' => 'This is next Post', 'content' => 'Enjoying the PHP OOP!'];
$p->addUsers();
echo "<br>";
echo "<br>";
echo "<br>";
echo "<pre>";
print_r($p->getUsers());
echo "</pre>";