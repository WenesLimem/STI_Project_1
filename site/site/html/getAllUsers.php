<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Ops</title>
</head>
<body>
<a href="addUser.php">Add</a>
<table border="1">
    <thead>
    <th>ID</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Address</th>
    <th>Action</th>
    </thead>
    <tbody>
    <?php
    include 'Db.php';

    $sql = "SELECT * FROM users";
    $query = $file_db->query($sql);

    foreach($query as $row){
        echo "
					<tr>
						<td>".$row['email']."</td>
						<td>".$row['password']."</td>
						<td>".$row['admin']."</td>
						<td>".$row['active']."</td>
						<td>
							<a href='editUser.php?email=".$row['email']."'>Edit</a>
							<a href='deleteUser.php?email=".$row['email']."'>Delete</a>
						</td>
					</tr>
				";
    }
    ?>
    </tbody>
</table>
</body>
</html>