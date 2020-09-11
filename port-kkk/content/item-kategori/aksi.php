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
		$sql="INSERT INTO master_item_kategori (nama,klasifikasi,keterangan,created_at) VALUES ('$_POST[nama]','$_POST[klasifikasi]','$_POST[keterangan]','$waktu_sekarang')RETURNING uid";
		$d=pg_fetch_array(pg_query($conn,$sql));

		header("location: item-kategori");
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){
		$sql="UPDATE master_item_kategori SET nama='$_POST[nama]',klasifikasi='$_POST[klasifikasi]',keterangan='$_POST[keterangan]', updated_at='$waktu_sekarang' WHERE uid='$_POST[id]'";
		
		$result=pg_query($conn,$sql);
		// print_r($sql);die();
		header("location: item-kategori");
	}
	
	elseif($act=='delete'){
		$sql="UPDATE master_item_kategori SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: item-kategori");
	}
	pg_close($conn);
}
?>