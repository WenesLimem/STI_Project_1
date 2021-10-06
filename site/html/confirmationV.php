<?php
include_once $_SERVER['DOCUMENT_ROOT'] . 'includes.php';
if (!isset($_SESSION["user"])) {
    header("location: loginV.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">


    <title>SimpleChatApp</title>
</head>
<body>
<?php include("header.php") ?>
<div class="container-fluid main">
    <div class="row h-100">
        <div class="col-md-9 content">
            <div class="panel panel-primary">
                <div class="panel-body" align="center">
                    Done!
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>