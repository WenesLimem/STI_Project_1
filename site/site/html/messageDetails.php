<html>
<?php
session_start();
                                if ($_SESSION["isConnected"]){
                                } else {
                                    header("Location: loginV.php");
                                    exit();
                                };?>

<head>
    <title>Message details</title>
    <h1>Details & actions</h1>
</head>
<body>
    <div>
        <?php
            require "Db.php";
            $id = $_GET['id'];
            $sql =  "SELECT * FROM messages WHERE id='$id'";
            $query = $file_db->query($sql);

        foreach($query as $row) {
            echo "
                <table border='2'>
                     <thead>
                                <th>Date</th>
                                <th>Sender</th>
                                <th>Object</th>
                                <th>Content</th>
                                <th>Actions</th>
                                </thead>
                                <tbody>

					<tr>
				    	<td>" . $row['datestamp'] . "</td>  	
						<td>" . $row['sender_email'] . "</td>
						<td>" . $row['object'] . "</td>
						<td>".$row['content']."</td>
						  
						<td>
						    
							<a href='addMessage.php?email=" . $row['sender_email'] . "'>Reply</a>
							<a href='deleteMessage.php?id=" . $row['id'] . "'>Delete</a>
							
						</td>
					</tr>
					</tbody>
					</table>
				";
        }
        ?>
    </div>
    <div>
        <button>
            <a href="index.php">Home</a>
        </button>
    </div>
</body>
</html>
