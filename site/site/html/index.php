<!DOCTYPE html>

<?php
require 'Db.php';
session_start();
?>

<?php include('beforeTitle.php'); ?>
    <title>Main Page</title>
<?php include('afterTitle.php'); ?>
                        <li><a href="#section1">Main Page</a></li>
<?php include('afterSection.php'); ?>
                <h2><?php echo "Welcome " . $_SESSION["user_name"]; ?></h2>
                <div class="line-dec"></div>
                <span>It is a small application to send messages between coworkers</span>
<?php include('beforeMainPart.php'); ?>
                            <h4>What do you want to do?</h4>
                            <p>Select your options:</p>

                            <div class="white-button">
                                <div class="heading" position="right">
                                    <p></p>
                                    <button><a href="getAllUsers.php">All users</a></button>
                                    <p></p>
                                    <button><a href="inbox.php">All Chats</a></button>
                                    <p></p>
                                    <button><a href="addMessage.php">Write a new message</a></button>
                                    <p></p>
                                        <button>
                                            <a href="changePass.php">Change Password</a>
                                        </button>
                                        <p></p>
                                </div>
</body>
<button><a href='logout.php'>Log out</a></button>                                    <div class="white-button">


<?php include('end.php'); ?>