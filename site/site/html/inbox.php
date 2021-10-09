<?php
    require "Db.php";
    session_start();


    $username = $_SESSION['user_name'];
      //  var_dump($_SESSION['username']);
    $sql = $file_db->query("SELECT DISTINCT * from messages 
                                      WHERE sender_email='$username' 
                                      OR receiver_email='$username' 
                                      ORDER BY id
                                      ");
    //var_dump($sql);
    echo " Chats: <br/>";

    foreach($sql as $row) {
        echo "       |" . $row['receiver_email'] . "|" . $row['object'] . "|" . $row['content'] . ".|" . $row['datestamp'] . "|" . $row['status'] . "</br>";
    }
    ?>
<html>
<head> Inbox </head>
<body>
<div>
    <a href="addMessage.php">Write a new message </a>
</div>
</body>
<div>
    <a href="addMessage.php">Write a new message </a>
</div>
</html>
