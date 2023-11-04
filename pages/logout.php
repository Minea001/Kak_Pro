<?php
    session_start();
    // Unset all of the session variables
    $_SESSION = array();
    // Destroy the session.
    unset($_SESSION['loggedin']);
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    $session=session_destroy();
    if($session) {
        header("Location: login.php");
    }
     
?>