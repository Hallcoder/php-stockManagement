<?php
require_once("../handlers/User.php");
require_once("../handlers/db.php");

$u = new User();
$u->updateUsers();


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
$sql = "SELECT * FROM users WHERE userId = $u->id";
$stmt = $Connect->query($sql);
//print_r($stmt);
while($DataRows=$stmt->fetch()){
    $id = $DataRows["userId"];
    $firstName = $DataRows["firstName"];
    $lastName = $DataRows["lastName"];
    $phone = $DataRows["telephone"];
    $gender = $DataRows["gender"];
    $nation = $DataRows["nationality"];
    $username = $DataRows["username"];
    $email = $DataRows["email"];
    $date = $DataRows["added_time"];

    ?>

    <div class="container">
        <div class="heading">
        </div>
        <div class="form  container m-auto w-50 p-auto">
            <h1 class="header"> Update account</h1>
            <form action="../handlers/insertUser.php" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="fname"> First Name</label>
                    <input type="text" name="firstname" class = "form-control" id="fname" placeholder="Enter First Name" required value="<?php echo $firstName; ?>"
                </div>
                <div class="row mb-3">
                    <label for="lname"> Last Name</label>
                    <input type="text" name="lastname" class = "form-control" id="lname" placeholder="Enter Last Name" required value="<?php echo $lastName; ?>"
                </div>
                <div class="row mb-3">
                    <label for="email"> Email</label>
                    <input type="email" name="email" class = "form-control" id="email" placeholder="Enter your email" required value="<?php echo $email?>">
                </div>
                <div class="row mb-3">
                    <label for="tel"> Telephone</label>
                    <input type="number" name="telephone" class = "form-control" id="tel" placeholder="Enter Telephone NUmber" required value="<?php echo $phone; ?>" required>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Female">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                </div>
                <div class="row mb-3">
                    <label for="nationality"> Nationality</label>
                    <Select name="nationality" id="nationality" class = "form-control">

                        <option value=""> --Select--</option>
                        <option value="Rwandan"> Rwandan</option>
                        <option value="Ugandan">Ugandan</option>
                        <option value="Kenyan"> Kenyan</option>
                    </Select>
                </div>
                <div class="row mb-3">
                    <label for="username"> User Name</label>
                    <input type="text" name="username" class = "form-control" id="username" placeholder="Enter your username" required value="<?php echo $username; ?>">
                </div>

                <div class="row mb-3">
                    <label for="password"> Password</label>
                    <input type="password" name="password" class = "form-control" id="password" placeholder="Enter your Password" required>
                </div>
                <div class="row mb-3">
                    <label for="cpassword"> Confirm Password</label>
                    <input type="password" name="cpassword" class = "form-control" id="cpassword" placeholder="Confirm your Password" required>
                </div>
                <div class="submit mb-3">
                    <input type="submit" class="btn btn-success" name="submit" value="Update" />
                </div>
            </form>
        </div>
        <div class="footer"> Copyright @2021 RCA</div>
    </div>


<?php } ?>

</body>
</html>