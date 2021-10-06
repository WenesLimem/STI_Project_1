<!DOCTYPE html>
<html lang="en">

<head>

</head>
<body>
    <div class="card" align="center">

        <div class="container">
            <form action="login.php" method="POST">
                <h1>Email</h1>
                <input type="text" name="email" placeholder="john.doe@gmail.com">
                <br/><br/>
                <h1>Password</h1>
                <input type="password" name="password" placeholder="*****">

                <br/><br/>
                <input type="submit" value="LogIn">
            </form>
        </div>
        <?php
        if (isset($_GET["error"]))
            echo '<div class="col-md-12 error">Wrong Login!</div>';

        ?>
    </div>


</body>
</html>