<?php
session_start();
include 'function.php';

if (!isset($_SESSION["login"])) {
    header ("Location: log/login.php");
    exit;
} 

// if (isset($_SESSION["user"])) {
//     $user = $_SESSION["user"];
// }


?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>newtodo</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-image: url('img/2.jpg'); "> 
    <div class="d-inline-block d-xl-flex mt-auto">
        <div class="container text-dark">
            <div class="row">
                <div class="col offset-lg-2 d-lg-flex mx-auto">
                    <h1 class="text-nowrap text-center text-white m-auto">Welcome <?php echo $_SESSION['user']; ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 my-auto my-md-auto">
                    <form action="proses.php?act=tambah" method="post"><textarea class="bg-light form-control  txt" rows="3" cols="0" name="task" required="" placeholder="Your activity" autofocus="" autocomplete="off" style="margin-top: 20px;"></textarea>
                    <input class="bg-light border border-light"type="date" name="tanggal" style="color: whitesmoke; margin: 5px 3px 0 0;">
                    <input class="bg-light border border-light" type="time" name="waktu" style="color: whitesmoke; margin: 5px;">
                    <button class="btn btn-primary" style="margin-left: 780px; margin-top: 5px;" 
                        type="submit" name="simpan" ><i class="fa fa-send"></i></button>
                    </form>
                    <a href="proses.php?act=logout" class="btn btn-primary">Log Out</a></div>
            </div>
        </div>
    </div>

	<div class="d-xl-flex">
        <div class="container d-inline-block" style="margin-right: 0px;margin-left: 488px;"><form action="" method="post"><input type="text" class="form-group"name="cari" style="width: 302px;max-width: 302px;height: 40px;padding: 5px;background-color: rgb(48,48,48);color: rgb(255,255,255);margin-right: 15px; display: block; border-radius: 7px; overflow: inherit;" placeholder="Cari"><input type="date" style="width: 302px;height: 37px;padding: 5px;background-color: rgb(48,48,48);color: rgb(255,255,255);margin-top: 2px;margin-right: 15px;" name="cariTanggal" value="<?php date("yyyy/mm/dd") ?>" 
            /><button class="btn btn-primary" type="search" name="mencari"><i class="fa fa-search"></i></button></form></div>
    </div>	
    <div class="container d-flex float-none d-xl-flex" style="margin-left: 102px;margin-top: 14px;margin-bottom: 10px;">
        <div class="row text-left d-flex" style="width: 1140px; min-width: 1140px; max-width: 1140px;">
                <?php 
                include 'sys.php'; 
                ?>
        </div>
    </div>
    <div class="footer-dark" style="filter: blur(0px) brightness(99%); margin-top: 130px;">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col item social"><a href="https://facebook.com"><i class="icon ion-social-facebook"></i></a><a href="https://twitter.com"><i class="icon ion-social-twitter"></i></a><a href="https://github.com"><i class="icon ion-social-github"></i></a><a href="https://instagram.com"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Muhammad Adiyat © 2019</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>