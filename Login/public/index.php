<?php
require '../private/autoload.php';
//$user_data = check_login($connection);

$username = "";
if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
<div id="header">
    <?php if ($username != ""): ?>
    <div>Hi <?=$_SESSION['username']?></div>
    <?php endif; ?>
    <div style="float: right">
        <a href="logout.php">Logout</a>
    </div>
</div>

<p>This is the homepage</p>
</body>
</html>