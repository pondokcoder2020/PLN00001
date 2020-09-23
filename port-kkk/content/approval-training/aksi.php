<?php
session_start();
// error_reporting(0);
if (empty($_SESSION['login_user'])){
	header('location:keluar');
}
else{
	include "../../../konfig/koneksi.php";
	include "../../../konfig/library.php";

	$act=$_GET['act'];

	if ($act=='approved'){

		$uid=base64_decode($_GET['uid']);

		$sql="UPDATE training_usulan SET id_status_usulan='$_GET[status]' WHERE uid='$uid'";
		
		$result=pg_query($conn,$sql);
		header("location: approval-training");
	}
	pg_close($conn);
}
?>