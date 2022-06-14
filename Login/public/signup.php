<?php
require '../private/autoload.php';
$Error = '';
//$Err = '';
$username = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = $_POST['email'];
    if(!preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $email)){
        $Error = 'Please enter a valid email address';
//        echo '<br>';
    }
    $date = date('Y-m-d H:i:s');
    $url_address = get_random_string(60);

//    $username = trim($_POST['username']);
//    if (!preg_match("/^[a-zA-Z0-9]+$/", $username)){
////        $Err = 'Please enter a valid username';
//    }
    $username = esc($_POST['username']);
    $password = esc($_POST['password']);
    //check if email exists
    $arr = false;
    $arr['email'] = $email;
    $query = "SELECT * FROM users where email = :email limit 1";
    $stmt = $connection->prepare($query);
    $check = $stmt->execute($arr);

    if ($check){

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (is_array($data) && count($data) > 0) {
            $Error = 'The email is already in use';
        }

    }


    if ($Error === ''){

        $arr['url_address'] = $url_address;
        $arr['date'] = $date;
        $arr['username'] = $username;
        $arr['password'] = $password;
        $arr['email'] = $email;

        $query = "INSERT INTO users (url_address, username, password, email, date) VALUES(:url_address, :username, :password , :email, :date)";
        $stmt = $connection->prepare($query);
        $stmt->execute($arr);

        header("Location: login.php");
        die;
    }

}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
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
        ?></div>
    <div id = "title">Sign up </div>
    <label for="textbox">Username:</label><br>
    <input id="textbox" type="text" name="username" value="<?php echo $username?>" required>
    <label for="textbox">Email:</label><br>
    <input id="textbox" type="email" name="email" value="<?php echo $email?>" required>
    <label for="textbox">Password:</label><br>
    <input id="textbox" type="password" name="password" required>
    <input id="textbox" type="submit" name="Signup">

</form>
</body>
</html>
