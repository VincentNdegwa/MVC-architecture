<?php
include('../../Model/Users/Users_class.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// session_destroy();
// session_abort();
$user = new UserClass();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['action'] == 'Register') {
        $obj = (object)$_POST;
        if ($user->create($obj)) {
            header("Location: ../../View/home.php");
            return $user->lastInsertId;
        } else {
            header("Location: ../../View/register.php");
            return false;
        }
    }

    if ($_POST['action'] == 'Login') {
        $obj = (object)$_POST;
        if ($user->read($obj)) {
            $_SESSION['data'] = $user->returnedData;
            header("Location: ../../View/home.php");
        } else {
            header("Location: ../../View/login.php");
            return false;
        }
    }
}
