<!DOCTYPE html>
<?php
//create object from class
require_once('../conn/class_function.php');
session_start();
$obj = new myclass();

if( isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    //excecute method login
    $obj->login_user($username,$password);
    if ($obj->pro_result ) {
        //store session login
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header('Location: index.php');
    } else {
        echo "login failed";
    }
}
 ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="../src/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../src/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../src/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../src/css/lib/helper.css" rel="stylesheet">
    <link href="../src/css/style.css" rel="stylesheet">
    <link href="../src/css/login-style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="login">
        <h1>Login</h1>
        <form method="POST">
            <label for="username">
                <i class="fa-solid fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="Username" id="username" >
            <label for="password">
                <i class="fa-solid fa-key"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password" >
            <input type="submit" value="Login" name="login">
        </form>
    </div>
</body>

</html>