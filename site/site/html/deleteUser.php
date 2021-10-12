<?php
require "Db.php";
session_start();

if (isset($_SESSION)){
    if  ($_SESSION['admin']){

        $user = $_GET["email"];

        echo $user;
       $res=$file_db->exec("DELETE FROM users WHERE email ='$user'");
        if ($res){

            header("Location: pass_through.php" );
        }
        else {
            echo "smth went wrong ! ";
            header("Location      : getAllUsers.php" );

        }
    }

}