<?php
// session_start();

require './autoload.php';
include "connect.php";
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

        // $arr['password'] = $password;
        // $arr['email'] = $email;

        // $query = "SELECT * FROM crudtable where email = :email && password = :password limit 1";
        $query = "SELECT * FROM crudtable where email = '$email' && password = '$password' limit 1";
        $result = mysqli_query($connect, $query);

        if ($result){

            // $data = $stmt->fetch_all(PDO::FETCH_OBJ);
            while($row = mysqli_fetch_assoc($result)){
                var_dump($row);
            if (is_array($row) && count($row) > 0) {
                $row = $row[0];
                $_SESSION['username'] = $row[6];
                // var_dump($row);
                header("Location: read.php");
                die;
            }

        }
    }


    }

    $Error = 'Wrong email or password';

}

//echo $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <style type="text/css">
        form{
            margin:auto;
            border: solid thin #aaa;
            padding:6px;
            max-width: 300px;
        }
        #title {
            background-color: #3a953a;
            padding:1em;
            text-align: center;
            color: white;
        }
        #textbox {
            border: solid thin #aaa;
            margin:4px;
            width:98%;
            padding-left: 4px;
            /*align-items: center;*/
        }

    </style>
</head>
<body style="font-family: 'Nunito', sans-serif">
<form method="post" >
    <div><?php
        if (isset($Error) && $Error !== " "){
            echo $Error;
            echo '<br>';
        }
        if (isset($Err) && $Err !== ''){
            echo $Err;
            echo '<br>';
        }
        ?></div>
    <div id = "title">Login </div>
<!--    <label for="textbox">Username:</label><br>-->
<!--    <input id="textbox" type="text" name="username" required>-->
    <label for="textbox">Email:</label><br>
    <input id="textbox" type="email" name="email" required>
    <label for="textbox">Password:</label><br>
    <input id="textbox" type="password" name="password" required>
    <input type = "hidden" name="token" value="<?=$_SESSION['token']?>">
    <input id="textbox" type="submit" name="login" value="Login"  >

</form>
</body>
</html>