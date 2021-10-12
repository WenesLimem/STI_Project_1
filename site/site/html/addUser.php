
<html lang="en">
    <head><title>Add new user</title></head>
    <body>
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
            if (isset($_SESSION)){
                if($_SESSION['admin']==1){
                    $admin = 1;
                };
            }

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
</html>


