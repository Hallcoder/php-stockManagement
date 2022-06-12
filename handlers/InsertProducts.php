<?php
require_once("Product.php");

$p = new Product();
//INSERT
//$data = ['title' => 'This is next Post', 'content' => 'Enjoying the PHP OOP!'];
$p->addProducts();
echo "<br>";
echo "<br>";
echo "<br>";
echo "<pre>";
print_r($p->getProducts());
echo "</pre>";