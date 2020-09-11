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
		$sql="INSERT INTO master_kategori_personil (nama,keterangan,created_at) VALUES ('$_POST[nama]','$_POST[keterangan]','$waktu_sekarang')RETURNING uid";
		$d=pg_fetch_array(pg_query($conn,$sql));

		header("location: kategori-personil");
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){
		$sql="UPDATE master_kategori_personil SET nama='$_POST[nama]', keterangan='$_POST[keterangan]', updated_at='$waktu_sekarang' WHERE uid='$_POST[id]'";
		
		$result=pg_query($conn,$sql);
		// print_r($sql);die();
		header("location: kategori-personil");
	}
	
	elseif($act=='delete'){
		$sql="UPDATE master_kategori_personil SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: kategori-personil");
	}
	pg_close($conn);
}
?>