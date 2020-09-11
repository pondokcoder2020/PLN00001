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
	if ($act=='tambah'){
		include "tambah.php";
	}
	
	elseif($act=='input'){
		$sql="INSERT INTO master_lokasi_penempatan (nama,created_at) VALUES ('$_POST[nama]','$waktu_sekarang')RETURNING uid";
		$d=pg_fetch_array(pg_query($conn,$sql));

		header("location: lokasi-penempatan");
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){
		$sql="UPDATE master_lokasi_penempatan SET nama='$_POST[nama]', updated_at='$waktu_sekarang' WHERE uid='$_POST[id]'";
		
		$result=pg_query($conn,$sql);
		// print_r($sql);die();
		header("location: lokasi-penempatan");
	}
	
	elseif($act=='delete'){
		$sql="UPDATE master_lokasi_penempatan SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: lokasi-penempatan");
	}
	pg_close($conn);
}
?>