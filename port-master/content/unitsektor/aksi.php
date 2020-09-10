<?php
session_start();
error_reporting(0);
if (empty($_SESSION['login_user'])){
	header('location:keluar');
}
else{
	include "../../../konfig/koneksi.php";
	include "../../../konfig/library.php";

	$act=$_GET['act'];
	if ($act=='tambah'){
		include "tambah.php";
	}
	
	elseif($act=='input'){
		$sql="INSERT INTO master_unit (kode, nama, no_telepon, alamat, uid_parent, created_at, id_level) VALUES ('$_POST[kode]', '$_POST[nama]', '$_POST[no_telepon]', '$_POST[alamat]', '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '$waktu_sekarang', '2') RETURNING uid";
		$d=pg_fetch_array(pg_query($conn,$sql));

		header("location: unitsektor");
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){
		$sql="UPDATE master_unit SET kode='$_POST[kode]', nama='$_POST[nama]', no_telepon='$_POST[no_telepon]', alamat='$_POST[alamat]', updated_at='$waktu_sekarang' WHERE uid='$_POST[id]'";
		$result=pg_query($conn,$sql);

		header("location: unitsektor");
	}
	
	elseif($act=='delete'){
		$sql="UPDATE master_unit SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: unitsektor");
	}
	pg_close($conn);
}
?>