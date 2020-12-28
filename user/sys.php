<?php 
require_once 'function.php';
$dataUser = new user();
 ?>

 <?php if (!isset($_GET['act'])): ?>
 	<?php header("Location: ?act=task") ;
    ?>
 <?php endif; ?>

 <!-- Tampil -->
 <?php if ($_GET['act'] == "task"): ?>
    <?php if (isset($_POST["mencari"])): ?>
        <!-- mencari task -->
         <?php if ($_POST['cari'] == true): ?>
                <?php 
                    $dataCari = $dataUser->pencarian($_POST['cari'],  $_SESSION["user"],"task");
                    while ($row = mysqli_fetch_assoc($dataCari)) {
                        if ($row["tanggal"] == "0000-00-00") {
                            $row["tanggal"] = "-";
                        }

                        if ($row["waktu"] == "00:00:00") {
                            $row["waktu"] = "-";
                        }
                     ?>

                    <div class="col d-inline-block" style="min-width: 379.995px;max-width: 379.995px;margin-top: 7px;margin-bottom: 4px;">
                        <div class="card" style="width: 356px;min-width: 356px;max-width: 356px;height: 186px;">
                            <div class="card-body" style="height:190px; max-height: 190px; overflow: auto;">
                                <p class="card-text"><?php echo $row["task"]; ?></p><p class="card-text"><?php echo $row["tanggal"]; ?> <b style="font-size: 20px;">|</b> <?php echo $row["waktu"]; ?></p>
                                <a class="card-link" href="?act=hapus&id=<?php echo $row["id"]; ?>" style="font-size: 23px;color: rgb(231,76,60);margin: 0px;margin-top: 0px;padding: 0px;padding-top: 0px;padding-bottom: 0px; position: relative;" onclick="return confirm ('Yakin?');"><i class="fa fa-trash" style="font-size: 23px;padding-top: 0px;margin: 0px;margin-top: 28px;"></i></a>
                                <a
                                    class="card-link" href="?act=edit&id=<?php echo $row["id"]; ?>" style=""><i class="fa fa-pencil" style="font-size: 23px;"></i></a>
                            </div>
                        </div>
                    </div> 
                    <?php } ?>
            <?php endif; ?> 
            <?php if ($_POST['cariTanggal'] == true): ?>
                <?php 
                    $dataCari = $dataUser->pencarian($_POST['cariTanggal'],$_SESSION['user'],"tanggal");
                    while ($row = mysqli_fetch_assoc($dataCari)) {
                        if ($row["tanggal"] == "0000-00-00") {
                            $row["tanggal"] = "-";
                        }

                        if ($row["waktu"] == "00:00:00") {
                            $row["waktu"] = "-";
                        }
                     ?>
                        

                    <div class="col d-inline-block" style="min-width: 379.995px;max-width: 379.995px;margin-top: 7px;margin-bottom: 4px;">
                        <div class="card" style="width: 356px;min-width: 356px;max-width: 356px;height: 186px;">
                            <div class="card-body" style="height:190px; max-height: 190px; overflow: auto;">
                                <p class="card-text"><?php echo $row["task"]; ?></p><p class="card-text"><?php echo $row["tanggal"]; ?> <b style="font-size: 20px;">|</b> <?php echo $row["waktu"]; ?></p>
                                <a class="card-link" href="?act=hapus&id=<?php echo $row["id"]; ?>" style="font-size: 23px;color: rgb(231,76,60);margin: 0px;margin-top: 0px;padding: 0px;padding-top: 0px;padding-bottom: 0px; position: relative;" onclick="return confirm ('Yakin?');"><i class="fa fa-trash" style="font-size: 23px;padding-top: 0px;margin: 0px;margin-top: 28px;"></i></a>
                                <a
                                    class="card-link" href="?act=edit&id=<?php echo $row["id"]; ?>" style=""><i class="fa fa-pencil" style="font-size: 23px;"></i></a>
                            </div>
                        </div>
                    </div> 
                    <?php } ?>
            <?php endif; ?>

            <?php if ($_POST["cari"] == false && $_POST["cariTanggal"] == false) :?>
                    <?php 

                    $data = $dataUser->tampilUser($_SESSION['user']);
                    while ($row = mysqli_fetch_assoc($data)) {
                        if ($row["tanggal"] == "0000-00-00") {
                            $row["tanggal"] = "-";
                        }

                        if ($row["waktu"] == "00:00:00") {
                            $row["waktu"] = "-";
                        }
                    ?>

                    <div class="col d-inline-block" style="min-width: 379.995px;max-width: 379.995px;margin-top: 7px;margin-bottom: 4px;">
                        <div class="card" style="width: 356px;min-width: 356px;max-width: 356px;height: 186px;">
                            <div class="card-body" style="height:190px; max-height: 190px; overflow: auto;">
                                <p class="card-text"><?php echo $row["task"]; ?></p><p class="card-text"><?php echo $row["tanggal"]; ?> <b style="font-size: 20px;">|</b> <?php echo $row["waktu"]; ?></p>
                                <a class="card-link" href="proses.php?act=hapus&id=<?php echo $row["id"]; ?>" style="font-size: 23px;color: rgb(231,76,60);margin: 0px;margin-top: 0px;padding: 0px;padding-top: 0px;padding-bottom: 0px; position: relative;" onclick="return confirm ('Yakin?');"><i class="fa fa-trash" style="font-size: 23px;padding-top: 0px;margin: 0px;margin-top: 28px;"></i></a>
                                <a
                                    class="card-link" href="?act=edit&id=<?php echo $row["id"]; ?>" style=""><i class="fa fa-pencil" style="font-size: 23px;"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php  
                    }
                    ?>

            <?php endif; ?>
             
    <?php else: ?>    
        <?php 

        $data = $dataUser->tampilUser($_SESSION['user']);
        while ($row = mysqli_fetch_assoc($data)) {
            if ($row["tanggal"] == "0000-00-00") {
                $row["tanggal"] = "-";
            }

            if ($row["waktu"] == "00:00:00") {
                $row["waktu"] = "-";
            }
        ?>

        <div class="col d-inline-block" style="min-width: 379.995px;max-width: 379.995px;margin-top: 7px;margin-bottom: 4px;">
            <div class="card" style="width: 356px;min-width: 356px;max-width: 356px;height: 186px;">
                <div class="card-body" style="height:190px; max-height: 190px; overflow: auto;">
                    <p class="card-text"><?php echo $row["task"]; ?></p><p class="card-text"><?php echo $row["tanggal"]; ?> <b style="font-size: 20px;">|</b> <?php echo $row["waktu"]; ?></p>
                    <a class="card-link" href="proses.php?act=hapus&id=<?php echo $row["id"]; ?>" style="font-size: 23px;color: rgb(231,76,60);margin: 0px;margin-top: 0px;padding: 0px;padding-top: 0px;padding-bottom: 0px; position: relative;" onclick="return confirm ('Yakin?');"><i class="fa fa-trash" style="font-size: 23px;padding-top: 0px;margin: 0px;margin-top: 28px;"></i></a>
                    <a
                        class="card-link" href="?act=edit&id=<?php echo $row["id"]; ?>" style=""><i class="fa fa-pencil" style="font-size: 23px;"></i></a>
                </div>
            </div>
        </div>
        <?php  
        }
        ?>
    
    <?php endif; ?>
 	
 <?php endif; ?>
