<?php include('beforeTitle.php'); ?>
    <title>Send message</title>
<?php include('afterTitle.php'); ?>
    <li><a href="#section1">Send message</a></li>
<?php include('afterSection.php'); ?>
                <h2>Send Message:</h2>
                <div class="line-dec"></div>
                <span>You can write your message here: </span>
                                <?php
                                session_start();


                                require "Db.php";?>
            <div class="right-image-post">
                <div class="row">

                    <div class="col-md-8">
                        <body class="left-text">

                            <form name="addMessage" method="POST">
                                <div>
                                    <label> TO: :
                                        <input type="text" name="receiver" placeholder="TO:" value="<?php $sender = $_GET['email'];echo $sender; ?>"/>
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
                                <div class="heading" position="right">
                                    <p></p>
                                    <button>
                                        <a href="index.php">Home</a>
                                    </button>
                                </div>
                                <?php
                                if (isset($_SESSION)){
                                    $receiver = $_GET['email'];
                                    $sender= $_SESSION['user_name'];
                                    $object = $_POST['object'];
                                    $content = $_POST['content'];
                                    $datestamp = date("Y.m.d");
                                    $status = 0;
                                    $id=rand(1,1000);
                                    $res = $file_db->exec("insert into messages(sender_email, receiver_email, object, content, datestamp, status) values ('$sender','$receiver','$object','$content','$datestamp',0) ORDER BY '$datestamp'");


                                } else {
                                    header('Location: loginV.php' );
                                }

                                ?>
                            </form>
                            <div><?php if ($res){

                                    header("location pass_through.php");
                                } ?></div>

</body>

<?php include('end.php'); ?>