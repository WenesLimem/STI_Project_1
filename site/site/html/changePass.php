<?php include('beforeTitle.php'); ?>
<title>Change Pass</title>
<?php include('afterTitle.php'); ?>
<li><a href="#section1">Change Pass</a></li>
<?php include('afterSection.php'); ?>
<h2>Change your password</h2>
<div class="line-dec"></div>
<span>You can add an user: </span>
</div>
<div class="right-image-post">
    <div class="row">

        <div class="col-md-8">
            <div class="left-text">


                <?php
                session_start();
                if ($_SESSION["isConnected"]){


                    echo "<form action=\"changePass.php\" method=\"post\">
                    <div>
                    <form action=\"changePass.php\" method=\"post\">
                        <label> Current password
                            <input type=\"text\" name=\"cPass\" placeholder=\"cPass\"/>
                        </label>
                    </div>
                    <div>
                        <label> New password
                            <input type=\"password\" name=\"password\" placeholder=\"password\"/>
                        </label>
                    </div>
                    
                    <div>
                        <button type=\"submit\" value=\"Sum\" name=\"Submit1\" > Change Pass</button>
                    </div>
                        </form>";



                    require "Db.php";
                    session_start();
                    $cPass = $_POST['cPass'];
                    $password =$_POST['password'];
                    $dbUser=$_SESSION['user_name'];
                    $dbPass="";

                    $sql = "SELECT password FROM users WHERE email='$dbUser'";
                    $query = $file_db->query($sql);
                    foreach($query as $row){
                        $dbPass=$row['password'];
                    }

                    if(isset($_POST['Submit1']))
                    {
                        if($dbPass === $cPass){
                            $res = $file_db->exec("UPDATE users SET password='$password'WHERE email='$dbUser'");
                            echo "<p> Your password has changed </p>";
                        }else{
                            echo "<p> Your current password is incorrect </p>";
                        }
                    }



            }else{
            echo "<h1>connexion impossible</h1>
            You are not connected :(";
            }
            ?>

                <div class="white-button">
                    <p></p>
                    <button>
                        <a href="index.php">Home</a>
                    </button>

            <?php include('end.php'); ?>


