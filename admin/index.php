<?php 
session_start();


if (!isset($_SESSION["admin"])) {
    header ("Location: login.php");
    exit;
} 
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>admin-todo</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-image: url(&quot;assets/img/mountain_bg.jpg&quot;);">
    <div>
        <div class="header-dark" style="background-image: url(&quot;none&quot;);background-color: transparent;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="#">Welcome, Admin</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="?act=user">User</a></li>
                        </ul>
                        
                        <form class="form-inline mr-auto" target="_self" action="" method="post">
                            <div class="form-group"><label for="search-field"></label><input class="form-control search-field" type="text" name="cari" placeholder="Search" id="search-field" style="width: 400px; margin-left: 41px;"><button class="btn btn-primary" type="submit" style="background-color: transparent;" name="pencarian"><i class="fa fa-search"></i></button></div>
                        </form><a class="btn btn-light action-button" role="button" href="../proses.php?act=logoutAdmin">Log Out</a>
                    </div>
                </div>
            </nav>
            <?php include 'sistem.php'; ?>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>