<!-- END -->

<!-- Edit -->
 <?php if ($_GET["act"] == "edit"): ?>
 	<?php
 	 $id = $_GET["id"];
     $data = $dataUser->tampil($_SESSION['user']);
 	 while ($row = mysqli_fetch_assoc($data)) {
 	 ?>
 	 <?php if ($id == $row["id"]): ?>
    <!-- UI -->
 	<div class="col d-inline-block" style="min-width: 379.995px;max-width: 379.995px;margin-top: 7px;margin-bottom: 4px;">
        <div class="card" style="height: 186px;margin: 0px;padding: 8px;opacity: 1;filter: blur(0px);width: 352px;">
            <div class="card-body" style="width: 337px; overflow: auto;"><form action="proses.php?act=edit&id=<?php echo $row["id"] ?>" method="post"><textarea class="border rounded-0 border-success" required="" autofocus="" autocomplete="off" style="width: 295px;height: 100px;margin-bottom: 10px;padding: 1px;background-color: rgb(48,48,48);color: rgb(255,255,255);max-width: 295px;" name="newtask"><?php echo $row["task"]; ?></textarea>
                <input type="hidden" name="oldtask" value="<?php echo $row["task"]; ?>">
                <input class="bg-light border rounded-0 border-success"type="date" name="tanggal" style="color: whitesmoke;" value="<?php echo $row["tanggal"]; ?>">
                <input class="bg-light border rounded-0 border-success" type="time" name="waktu" style="color: whitesmoke;" value="<?php echo $row["waktu"]; ?>">
                <button
                    class="btn btn-outline-success btn-block btn-sm text-center border rounded border-success ml-auto" type="submit" style="width: 30px;margin: 0px;height: 31px;" name="edit"><i class="fas fa-pen-square shadow-sm" style="font-size: 22px;margin: 0px;margin-left: -3px;"></i></button> </form>
            </div>
        </div>
    </div>
 	 <?php else: ?>
 	 <div class="col d-inline-block" style="min-width: 379.995px;max-width: 379.995px;margin-top: 7px;margin-bottom: 4px;">
        <div class="card" style="width: 356px;min-width: 356px;max-width: 356px;height: 186px;">
            <div class="card-body" style="height: 190px;">
                <p class="card-text"><?php echo $row["task"]; ?></p><p class="card-text"><?php echo $row["tanggal"]; ?></p>
                <a class="card-link" href="proses.php?act=hapus&id=<?php echo $row["id"]; ?>" style="font-size: 23px;color: rgb(231,76,60);margin: 0px;margin-top: 0px;padding: 0px;padding-top: 0px;padding-bottom: 0px;" onclick="alert ('Yakin?');"><i class="fa fa-trash" style="font-size: 23px;padding-top: 0px;margin: 0px;margin-top: 28px;"></i></a>
                <a
                    class="card-link" href="proses.php?act=edit&id=<?php echo $row["id"]; ?>"><i class="fa fa-pencil" style="font-size: 23px;"></i></a>
            </div>
        </div>
    </div>
 	 <?php endif ;?>

 	 <?php    
 	 }
 	 ?>
 <?php endif; ?>
<!-- END -->
 

