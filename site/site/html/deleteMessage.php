<?php
require "Db.php";
session_start();

if (isset($_SESSION)){


        $user = $_GET["id"];
        $res=$file_db->exec("DELETE FROM messages WHERE id ='$user'");
        if ($res){

            header("Location: pass_through.php" );
        }
        else {
            echo "smth went wrong ! ";
            header("Location      : inbox.php" );

        }


}
