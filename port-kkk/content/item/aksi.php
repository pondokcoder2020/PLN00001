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
		$sql="INSERT INTO master_item (nama,satuan,created_at) VALUES ('$_POST[nama]','$_POST[satuan]','$waktu_sekarang')RETURNING uid";
		$d=pg_fetch_array(pg_query($conn,$sql));

		header("location: item");
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){
		$sql="UPDATE master_item SET nama='$_POST[nama]', satuan='$_POST[satuan]', updated_at='$waktu_sekarang' WHERE uid='$_POST[id]'";
		
		$result=pg_query($conn,$sql);
		// print_r($sql);die();
		header("location: item");
	}
	
	elseif($act=='delete'){
		$sql="UPDATE master_item SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: item");
	}
	pg_close($conn);
}
?>