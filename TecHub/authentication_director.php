<?php 
session_start();

if (!isset($_SESSION['authenticated_director'])) {
    $_SESSION['status'] = "Please login to continue";
    header("Location: sign-in.php");
    exit(0);
}
?>