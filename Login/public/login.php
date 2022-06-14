<?php

require '../private/autoload.php';
//$Error = " ";
$Err = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['token'])  && isset($_POST['token']) && $_SESSION['token'] == $_POST['token']) {

    $email = $_POST['email'];
    if (!preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $email)) {
        $Error = 'Please enter a valid email address';
//        echo '<br>';
    }
    $password = $_POST['password'];

    if ($Err === '') {

        $arr['password'] = $password;
        $arr['email'] = $email;

        $query = "SELECT * FROM users where email = :email && password = :password limit 1";
        $stmt = $connection->prepare($query);
        $check = $stmt->execute($arr);

        if ($check){

            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (is_array($data) && count($data) > 0) {
                $data = $data[0];
                $_SESSION['username'] = $data->username;
                $_SESSION['url_address'] = $data->url_address;
                header("Location: ../../ui/ReadProducts.php");
                die;
            }

        }


    }

    $Error = 'Wrong email or password';

}
$_SESSION['token'] = $url_address = get_random_string(60);

//echo $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <title>Login</title>
    <style type="text/css">
        *{
            font-family: nunito;
        }
        form{
            margin:auto;
            border: solid thin #aaa;
            padding:10px;
            max-width: 500px;
        }
        #title {
            background-color: #3a953a;
            padding:2em;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            color: white;
        }
        #textbox {
            border: solid thin #aaa;
            margin-left:60px;
            width:75%;
            padding: 5px;
        }
        .label {
            margin-left: 50px;
        }

    </style>
</head>
<body style="font-family: 'Nunito', sans-serif">
<form method="post"  class="form">
<?php
        if (isset($Error) && $Error !== " "){
            ?>
            <div class=" alert alert-danger">
                <?php
            echo $Error;
            echo '<br>';
            ?>
            </div>
            <?php
        }
        if (isset($Err) && $Err !== ''){
            ?>
            <div class=" alert alert-danger">
            <?php
            echo $Err;
            echo '<br>';
            ?>
            </div>
            <?php
        }
        ?>
    <div id = "title" class="container">Login </div>
<!--    <label for="textbox">Username:</label><br>-->
<!--    <input id="textbox" type="text" name="username" required>-->
<div class="form">
<div class="row my-2">
    <label for="textbox" class="label">Email:</label><br>
    <input id="textbox" type="email"  class = " form-control"name="email" required>
    </div>
    <div class="row my-2">
    <label for="textbox"  class="label">Password:</label><br>
    <input id="textbox" type="password"  class=" form-control" name="password" requiredd>
    </div>
    <input type = "hidden" name="token" value="<?=$_SESSION['token']?>">
    <div class="submit mb-2">
    <input id="textbox" type="submit"  class="btn btn-success"  name="login" value="Login"  >
    </div>
</div>
</form>
</body>
</html>

