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
	include "../../../konfig/fungsi_thumb.php";
	include "../../../konfig/myencrypt.php";


	$act=$_GET['act'];
	if ($act=='tambah'){
		include "tambah.php";
	}
	
	elseif($act=='input'){
		$sql="INSERT INTO master_sertifikat (nama,tanggal_awal,tanggal_akhir,keterangan,created_at) VALUES ('$_POST[nama]','$_POST[tanggal_awal]','$_POST[tanggal_akhir]','$_POST[keterangan]','$waktu_sekarang')";
		$d=pg_fetch_array(pg_query($conn,$sql));

		header("location: sertifikat");
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){
		$sql="UPDATE master_sertifikat SET nama='$_POST[nama]',tanggal_awal='$_POST[tanggal_awal]',tanggal_akhir='$_POST[tanggal_akhir]',keterangan='$_POST[keterangan]' WHERE uid_sertifikat='$_POST[uid]'";
		$result=pg_query($conn,$sql);
		header("location: sertifikat");
	}
	
	elseif($act=='delete'){
		$sql="UPDATE master_sertifikat SET deleted_at='$waktu_sekarang' WHERE uid_sertifikat='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: sertifikat");
	}
	pg_close($conn);
}
?>