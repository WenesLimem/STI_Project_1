<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Mail Box</title>
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
                        <li><a href="#section1">All messages</a></li>
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

                <h2>Messages:</h2>
                <div class="line-dec"></div>
                <span>All messages are listed here:</span>
            </div>
            <div class="right-image-post">
                <div class="row">

                    <div class="col-md-8">
                        <div class="left-text">

                            <table border="1">
                                <thead>
                                <th>ID</th>
                                <th>Sender</th>
                                <th>Object</th>
                                <th>Content</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                                </thead>
                                <tbody>
                                <?php
                                //include our connection
                                include 'Db.php';
                                session_start();
                                $user=$_SESSION['user_name'];
                                echo $user;


                                //query from the table that we create
                                $sql = "SELECT * FROM messages WHERE receiver_email='$user'";
                                $query = $file_db->query($sql);

                                foreach($query as $row){
                                    echo "
					<tr>
						<td>".$row['id']."</td>
						<td>".$row['sender_email']."</td>
						<td>".$row['object']."</td>
						<td>".$row['content']."</td>
						<td>".$row['datestamp']."</td>
						<td>".$row['status']."</td>
						<td>
							<a href='addMessage.php?email=".$row['sender_email']."'>Reply</a>
							<a href='deleteMessage.php?id=".$row['id']."'>Delete</a>
							
						</td>
					</tr>
				";
                                }

                                ?>
                                </tbody>
                            </table>
</body>
<div class="white-button">
    <p></p>
<button>
    <a href="index.php">Home</a>
</button>
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

