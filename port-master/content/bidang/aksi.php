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
		$sql="INSERT INTO master_pegawai_bidang (nama, created_at, uid_unit) VALUES ('$_POST[nama]',  '$waktu_sekarang', '$_SESSION[uid_unit]') RETURNING uid";
		$d=pg_fetch_array(pg_query($conn,$sql));
		
		header("location: bidang");
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){
		$sql="UPDATE master_pegawai_bidang SET nama='$_POST[nama]', updated_at='$waktu_sekarang' WHERE uid='$_POST[uid]'";
		$result=pg_query($conn,$sql);

		header("location: bidang");
	}
	
	elseif($act=='delete'){
		$sql="UPDATE master_pegawai_bidang SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[id]'";
		$result=pg_query($conn,$sql);

		
		header("location: bidang");
	}
	pg_close($conn);
}
?>