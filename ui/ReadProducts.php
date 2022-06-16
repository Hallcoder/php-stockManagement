<?php
session_start();
if(!($_SESSION['username'])){
    header('location: ../Login/public/login.php');
}
$username = "";
if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}
require_once("../handlers/Product.php");
require_once("../handlers/db.php");

$p = new Product();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>products</title>
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
    <button class="btn btn-success my-5"><a href="product.php" class="text-light">Add Product</a></button>
    <button class="btn btn-success my-5"><a href="Outgoing.php" class="text-light">Add Outgoing Product</a></button>
    <table class="table container">
        <thead>
        <th scope="col">ID</th>
        <th scope="col">Product</th>
        <th scope="col">Brand</th>
        <th scope="col">Supplier Phone</th>
        <th scope="col">Supplier Name</th>
        <th scope="col">Date</th>
        <th scope="col">Operations</th>
        </thead>

        <?php
        $sql = "SELECT * FROM products";
        $stmt = $Connect->query($sql);
//    print_r($stmt);
        while($DataRows=$stmt->fetch()){
        $id = $DataRows["productId"];
        $product = $DataRows["product_Name"];
        $brand = $DataRows["brand"];
        $phone = $DataRows["supplier_phone"];
        $supplier = $DataRows["supplier"];
        $date = $DataRows["added_date"];
        ?>
            <tr>
                <th ><?php echo $id ?></th>
                <td><?php echo $product ?></td>
                <td><?php echo $brand ?></td>
                <td><?php echo $phone ?></td>
                <td><?php echo $supplier ?></td>
                <td><?php echo $date ?></td>
                <td>
                    <button class="btn btn-success " ><a href="updateProduct.php?id=<?php echo $id ; ?>" class= " text-light" style="text-decoration: none">Update</a></button>
                    <button class= "btn btn-danger"><a href="../handlers/deleteProduct.php?id=<?php echo $id ; ?>" class= " text-light" style="text-decoration: none"> Delete</a></button>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>