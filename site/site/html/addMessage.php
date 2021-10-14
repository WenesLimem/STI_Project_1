<?php include('beforeTitle.php'); ?>
    <title>Send message</title>
<?php include('afterTitle.php'); ?>
    <li><a href="#section1">Send message</a></li>
<?php include('afterSection.php');  session_start()?>
                <h2>Send Message:</h2>
                <div class="line-dec"></div>
                <span>You can write your message here: </span>
            </div>
            <div class="right-image-post">
                <div class="row">

                    <div class="col-md-8">
                        <div class="left-text">

                            <form name="addMessage" method="POST">
                                <div>
                                    <label> TO :
                                        <input type="text" name="receiver" placeholder="" value="<?php echo $_GET['email']?>" />
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
                                if ($_SESSION["isConnected"]){
                                } else {
                                    header("Location: loginV.php");
                                    exit();
                                }


                                require "Db.php";
                                if (isset($_SESSION)){
                                    $receiver = $_POST['receiver'];
                                    $sender= $_SESSION['user_name'];
                                    $object = $_POST['object'];
                                    $content = $_POST['content'];
                                    $datestamp = date('Y-m-d');
                                    $status = 0;
                                    $res = $file_db->exec("insert into messages(receiver_email,sender_email,object,content,datestamp,status) values ('$receiver','$sender','$object','$content','$datestamp',0)");


                                } else {
                                    header('Location: loginV.php' );
                                }

                                ?>
                            </form>
                            <div><?php if ($res){

                                    header("location pass_through.php");
                                } ?></div>
</body>
<div class="heading" position="right">
    <p></p>
<button>
    <a href="index.php">Home</a>
</button>
<?php include('end.php'); ?>