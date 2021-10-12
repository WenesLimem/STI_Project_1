<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inbox</title>
</head>
<body>
<table border="1">
    <thead>
    <th>ID</th>
    <th>Sender</th>
    <th>Object</th>
    <th>Content</th>
    <th>Date</th>
    <th>Status</th>
    <th>Actions</th>
    </thead>
    <tbody>
    <?php
    //include our connection
    include 'Db.php';
    session_start();
    $user=$_SESSION['user_name'];
    echo $user;


    //query from the table that we create
    $sql = "SELECT * FROM messages WHERE receiver_email='$user'";
    $query = $file_db->query($sql);

    foreach($query as $row){
        echo "
					<tr>
						<td>".$row['id']."</td>
						<td>".$row['sender_email']."</td>
						<td>".$row['object']."</td>
						<td>".$row['content']."</td>
						<td>".$row['datestamp']."</td>
						<td>".$row['status']."</td>
						<td>
							<a href='addMessage.php?email=".$row['sender_email']."'>Reply</a>
							<a href='deleteMessage.php?id=".$row['id']."'>Delete</a>
							
						</td>
					</tr>
				";
    }

    ?>
    </tbody>
</table>
</body>
<button>
    <a href="index.php">Home</a>
</button>
</html>

