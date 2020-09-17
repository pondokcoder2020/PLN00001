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
		$sql="INSERT INTO master_aset_kategori (nama) VALUES ('$_POST[nama]')";
			$d=pg_fetch_array(pg_query($conn,$sql));

		header("location: master-inspeksi-peralatan");
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){

		$sql="UPDATE master_aset_kategori SET nama='$_POST[nama]' WHERE id='$_POST[id]'";
		
		$result=pg_query($conn,$sql);

		header("location: master-inspeksi-peralatan");
	}
	
	elseif($act=='delete'){
		$sql="DELETE FROM master_aset_kategori WHERE id='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: master-inspeksi-peralatan");
	}
	pg_close($conn);
}
?>