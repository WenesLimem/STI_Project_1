
<html lang="en">
    <head><title>Send message</title></head>
    <body>
        <form name="addMessage" method="POST">
             <div>
                 <label> TO: :
                     <input type="text" name="receiver" placeholder="TO:"/>
                 </label>
             </div>
            <div>
                 <label> Object :
                     <input type="text" name="object" placeholder="object"/>
                 </label>
             </div>
            <div>
                <label> Content:</label>
                     <textarea type="text" name="content" placeholder="hope it finds you well !"></textarea>

            </div>
            <div>
                <button type="submit" > Send </button>
            </div>
            <?php
            session_start();


            require "Db.php";
            if (isset($_SESSION)){
                $receiver = $_POST['receiver'];
                $sender= $_SESSION['user_name'];
                $object = $_POST['object'];
                $content = $_POST['content'];
                $datestamp = '10:25';
                $status = 0;
                $id=rand(1,1000);
                $res = $file_db->exec("insert into messages values ($id,'$sender','$receiver','$object','$content','$datestamp',0)");


            } else {
                header('Location: loginV.php' );
            }

            ?>
        </form>
    <div><?php if ($res){

                header("location pass_through.php");
            } ?></div>
    </body>
    <button>
        <a href="index.php">Home</a>
    </button>

</html>
