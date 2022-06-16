<?php
require_once('db.php');

if (isset($_POST['submit'])){
    $search = $_POST['search'];
    $sql = "SELECT * FROM users where username like '%$search'";
    $stmt = $Connect->query($sql);
    print_r($stmt);
}
