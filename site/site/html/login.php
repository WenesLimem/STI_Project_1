<?php
    require "Db.php";
    session_start();

    $email =$_POST['email'];
    $password =$_POST['password'];

    $result =  $file_db->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
    foreach($result as $row) {
        if ($email==$row['email']){
           // echo 'reached here';
            if ($password == $row['password']){
              echo "logged in !"  ;
              $_SESSION["isConnected"] = true;
              $_SESSION['user_name']=$email;
              $_SESSION['admin']=$row['admin'];
              $_SESSION['active']=1;
              header('Location: index.php');

            }else{
                echo "wrong password";
                header('Location: loginV.php');
            }
        }
        else {                $_SESSION['id']=$result;

            echo " not a user";
            header('Location: addUser.php');
        }



    }

    ?>
