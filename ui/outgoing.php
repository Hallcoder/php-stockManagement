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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <title>Outgoing</title>
</head>
<body>
    <div class="form  container m-auto w-50 p-auto">
        <form action="../handlers/insertOutgoing.php" method="post" enctype="multipart/form">
            <h1 class="header">Register Outgoing Product</h1>
            <div class="row mb-3">
                <label for="productId">Product ID:</label>
                <input type="text" name="productId" id="productId" placeholder="Product ID" class = "form-control w-50">
            </div>
            <div class="row mb-3">
                <label for="quantity">Quantity:</label>
                <input type="text" name="quantity" id="quantity" placeholder="Quantity" class = "form-control w-50">
            </div>
            <div class=" row mb-3">
                <label for="date" class="form-label">Added Date</label>
                <input type="date" class="form-control w-50" id="date" name="date" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success mb-3" name="submit">Register</button>
            </div>
        </form>
    </div>
</body>
</html>