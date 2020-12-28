<?php 
	class user{
        public $host = "localhost";
        public $dbuser = "root";
        public $dbpass = "";
        public $db = "todolist";

        public function __construct() {
            $this->conn = mysqli_connect($this->host, $this->dbuser, $this->dbpass, $this->db);
        }

        public function login($username,$password, $type, $user)
        {
            $result = mysqli_query($this->conn, "SELECT*FROM $type WHERE user = '$username' AND pass = '$password' ");

            if (mysqli_num_rows($result) > 0) {
                    // set session
                    
                    if ($user == "admin") {
                        $_SESSION["admin"] = true;
                    }

                    if ($user == "user") {
                        $_SESSION["login"] = true;
                        $_SESSION["user"] = $username;
                        return $_SESSION['user'];
                    }
                    
                return $result;    
            }
        }

        public function tampilUser($user){
            $data = mysqli_query($this->conn, "SELECT*FROM $user ORDER BY id DESC");
            return $data;
        }

        public function tampil($user){
            $data = mysqli_query($this->conn, "SELECT*FROM $user");
            return $data;
        }

        public function tampilEditAdmin($id)
        {
            $data = mysqli_query($this->conn, "SELECT*FROM user WHERE id=$id");
            return $data;
        }

        public function simpanEditUser($id, $username, $password, $oldUser)
        {
            $ganti = mysqli_query($this->conn, "ALTER TABLE $oldUser RENAME $username");
            $gantiBio = mysqli_query($this->conn, "UPDATE user SET user='$username', pass='$password' WHERE id = $id");

            if ($ganti == true && $gantiBio == true) {
                return mysqli_affected_rows($this->conn);
            }
        }

        public function pencarian($cari,$user,$type)
        {
            $data = mysqli_query($this->conn,"SELECT*FROM $user WHERE $type LIKE '%$cari%'");
            return $data;
        }

        public function tambah($task,$user,$tgl,$wkt)
        {
            if ($tgl == true AND $wkt == true) {
               $data = mysqli_query($this->conn, "INSERT INTO $user VALUES ('', '$task', '$tgl', '$wkt')");
            }elseif ($tgl == false AND $wkt == false) {
               $data = mysqli_query($this->conn, "INSERT INTO $user VALUES ('', '$task', '', '' )");
            }elseif ($tgl == true AND $wkt == false) {
               $data = mysqli_query($this->conn, "INSERT INTO $user VALUES ('', '$task', '$tgl', '' )");
            }elseif ($tgl == false AND $wkt == true) {
                $data = mysqli_query($this->conn, "INSERT INTO $user VALUES ('', '$task', '', '$wkt' )");
            }

            if ($data) {
                // echo "<script> document.location.href ='index.php';</script>"; 
                return mysqli_affected_rows($this->conn);
            }else {
                  return false;
            }
        }

        public function hapus($id,$user)
        {
            mysqli_query($this->conn,"DELETE FROM $user WHERE id=$id ");
        }

        public function bacaEdit($id,$user)
         {
            $data = mysqli_query($this->conn,"SELECT*FROM $user WHERE id=$id");
            return $data;
         }

        public function simpanEdit($id,$task, $tgl, $wkt, $user)
        {
            mysqli_query($this->conn, "UPDATE $user SET task='$task', tanggal='$tgl', waktu='$wkt' WHERE id=$id");
            return mysqli_affected_rows($this->conn); 
        }

        public function simpanEditAdmin($id,$task, $tgl, $wkt, $user)
        {
            mysqli_query($this->conn, "UPDATE $user SET task='$task', tanggal='$tgl', waktu='$wkt' WHERE id=$id");
            return mysqli_affected_rows($this->conn); 
        }

        public function logout()
        {
            $_SESSION = [];
            session_unset();
            session_destroy();
        }

        public function logoutAdmin()
        {
            session_destroy();
        }

        public function register($username,$password,$password2)
        {
            // $username = $_POST["username"];
            // $password = $_POST["password"];
            // $password2 = $_POST["password2"];
            
            // cek adakah nama user yang sama
            $userSudahAda = mysqli_query($this->conn, "SELECT user FROM user WHERE user = '$username'");
            if ($username == "admin") {
                echo "<script>
                            alert('Gunakan nama lain');
                            location.replace('log/signup.php');
                         </script>";
                 return false;
            }
            if (mysqli_fetch_assoc($userSudahAda)) {
                echo "<script>
                            alert('Username tidak bisa digunakan');
                            location.replace('log/signup.php');
                         </script>";
                 return false;
            }

            // cek apakah pass beda
            if ($password != $password2) {
                echo "<script>
                            alert('Konfirmasi password salah');
                             location.replace('log/signup.php'); 
                         </script>";
                return false;
            }

            // masukkan user baru
            mysqli_query($this->conn,"INSERT INTO user VALUES ('', '$username', '$password')");

            // membuat  table baru
            $sql = "CREATE TABLE $username (
                      id int(11) AUTO_INCREMENT PRIMARY KEY,
                      `task` varchar(1000) NOT NULL,
                      `tanggal` date NOT NULL,
                      `waktu` time NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
            

            
            mysqli_query($this->conn, $sql);

            return mysqli_affected_rows($this->conn);
        }

        public function pencarianAdmin($cari)
        {
            $data = mysqli_query($this->conn,"SELECT*FROM user WHERE user LIKE '%$cari%' OR pass LIKE '%$cari%' ");
            return $data;
        }

        public function hapusUser($id, $username)
        {
            mysqli_query($this->conn,"DROP TABLE $username");
            mysqli_query($this->conn, "DELETE FROM user WHERE id=$id ");
            
        }




    }


 ?>