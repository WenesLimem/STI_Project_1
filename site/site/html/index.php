<?php
require 'Db.php';
session_start();

if (isset($_SESSION)) {



    $result =  $file_db->query('SELECT * FROM users WHERE active=1');

}


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
            <form action="addMessage.php"></form>
        </div>
        <div>
                <div> User's List: <br/>
                    <?php
                    if ($_SESSION['active']){
                        foreach($result as $row) {
                         echo " User email:".$row['email']."<br/>";
                        }
                    }
                    ?>
                </div>
        </div>
        <div>
            <a href="inbox.php">All Chats</a>
        </div>
        <div>
            <a href="addMessage.php">Write a new message </a>
        </div>
    </body>
    <button><a href='logout.php'>Log out</a></button>
</html>





