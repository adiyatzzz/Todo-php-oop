<?php 
session_start();

include 'function.php';
$dataUser = new user();
$aksi =$_GET['act'];
// TAMBAH
if ($aksi == "tambah") {
	if ($dataUser->tambah($_POST['task'],$_SESSION["user"], $_POST['tanggal'], $_POST["waktu"]) > 0) {
		echo "<script> document.location.href ='index.php';</script>"; 
	}
}

// HAPUS
if ($aksi == "hapus") {
	$id = $_GET['id'];
	$dataUser->hapus($id,$_SESSION['user']);
	header("Location: index.php");
}

// hapus User
if ($aksi == "hapusUser") {
    $id = $_GET['id'];
    $user = $_GET['user'];
    $dataUser->hapusUser($id, $user);
    echo "<script> document.location.href ='admin/index.php';</script>";
}

//EDIT
if ($aksi == "edit") {
        $newtask = $_POST['newtask'];
        $tgl = $_POST['tanggal'];
        $wkt = $_POST['waktu'];
        $id = $_GET["id"];
        $oldtask = $_POST["oldtask"];
        if (!isset($newtask)) {
            $newtask = $oldtask; 
        }
        if ($dataUser->simpanEdit($id,$newtask, $tgl, $wkt, $_SESSION['user']) > 0) {
            if (headers_sent()) {
                echo "<script> location.replace('index.php'); </script>";
            }
            else{
                exit(header("Location: index.php"));
            }
        } else {
            $dataUser -> simpanEdit($id,$oldtask,$_SESSION['user']);
             echo "<script> location.replace('index.php'); </script>";
        }
}

//editAdmin
if ($aksi == "editAdmin") {
    if ($dataUser->simpanEditUser($_POST['id'], $_POST['username'], $_POST['password'], $_POST['olduser']) > 0) {
        echo '<script>
                alert("Berhasil di ubah");
                location.replace("admin/index.php");
            </script>';
    }else {
        echo '<script>
                alert("Gagal");
                location.replace("admin/index.php");
            </script>';
    }
}

// login User
if ($aksi == "login") {
    if ($dataUser->login($_POST['username'], $_POST['password'], "user", "user")) {
        header("Location: index.php");
        exit;    
    }else {
        echo '<script>
                alert("username dan password salah!");
                location.replace("log/login.php");
            </script>';
    }
}

// login admin
if ($aksi == "loginAdmin") {
    if ($dataUser->login($_POST['username'], $_POST['password'], "admin", "admin")) {
        header("Location: admin/index.php");
        exit;    
    }else {
        echo '<script>
                alert("username dan password salah!");
                location.replace("admin/login.php");
            </script>';
    }
    
}
//Logout
 if ($aksi == "logout") {
    $dataUser->logout();
    header("Location: log/login.php");        
}  

// logout admin
if ($aksi == "logoutAdmin") {
    $dataUser->logoutAdmin();
    header("Location: admin/login.php");  
}

//register
if ($aksi == "register") {
    if ($dataUser->register($_POST['username'], $_POST['password'], $_POST['password2']) > -1) {
        echo "<script>
                    alert('Akun sudah di buat');
                    location.replace('log/login.php');
                 </script>";
    }
}

?>