<?php
session_start();
if(!($_SESSION['username'])){
    header('location: ../Login/public/login.php');
}
$username = "";
if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}
require_once("../handlers/Inventory.php");
require_once("../handlers/db.php");

$i = new Inventory();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <style>
        *{
            font-family:nunito;
        }
        a{
            text-decoration: none;
            color: white;
        }
        user{
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div id="header">
        <?php if ($username != ""): ?>
            <div class="container alert alert-success mt-3 user">Welcome <?=$_SESSION['username'] ?></div>
            <div style="float: right">
                <button class= "btn btn-danger"><a href="../Login/public/logout.php">Logout</a></button>
            </div>
        <?php endif; ?>
    </div>
    <button class="btn btn-success my-5"><a href="outgoing.php" class="text-light">Add an Inventory</a></button>
    <table class="table container">
        <thead>
        <th scope="col">Inventory ID</th>
        <th scope="col">Product ID</th>
        <th scope="col">Quantity</th>
        <th scope="col">Added Date</th>
        <th scope="col">Operations</th>
        </thead>

        <?php
        $sql = "SELECT * FROM stk_inventory";
        $stmt = $Connect->query($sql);
        //    print_r($stmt);
        while($DataRows=$stmt->fetch()){
            $invId = $DataRows["inventory_id"];
            $quantity = $DataRows["quantity"];
            $pId = $DataRows["productId"];
            $date = $DataRows["added_date"];
            ?>
            <tr>
                <th ><?php echo $invId ?></th>
                <th ><?php echo $pId ?></th>
                <th ><?php echo $quantity?></th>
                <td><?php echo $date ?></td>
                <td>
                    <button class="btn btn-success " ><a href="UpdateInventory.php?id=<?php echo $invId ; ?>" class= " text-light" style="text-decoration: none">Update</a></button>
                    <button class= "btn btn-danger"><a href="../handlers/deleteInventory.php?id=<?php echo $invId ; ?>" class= " text-light" style="text-decoration: none"> Delete</a></button>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

