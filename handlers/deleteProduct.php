<?php
require_once("../handlers/Product.php");
require_once("../handlers/db.php");

$p = new Product();

$p->deleteProduct();