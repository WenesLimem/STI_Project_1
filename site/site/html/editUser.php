<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>EditUser</title>
    <h1>Edit User's information page</h1>
</head>
<body>
<form method="POST">
    <a href="index.php">Back</a>

    <p>
        <label for="lastname">New Password:</label>
        <?php
            require "Db.php";
            session_start();
            $user = $_GET['email'];
            $rqt = $file_db->exec("SELECT * FROM users WHERE email='$user'");

            ?>

        <input type="text" id="password" name="password" placeholder="new pass"/>
    </p>
    <p><input type="radio" name="admin" value ="1">Upgrade to admin</p>
    <p><input type="radio" name="normaluser" value ="0">Downgrade to normal user</p>
    <input type="submit" name="save" value="Save">
</form>

<?php
if(isset($_POST['save'])){

    $password = $_POST['password'];

    echo $password;
    if (isset($_POST['admin']) or isset($_POST['normaluser'])){
        $ad = $_POST['admin'];
        $nu = $_POST['normaluser'];
        if ($ad){
            $sql = "UPDATE users SET password='$password',admin='$ad' WHERE email='$user'";
        }else {
            $sql = "UPDATE users SET password='$password',admin='$nu' WHERE email='$user'";
        }

    }else {
        $sql = "UPDATE users SET password='$password' WHERE email='$user'";
    }
    //update our table

    $file_db->exec($sql);

    header('location: index.php');
}
?>
</body>
</html>