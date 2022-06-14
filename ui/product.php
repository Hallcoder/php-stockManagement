<?php
session_start();
if(!($_SESSION['username'])){
    header('location: ../Login/public/login.php');
}
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
            font-family: nunito;
        }
        .header {
            padding:10px;
            font-size:30px;
        }
    </style>
</head>
<body>
<div class=" container m-auto w-50 p-auto">
    <h1 class="header">Register Product</h1>
<form method="post" action="../handlers/InsertProducts.php" class="row g-1 m-auto">
    <div class="mb-3">
        <label for="product-name" class="form-label">Product Name</label>
        <input type="text" class="form-control w-50" id="product-name" placeholder="Enter product" name="product" required>
    </div>
    <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" class="form-control w-50" id="brand" placeholder="Enter brand" name="brand" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Supplier Phone Number</label>
        <input type="number" class="form-control w-50" id="phone" placeholder="Enter phone number" name="phone" required>
    </div>
    <div class="mb-3">
        <label for="supplier" class="form-label">Supplier Name</label>
        <input type="text" class="form-control w-50" id="supplier" placeholder="Enter supplier" name="supplier" required>
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Added Date</label>
        <input type="date" class="form-control w-50" id="date" placeholder="Enter supplier" name="date" required>
    </div>
    <div class="col-auto mb-3">
        <button type="submit" class="btn btn-success mb-3" name="submit">Register</button>
    </div>
</form>
    </div>
</body>
</html>