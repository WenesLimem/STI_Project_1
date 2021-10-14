<?php include('beforeTitle.php'); ?>
<title>Mail box</title>
<?php include('afterTitle.php'); ?>
<li><a href="#section1">Mail Box</a></li>
<?php include('afterSection.php'); ?>
                <h2>Messages:</h2>
                <div class="line-dec"></div>
                <span>All messages are listed here:</span>
            </div>
            <div class="right-image-post">
                <div class="row">

                    <div class="col-md-8">
                        <div class="left-text">

                            <table border="1">
                                <thead>
                                <th>Date</th>
                                <th>Sender</th>
                                <th>Object</th>
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
                                $sql = "SELECT * FROM messages WHERE receiver_email='$user' ORDER BY datestamp DESCx§";
                                $query = $file_db->query($sql);

                                foreach($query as $row){
                                    echo "
					<tr>
				    	<td>".$row['datestamp']."</td>
						<td>".$row['sender_email']."</td>
						<td>".$row['object']."</td>
						  
						<td>
						    <a href='messageDetails.php?id=".$row['id']."'>Details</a>
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
<div class="white-button">
    <p></p>
<button>
    <a href="index.php">Home</a>
</button>
    <?php include('end.php'); ?>
