<?php 
include "connect.php";
$id=$_GET['id'];
if(isset($_POST['submit'])){
    $firstname= $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $telephone= $_POST['telephone'];
    $nation= $_POST['nationality'];
    $username= $_POST['username'];
    $role = $_POST['role'];
    $password= $_POST['password'];
   $image = $_FILES['images'];
   $old_image = $_POST['old_image'];

 if ($image != ' '){
     $update_file =$_FILES['images']['name'];
 }else{
     $update_file = $old_image;
 }

 if (file_exists("images/".$_FILES['images']['name']))

   $filename = $image['name'];
   $filetemp = $image['tmp_name'];
   $filename_separate = explode('.', $_FILES['images']['name']);
   $filename_extension = strtolower(end($filename_separate));
   $extension = ['jpeg', 'jpg', 'png', 'gif'];

   if (in_array($filename_extension, $extension)){
       $upload_img=  'images/'.$_FILES['images']['name'];
       move_uploaded_file($_FILES['images']['tmp_name'], $upload_img);


    $sql = "UPDATE crudtable SET  firstname = '$firstname', lastname= '$lastname', email = '$email', telephone = '$telephone', gender = '$gender', username = '$username' ,image= '$upload_img', nationality = '$nation', password = '$password' WHERE id = '$id'";

    $result =mysqli_query($connect, $sql);
    if($result) {
        header('location:read.php');

    }

}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CRUD</title>
</head>
<body>
    <?php 
    // $connect;
    $sql = "SELECT * FROM crudtable WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $fname = $row['firstname'];
        $lname = $row['lastname'];
        $email = $row['email'];
        $tel = $row['telephone'];
        $gender = $row['gender'];
        $user = $row['username'];
       $image = $row['image'];
        $role = $row['role'];
        $nation= $row['nationality'];
        $pass = $row['password'];



      
    ?>
        <div class="container">
            <div class="heading">
                <h1> Rwanda Coding Academy </h1>
            </div>
            <div class="form">
                <h1 class="header"> Update account</h1>
                <form action="update.php?id=<?php echo $id ?>" method="POST"  enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="fname">First Name</label>
                        <input type="text" name="firstname" class = "form-control" id="fname" placeholder="Enter First Name" required value="<?php echo $fname; ?>">
                    </div>
                    <div class="row mb-3">
                        <label for="lname"> Last Name</label>
                        <input type="text" name="lastname" class = "form-control" id="lname" placeholder="Enter Last Name" required value="<?php echo $lname; ?>">
                    </div>
                    <div class="row mb-3">
                        <label for="email"> Email</label>
                        <input type="text" name="email" class = "form-control" id="email" placeholder="Enter your email" required value="<?php echo $email; ?>">
                    </div>
                    <div class="row mb-3">
                        <label for="tel"> Telephone</label>
                        <input type="text" name="telephone" class = "form-control" id="tel" placeholder="Enter Telephone NUmber" required value="<?php echo $tel; ?>">
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

                            <option value=""> ...Select...</option>
                            <option value="Rwanda"> Rwanda</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Kenya"> Kenya</option>
                        </Select>
                    </div>
                    <div class="row mb-3">
                        <label for="username"> User Name</label>
                        <input type="text" name="username" class = "form-control" id="username" placeholder="Enter your username" required value="<?php echo $user; ?>">
                        <?php $roles ="SELECT * FROM role";
                            $role =mysqli_query($connect, $roles);
                            ?>
                            <div class="row mb-3">
                            <label for="role"> Role</label>
                                <Select name="role" id="role" class = "form-control">
                                <?php
                    while($row = mysqli_fetch_assoc($role)){ ?>
                                <option value="<?= $row['id'] ?>"><?= $row['role'] ?></option>
                                <?php } ?>
                            </Select>
                        </div>
                   <div class="mb-3">
                       <label for="images" class="form-label">Profile Picture</label>
                       <input class="form-control" type="file" id="images" name="images">">
                   </div>
                    <div class="row mb-3">
                        <label for="password"> Password</label>
                        <input type="text" name="password" class = "form-control" id="password" placeholder="Enter your Password" required value="<?php echo $pass; ?>">
                    </div>
                    <div class="row mb-3">
                        <label for="cpassword"> Confirm Password</label>
                        <input type="password" name="cpassword" class = "form-control" id="cpassword" placeholder="Confirm your Password">
                    </div>
                    <div class="submit mb-3">
                        <input type="submit" class="btn btn-primary" name="submit" value="Update">
                    </div>
                </form>
            </div>
            <div class="footer"> Copyright @2021 RCA</div>
        </div>

<?php } ?>

</body>
</html>