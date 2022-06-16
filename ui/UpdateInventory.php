<?php
require_once("../handlers/Inventory.php");
require_once("../handlers/db.php");

$i = new Inventory();
$i->updateInventory();


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
$sql = "SELECT * FROM stk_inventory WHERE inventory_id = $i->id";
$stmt = $Connect->query($sql);
//print_r($stmt);
while($DataRows=$stmt->fetch()){
    $oid = $DataRows["inventory_id"];
    $pId = $DataRows["productId"];
    $quantity = $DataRows["quantity"];
    $date = $DataRows["added_date"];
    ?>

    <div class="form  container m-auto w-50 p-auto">
        <form action="../handlers/insertOutgoing.php">
            <h1 class="header">Update Inventory</h1>
            <div class="row mb-3">
                <label for="productId">Product ID:</label>
                <input type="text" name="productId" id="productId" placeholder="Product ID" class = "form-control w-50" value="<?php echo $pId?>">
            </div>
            <div class="row mb-3">
                <label for="quantity">Quantity:</label>
                <input type="text" name="quantity" id="quantity" placeholder="Quantity" class = "form-control w-50" value="<?php echo $quantity; ?>">
            </div>
            <div class=" row mb-3">
                <label for="date" class="form-label">Added Date</label>
                <input type="date" class="form-control w-50" id="date" name="date" required value="<?php echo $date?>">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success mb-3" name="submit">Update</button>
            </div>
        </form>
    </div>


<?php } ?>

</body>
</html>
