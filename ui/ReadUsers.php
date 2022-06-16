<?php
session_start();
if(!($_SESSION['username'])){
    header('location: ../Login/public/login.php');
}
$username = "";
if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}
require_once("../handlers/User.php");
require_once("../handlers/db.php");

$u = new User();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--    <link rel="stylesheet" href="user.css">-->
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
    <button class="btn btn-success my-5"><a href="user.html" class="text-light">Add User</a></button>
    <div class="input-group srh" >
        <form method="post" action="../handlers/search.php">
            <div class="form-outline">
                <input type="search" id="form1" class="form-control my-2" name="search" placeholder="Search User"/>
<!--                <label class="form-label" for="form1">Search User</label>-->
            </div>
            <input type="submit" class="btn btn-primary py-2 search" name="submit" value="Search">
            </input>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $search = $_POST['search'];
            $sql = "SELECT * FROM users where username like '%$search'";
            $stmt = $Connect->query($sql);
        }
        ?>
    </div>
    <table class="table container">
        <thead>
        <th scope="col">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Telephone</th>
        <th scope="col">Gender</th>
        <th scope="col">Nationality</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        </thead>

        <?php
        $sql = "SELECT * FROM users";
        $stmt = $Connect->query($sql);
//    print_r($stmt);
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
            <tr>
                <th ><?php echo $id ?></th>
                <td><?php echo $firstName ?></td>
                <td><?php echo $lastName ?></td>
                <td><?php echo $phone ?></td>
                <td><?php echo $gender ?></td>
                <td><?php echo $nation ?></td>
                <td><?php echo $username ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $date ?></td>
                <td>
                    <button class="btn btn-success " ><a href="updateUsers.php?id=<?php echo $id ; ?>" class= " text-light" style="text-decoration: none">Update</a></button>
                    <button class= "btn btn-danger"><a href="../handlers/deleteUsers.php?id=<?php echo $id ; ?>" class= " text-light" style="text-decoration: none"> Delete</a></button>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>