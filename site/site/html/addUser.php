<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Add User</title>
    <meta name="description" content=""/>
    <meta name="author" content="Tooplate"/>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Additional CSS Files -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/fontawesome.css"/>
    <link rel="stylesheet" href="assets/css/tooplate-style.css"/>
    <link rel="stylesheet" href="assets/css/owl.css"/>
    <link rel="stylesheet" href="assets/css/lightbox.css"/>
</head>
<!--
Tooplate 2116 Blugoon
https://www.tooplate.com/view/2116-blugoon
-->
<body>
<div id="page-wraper">
    <!-- Sidebar Menu -->
    <div class="responsive-nav">
        <i class="fa fa-bars" id="menu-toggle"></i>
        <div id="menu" class="menu">
            <i class="fa fa-times" id="menu-close"></i>
            <div class="container">
                <div class="author-content">
                    <h4>STI Project 1</h4>
                    <span>By Wenes Limem et Michael Ruckstuhl</span>
                </div>
                <nav class="main-nav" role="navigation">
                    <ul class="main-menu">
                        <li><a href="#section1">Add user</a></li>
                    </ul>
                </nav>

                <div class="copyright-text">
                    <p>Copyright 2020 Blugoon<br>
                        Design: Tooplate</p>
                </div>
            </div>
        </div>
    </div>

    <section class="section about-me" data-section="section1">
        <div class="container">
            <div class="section-heading">

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
                            </form>
                        </div>
                    </div>


                </div>

    </section>
</div>
<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/custom.js"></script>
<script>
    //according to loftblog tut
    $(".main-menu li:first").addClass("active");

    var showSection = function showSection(section, isAnimate) {
        var direction = section.replace(/#/, ""),
            reqSection = $(".section").filter(
                '[data-section="' + direction + '"]'
            ),
            reqSectionPos = reqSection.offset().top - 0;

        if (isAnimate) {
            $("body, html").animate(
                {
                    scrollTop: reqSectionPos
                },
                800
            );
        } else {
            $("body, html").scrollTop(reqSectionPos);
        }
    };

    var checkSection = function checkSection() {
        $(".section").each(function () {
            var $this = $(this),
                topEdge = $this.offset().top - 80,
                bottomEdge = topEdge + $this.height(),
                wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
                var currentId = $this.data("section"),
                    reqLink = $("a").filter("[href*=\\#" + currentId + "]");
                reqLink
                    .closest("li")
                    .addClass("active")
                    .siblings()
                    .removeClass("active");
            }
        });
    };

    $(".main-menu").on("click", "a", function (e) {
        e.preventDefault();
        showSection($(this).attr("href"), true);
    });

    $(window).scroll(function () {
        checkSection();
    });
</script>
</body>
</html>


