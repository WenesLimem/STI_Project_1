<?php include('beforeTitle.php'); ?>
<title>Add user</title>
<?php include('afterTitle.php'); ?>
<li><a href="#section1">Add user</a></li>
<?php include('afterSection.php'); ?>
                <h2><?php echo "Add user"; ?></h2>
                <div class="line-dec"></div>
                <span>You can add an user: </span>
            </div>
            <div class="right-image-post">
                <div class="row">

                    <div class="col-md-8">
                        <div class="left-text">

                            <form name="adduser" method="POST">
                                <div>
                                    <label> Email
                                        <input type="text" name="email" placeholder="email"/>
                                    </label>
                                </div>
                                <div>
                                    <label> Password
                                        <input type="password" name="password" placeholder="password"/>
                                    </label>
                                </div>
                                <div>
                                    <button type="submit" > Add User </button>
                                </div>
                                <?php

                                require "Db.php";
                                session_start();
                                $email = $_POST['email'];
                                $password =$_POST['password'];
                                $admin = 0;
                                $active = 1;


                                $res = $file_db->exec("insert into users values ('$email','$password',$admin ,$active)");
                                ?>
                            </form>
                            <div><?php if ($res){
                                    echo "User added successfully";
                                } ?>
                            </div>
                            <button> <a href="getAllUsers.php">Back</a> </button>
</body>
                            </div>
                            <?php include('end.php'); ?>


