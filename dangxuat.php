<?php
    require_once "a.php";
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['cart']);
    header('location: TC.php');
?>