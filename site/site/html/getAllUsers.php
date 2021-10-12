<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Ops</title>
    <h1> Users List</h1>
</head>
<body>

<table border="1">
    <thead>
    <th>email</th>
    <?php

      if ($_SESSION['admin']){echo"
          <th>password</th>
          <th>Administrator state</th>
          <th>Active</th>
          <th>Administrator state</th>
          <th>Actions</th>";?>
      <?php
      }
        ?>

    </thead>
    <tbody>
    <?php
    include 'Db.php';
    session_start();
    $sql = "SELECT * FROM users";
    $query = $file_db->query($sql);
    if ($_SESSION['admin']){
       ?><button color="red"> <a href='addUser.php'>Add new user</a></button> <?php
    }
    foreach($query as $row){
        echo "
					<tr>
						<td>".$row['email']."</td>
						<td><a href='addMessage.php?email=".$row['email']."'>Send Message </a></td>"
        ;

          if ($_SESSION['admin']){
            echo"  <td></td>
                            <td>".$row['password']."</td>
                            <td>".$row['admin']."</td>
						    <td>".$row['active']."</td>
							<td><a href='editUser.php?email=".$row['email']."'>Edit</a>
							<a href='deleteUser.php?email=".$row['email']."'>Delete</a>
							
							
							
						</td>
					</tr>";
            }
          }


    ?>
    </tbody>
</table>
<button>
    <a href="index.php">Home</a>
</button>
</body>
</html>