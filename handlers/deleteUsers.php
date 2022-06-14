<?php
require_once("../handlers/User.php");
require_once("../handlers/db.php");

$u = new User();

$u->deleteUser();
