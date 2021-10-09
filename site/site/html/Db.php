<html>
<head></head>
<body>

<?php

  // Set default timezone
  date_default_timezone_set('UTC');

    /*************************************
    * Create databases and                *
    * open connections                    *
    **************************************/
 
    // Create (connect to) SQLite database in file
     $file_db = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
    // Set errormode to exceptions
      $file_db->setAttribute(PDO::ATTR_ERRMODE,
                            PDO::ERRMODE_EXCEPTION); 
 
    /**************************************
    * Create tables                       *
    **************************************/

      $file_db->exec("CREATE TABLE IF NOT EXISTS users (
                    email TEXT PRIMARY KEY, 
                    password TEXT, 
                    admin INTEGER,
                    active INTEGER)");
    // Create table messages
        $file_db->exec("CREATE TABLE IF NOT EXISTS messages (
                    id INTEGER PRIMARY KEY, 
                    sender_email TEXT, 
                    receiver_email TEXT, 
                    object TEXT,
                    content TEXT,
                    datestamp TEXT,
                    status INTEGER)");



    /**************************************
    * Drop tables                         *
    **************************************/
    /*
    // Drop table messages from file db
    $file_db->exec("DROP TABLE messages");

    /**************************************
    * Close db connections                *
    **************************************/

    // Close file db connection
   // $file_db = null;



?>



</body>
</html>
