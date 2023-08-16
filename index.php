<?php

session_start();
if (empty($_SESSION)) {
    header("Location: ./View/login.php");
} else {
    header("Location: ./View/home.php");
}
