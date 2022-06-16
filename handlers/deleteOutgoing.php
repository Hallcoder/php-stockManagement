<?php
require_once("../handlers/Outgoing.php");
require_once("../handlers/db.php");

$o = new Outgoing();

$o->deleteOutgoing();
