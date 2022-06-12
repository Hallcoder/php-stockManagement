<?php
require_once("../handlers/Product.php");
require_once("../handlers/db.php");

$p = new Product();
$p->updateProducts();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CRUD</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap');
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
<?php
$sql = "SELECT * FROM products WHERE productId = $p->id";
$stmt = $Connect->query($sql);
//print_r($stmt);
while($DataRows=$stmt->fetch()){
    $id = $DataRows["productId"];
    $product = $DataRows["product_Name"];
    $brand = $DataRows["brand"];
    $phone = $DataRows["supplier_phone"];
    $supplier = $DataRows["supplier"];
    $date = $DataRows["added_date"];
    ?>

        <div class=" container m-auto w-50 p-auto">
            <h1 class="header">Update Product</h1>
            <form method="post" action="updateProduct.php?id=<?php echo $id ?>" class="row g-1 m-auto">
                <div class="mb-3">
                    <label for="product-name" class="form-label">Product Name</label>
                    <input type="text" class="form-control w-50" id="product-name" placeholder="Enter product" name="product" value="<?php echo $product?>">
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" class="form-control w-50" id="brand" placeholder="Enter brand" name="brand" value="<?php echo $brand?>">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Supplier Phone Number</label>
                    <input type="number" class="form-control w-50" id="phone" placeholder="Enter phone number" name="phone" value="<?php echo $phone?>">
                </div>
                <div class="mb-3">
                    <label for="supplier" class="form-label">Supplier Name</label>
                    <input type="text" class="form-control w-50" id="supplier" placeholder="Enter supplier" name="supplier" value="<?php echo $supplier?>">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Added Date</label>
                    <input type="date" class="form-control w-50" id="date" placeholder="enter supplier" name="date" value="<?php echo $date?>">
                </div>
                <div class="col-auto mb-3">
                    <button type="submit" class="btn btn-success mb-3" name="submit">Update</button>
                </div>
            </form>
        </div>


<?php } ?>

</body>
</html>