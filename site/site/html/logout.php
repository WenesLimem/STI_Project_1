<?php

session_start();
    $_SESSION['active']=0;
session_destroy();
echo 'You have been logged out. <a href="/">Go back</a>';
header("Location: loginV.php");