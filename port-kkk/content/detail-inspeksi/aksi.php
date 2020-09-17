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
	include "../../../konfig/myencrypt.php";

	$act=$_GET['act'];
	if ($act=='tambah'){
		include "tambah.php";
	}
	
	elseif($act=='input'){

		$sql="INSERT INTO master_aset_subkategori (nama,id_kategori) VALUES ('$_POST[nama]','$_POST[id_kategori]')";
		$d=pg_fetch_array(pg_query($conn,$sql));
		header("location: detail-inspeksi-".$_POST['id_kategori']);
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){
		$sql="UPDATE master_aset_subkategori SET nama='$_POST[nama]' WHERE id='$_POST[id_kategori]'";
		
		$result=pg_query($conn,$sql);
		header("location: detail-inspeksi-".$_POST['id_kategori']);
	}
	
	elseif($act=='delete'){
		$sql="DELETE FROM master_aset_subkategori WHERE id='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: detail-inspeksi-".$_GET['id_kategori']);
	}
	pg_close($conn);
}
?>