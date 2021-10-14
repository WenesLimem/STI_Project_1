<?php include('beforeTitle.php'); ?>
<title>Edit user</title>
<?php include('afterTitle.php'); ?>
<li><a href="#section1">Edit user</a></li>
<?php include('afterSection.php'); ?>
                <h2>Edit User:</h2>
                <div class="line-dec"></div>
                <span>You can make your changes here: </span>
            </div>
            <div class="right-image-post">
                <div class="row">

                    <div class="col-md-8">
                        <div class="left-text">

                            <form method="POST">
                                <a href="index.php">Back</a>


                                    <?php
                                    require "Db.php";
                                    session_start();
                                    if ($_SESSION["isConnected"]){
                                    } else {
                                        header("Location: loginV.php");
                                        exit();
                                    }
                                    $user = $_GET['email'];
                                    $rqt = $file_db->exec("SELECT * FROM users WHERE email='$user'");

                                    ?>
                                <p>
                                    <label>New Password:</label>
                                    <input type="text" id="password" name="password" placeholder="new pass"/>
                                </p>
                                <p><label>Upgrade to admin</label>
                                    <input type="radio" name="admin" value ="1"></p>
                                <p><label>Downgrade to nu</label>
                                    <input type="radio" name="normaluser" value ="0"></p>

                                <p><label>Deactivate user</label>
                                    <input type="radio" name="inactive" value="0"> </p>
                                <input type="submit" name="save" value="Save">
                            </form>

                            <?php
                            if(isset($_POST['save'])){

                                    $ad = $_POST['admin'];
                                    $nu = $_POST['normaluser'];
                                    $ac = $_POST['inactive'];
                                    echo $ac;
                                    $password = $_POST['password'];

                                    if ($ad){
                                        $sql = "UPDATE users SET admin='$ad' WHERE email='$user'";
                                        $file_db->exec($sql);

                                    }
                                    if ($nu == 0){
                                        $sql = "UPDATE users SET admin='$nu' WHERE email='$user'";
                                        $file_db->exec($sql);

                                    }
                                    if ($ac==0){
                                        $sql = "UPDATE users SET active='$ac' WHERE email='$user'";
                                        $file_db->exec($sql);
                                    }
                                    if ($password){
                                        $sql = "UPDATE users SET password='$password' WHERE email='$user'";
                                        $file_db->exec($sql);
                                    }

                                header('location: index.php');

                                include('end.php');
                            }

