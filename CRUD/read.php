<?php  
require './autoload.php';
include "connect.php";

$username = "";
if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}

var_dump($username);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img{
            width:100px;
            border-radius: 50% ;
        }
    </style>
    <title>Reading</title>
</head>
<body>
    <div class="container">
    <div id="header">
    <?php if ($username != ""): ?>
    <div>Hi <?=$_SESSION['username'] ?></div>
    <?php endif; ?>
    <div style="float: right">
        <a href="logout.php">Logout</a>
    </div>
    </div>
<div class="container">
        <button class="btn btn-primary my-5"><a href="user.php" class="text-light">Add User</a></button>
        <table class="table">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Gender</th>
                <th scope="col">User Name</th>
                <th scope="col">Image</th>
                <th scope="col">Nationality</th>
                <th scope="col">Operations</th>
            </thead>
            <?php 
            $sql = "SELECT * FROM crudtable";
            $result = mysqli_query($connect, $sql);

while($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $fname = $row['firstname'];
    $lname = $row['lastname'];
    $email = $row['email'];
    $tel = $row['telephone'];
    $gender = $row['gender'];
    $user = $row['username'];
    $role = $row['role'];
    $image = $row['image'];
    $nation= $row['nationality'];
    $pass = $row['password'];
?>
<tr>
    <th ><?php echo $id ?></th>
    <td><?php echo $fname ?></td>
    <td><?php echo $lname ?></td>
    <td><?php echo $email ?></td>
    <td><?php echo $tel ?></td>
    <td><?php echo $gender ?></td>
    <td><?php echo $user ?></td>
    <td><?php echo $role ?></td>
    <td><img src="<?php echo $image ?>" alt="Profile picture"></td>
    <td><?php echo $nation ?></td>
<td>
<button class="btn btn-primary " ><a href="update.php?id=<?php echo $id ; ?>" class= " text-light" style="text-decoration: none">Update</a></button>
    <button class= "btn btn-danger"><a href="delete.php?id=<?php echo $id ; ?>" class= " text-light" style="text-decoration: none"> Delete</a></button>
</td>
</tr>
<?php } ?>
        </table>
</body>
</html>