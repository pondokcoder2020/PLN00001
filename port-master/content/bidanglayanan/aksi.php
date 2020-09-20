<?php
session_start();
//error_reporting(0);
if (empty($_SESSION['login_user'])){
	header('location:keluar');
}
else{
	include "../../../konfig/koneksi.php";
	include "../../../konfig/library.php";
	include "../../../konfig/fungsi_tanggal.php";

	$act=$_GET['act'];
	if ($act=='tambah'){
		include "tambah.php";
	}
	
	elseif($act=='input'){
		$sql="INSERT INTO master_bidang (nama, created_at, id_level) VALUES ('$_POST[nama]',  '$waktu_sekarang', '3') RETURNING uid";
		$d=pg_fetch_array(pg_query($conn,$sql));
		
		header("location: bidanglayanan");
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){
		$sql="UPDATE master_bidang SET nama='$_POST[nama]', updated_at='$waktu_sekarang' WHERE uid='$_POST[uid]'";
		$result=pg_query($conn,$sql);

		header("location: bidanglayanan");
	}
	
	elseif($act=='delete'){
		$sql="UPDATE master_bidang SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[id]'";
		$result=pg_query($conn,$sql);

		
		header("location: bidanglayanan");
	}
	pg_close($conn);
}
?>