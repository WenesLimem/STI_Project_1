<?php
  include "Db.php" ;
  session_start();
 // var_dump($_SESSION);
  if (!isset($_SESSION['user_name'])){
       header("Location: loginV.php" );
  }else{
       echo "Redirecting ...";
       header("Location: index.php");
  }

