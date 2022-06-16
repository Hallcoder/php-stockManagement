<?php
require_once("../handlers/Inventory.php");
require_once("../handlers/db.php");

$o = new Inventory();

$o->deleteInventory();
