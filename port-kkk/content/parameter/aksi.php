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
		$sql="INSERT INTO master_aset_subkategori_parameter (nama,id_kategori,id_subkategori) VALUES ('$_POST[nama]','$_POST[id_kategori]','$_POST[id_subkategori]')";
		$d=pg_fetch_array(pg_query($conn,$sql));

		header("location: parameter-".$_POST['id_subkategori']);
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){
		$sql="UPDATE master_aset_subkategori_parameter SET nama='$_POST[nama]' WHERE id='$_POST[id]'";
		
		$result=pg_query($conn,$sql);
		// print_r($sql);die();
		header("location: parameter-".$_POST['id_subkategori']);
	}
	
	elseif($act=='delete'){
		// print_r($_GET);die();
		$sql="DELETE FROM master_aset_subkategori_parameter WHERE id='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: parameter-".$_GET['id_subkategori']);
	}
	pg_close($conn);
}
?>