<?php 
include '../function.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>newtodo</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body  style="background-image: linear-gradient(to bottom right, #97fe7d, 50%, #00bc8c);">
    <div class="login-dark" style="">
        <form class="shadow-lg" method="post" action="../proses.php?act=register">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-key"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" required="" placeholder="Username"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><input class="form-control" type="password" name="password2" placeholder="Confirm password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="daftar">Sign Up</button></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>