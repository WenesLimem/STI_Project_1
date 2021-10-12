<?php
require 'Db.php';
session_start();



?>
<html>
    <head>
        <title>Main page</title>
    </head>
    <body>
        <div>
            <?php echo "Welcome " . $_SESSION["user_name"] . "<br/>"; ?>
        </div>
        <div>
        </div>
        <div class="heading" position="right">
            <button><a href="getAllUsers.php">All users</a></button>

            <button> <a href="inbox.php">All Chats</a></button>

            <button><a href="addMessage.php">Write a new message </a></button>
        </div>
    </body>
    <button><a href='logout.php'>Log out</a></button>
</html>





