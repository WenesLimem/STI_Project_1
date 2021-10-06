<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/STI_Project_1/site/html/includes.php';
    use control\User;

    if (!isset($_SESSION['user'])){
        header("Location : loginV.php");

    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Chat App</title>
</head>
<body>
<?php include("header.php") ?>
<div class="container-fluid main">
    <div class="row h-100">
        <div class="col-md-9 content">
            <div class="panel panel-primary">
                <div class="panel-heading" align="center">Mail Box</div>
                <div class="panel-body">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Topic</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <?php
                        $inbox = $_SESSION["user"]->User::inbox();
                        ?>
                        <tbody>
                        <tr>
                            <?php foreach ($inbox as $msg){ ?>
                        <tr>
                            <td><?= $msg->object; ?></td>
                            <td><?= (new control\User)->fetchUser($msg->sender_email)->email; ?></td>
                            <td><?= $msg->date ?></td>
                            <?php if ($msg->status == 1) { ?>
                                <td>Seen</td> <?php } else { ?>
                                <td>~ ^ ~ </td> <?php } ?>
                            <td><a href="messageMetadata.php?id=<?= $msg->id ?>">Show</a></td>
                        </tr>
                        <?php } ?>
                        <?php if (!$inbox) { ?>
                            <tr>
                                <td colspan="7" class="text-center">Your life is too real!</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

