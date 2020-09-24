<?php
session_start();
// error_reporting(0);
if (empty($_SESSION['login_user'])){
	header('location:keluar');
}
else{
	include "../../../konfig/koneksi.php";
	include "../../../konfig/library.php";
	include "../../../konfig/fungsi_upload.php";

	$act=$_GET['act'];

	if ($act=='approved'){

		$uid=base64_decode($_GET['uid']);

		$sql="UPDATE training_usulan SET id_status_usulan='$_GET[status]' WHERE uid='$uid'";
		
		$result=pg_query($conn,$sql);
		header("location: approval-training");
	}
	elseif ($act=='uploadberkas'){
		include 'tambah.php';
	}
	elseif ($act=='aksiuploadberkas'){
		$berkas=upload_file('berkas','../../../document/');

		$sql="UPDATE training_usulan SET id_status_usulan='13',berkas='$berkas' WHERE uid='$_POST[uid]'";
		
		$result=pg_query($conn,$sql);
		header("location: approval-training");
	}
	pg_close($conn);
}
?>