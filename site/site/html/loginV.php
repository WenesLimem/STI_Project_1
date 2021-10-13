<?php include('beforeTitle.php'); ?>
    <title>Sign in</title>
<?php include('afterTitle.php'); ?>
                        <li><a href="#section1">Sign in</a></li>
<?php include('afterSection.php'); ?>

                <h2><?php echo "Sign in"; ?></h2>
                <div class="line-dec"></div>
                <span>Please, enter your password and email</span>

            </div>
            <div class="right-image-post">
                <div class="row">

                    <div class="col-md-8">
                        <div class="left-text">

                            <form name="login" method="POST" action="login.php">
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
                                    <button type="submit" > Login </button>
                                </div>
                            </form>
<?php include('end.php'); ?>