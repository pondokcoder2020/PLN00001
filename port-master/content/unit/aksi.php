<?php
session_start();
//error_reporting(0);
if (empty($_SESSION['login_user'])){
	header('location:keluar');
}
else{
	include "../../../konfig/koneksi.php";
    include "../../../konfig/library.php";

	$act=$_GET['act'];
    
    if ($act=='update'){
        
		$sql="UPDATE master_unit SET nama='$_POST[nama]', no_telepon='$_POST[no_telepon]', alamat='$_POST[alamat]' WHERE uid='$_SESSION[uid_unit]'";
		$result=pg_query($conn,$sql);


		header("location: unit");
    }
    
	pg_close($conn);
}
?>