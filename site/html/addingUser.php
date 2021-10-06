<?php


include_once $_SERVER['DOCUMENT_ROOT'] . '/includes.php';
if ($_SESSION['user']->admin == 0) {
    header("location: loginV.php");
    exit;
}


$admin = 0;
if (isset($_POST["admin"]))
    $admin = 1;
Db::addUser($_POST["email"], $_POST['password'], $admin);
header("Location: confirmationV.php");
exit;
