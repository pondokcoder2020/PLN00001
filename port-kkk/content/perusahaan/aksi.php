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
		$sql="INSERT INTO master_perusahaan (nama_perusahaan,jenis_perusahaan,keterangan,create_at) VALUES ('$_POST[nama_perusahaan]', '$_POST[jenis_perusahaan]', '$_POST[keterangan]','$waktu_sekarang')RETURNING uid";
		$d=pg_fetch_array(pg_query($conn,$sql));

		header("location: perusahaan");
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){
		$sql="UPDATE master_perusahaan SET nama_perusahaan='$_POST[nama_perusahaan]', jenis_perusahaan='$_POST[jenis_perusahaan]', keterangan='$_POST[keterangan]', updated_at='$waktu_sekarang' WHERE uid='$_POST[id]'";
		
		$result=pg_query($conn,$sql);
		// print_r($sql);die();
		header("location: perusahaan");
	}
	
	elseif($act=='delete'){
		$sql="UPDATE master_perusahaan SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: perusahaan");
	}
	pg_close($conn);
}
?>