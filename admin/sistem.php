<?php
	include '../function.php';
    $dataUser = new user();
?>

 <?php if (!isset($_GET['act'])): ?>
 	<?php header("Location: ?act=user") ;
    ?>
 <?php endif; ?>

<!-- PAGE USER -->
<?php 
	if ($_GET['act'] == "user"): 
	$data = $dataUser->tampil("user");

	// pencarian
	if (isset($_POST["pencarian"])) {
		$data = $dataUser->pencarianAdmin($_POST['cari']);
	}
?>
	
	<div class="container hero">
        <h2 class="text-center" style="color: rgb(255,255,255);">Data user</h2>
        <div class="table-responsive" style="color: rgb(255,255,255);">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 72px;">No.</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th style="width: 233px;">Option</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $i = 1;
                while ($row = mysqli_fetch_assoc($data)) { ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["user"] ?></td>
                        <td><?php echo $row["pass"] ?></td>
                        <td><a class="text-danger" href="../proses.php?act=hapusUser&id=<?php echo $row["id"]; ?>&user=<?php echo $row["user"]; ?>" onclick="return confirm('Yakin Ingin menghapus <?php echo $row["user"]; ?>');">Delete&nbsp;<i class="fa fa-ban" style="font-size: 19px;"></i></a><a href="?act=editUser&id=<?php echo $row["id"]; ?>&user=<?php echo $row["user"]; ?>" style="margin-left: 24px;color: rgb(29,210,91);">Edit&nbsp;<i class="fa fa-pencil" style="font-size: 19px;color: rgb(45,211,31);"></i></a></td>
                    </tr>
                    <?php $i++; ?>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>
<!-- END -->


<!-- EDIT -->
<?php 
if ($_GET['act'] == "editUser"): 
$id = $_GET['id'];
$oldUser = $_GET['user'];
$data = $dataUser->tampilEditAdmin($id);

while ($row = mysqli_fetch_assoc($data)) {
?>
	<div class="container rounded-0 shadow-none hero" style="margin-top: 68px;">
    <form class="m-auto" style="width: 532px;background-color: rgba(39,41,47,0.61);height: 247px;" action="../proses.php?act=editAdmin" method="post">
        <h2 class="text-center" style="color: rgb(255,255,255);">Data user</h2><input class="form-control" type="text" name="username" placeholder="New Username" style="width: 385px;margin-top: 27px;margin-bottom: 21px;margin-left: 74px;background-color: transparent;color: rgb(255,255,255);font-size: 16px;" value="<?php echo $row["user"]; ?>" 
        /><input class="form-control" type="password" name="password" placeholder="New Password" style="width: 385px;margin-top: 27px;margin-bottom: 21px;margin-left: 74px;background-color: transparent;color: rgb(255,255,255);font-size: 16px;"  />
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
        <input type="hidden" name="olduser" value="<?php echo $row["user"]; ?>">
        <button class="btn btn-primary"
            type="submit" name="editUser" style="margin-left: 383px;background-color: rgb(39,104,173);"><i class="fa fa-edit"></i></button></form>
</div>
<?php } ?>
<?php endif; ?>
<!-- END -->
