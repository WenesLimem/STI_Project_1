<?php include('beforeTitle.php'); ?>
<title>Display all users</title>
<?php include('afterTitle.php'); ?>
<li><a href="#section1">Display all users</a></li>
<?php include('afterSection.php'); ?>
                <h2>Users:</h2>
                <div class="line-dec"></div>
                <span>All users are listed here:</span>
            </div>
            <div class="right-image-post">
                <div class="row">

                    <div class="col-md-8">
                        <div class="left-text">

                            <table border="1">
                                <thead>
                                <th>email</th>
                                <?php
                                session_start();
                                if ($_SESSION["isConnected"]){
                                } else {
                                    header("Location: loginV.php");
                                    exit();
                                }
                                if ($_SESSION['admin']) {
                                    echo "
          <th>Send a message</th>
          <th>Password</th>
          <th>Administrator state</th>
          <th>Active status</th>   
          <th>Actions</th>"; ?>
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
                                if ($_SESSION['admin']) {
                                    ?>
                                <div class="white-button">
                                    <button color="red"><a href='addUser.php'>Add new user</a></button>
                                    <p></p>
                                    <?php
                                }
                                foreach ($query as $row) {
                                    echo "
					<tr>
						<td>" . $row['email'] . "</td>
						<td><a href='addMessage.php?email=" . $row['email'] . "'>Send Message </a></td>";

                                    if ($_SESSION['admin']) {
                                        echo "  
                            <td>" . $row['password'] . "</td>
                            <td>" . $row['admin'] . "</td>
						    <td>" . $row['active'] . "</td>
							<td><a href='editUser.php?email=" . $row['email'] . "'>Edit</a>
							<a href='deleteUser.php?email=" . $row['email'] . "'>Delete</a>
							
							
							
						</td>
					</tr>";
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                            <div class="white-button">
                                <p></p>
                            <button>
                                <a href="index.php">Home</a>
                            </button>
                            </form>
<?php include('end.php'); ?>