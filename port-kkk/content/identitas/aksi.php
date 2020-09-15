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
		$sql="INSERT INTO master_aset_subkategori_identitas (unit,nama,merk,kapasitas,jumlah,satuan,keterangan,id_subkategori) VALUES ('$_POST[unit]','$_POST[nama]','$_POST[merk]','$_POST[kapasitas]','$_POST[jumlah]','$_POST[satuan]','$_POST[keterangan]','$_POST[id_subkategori]')";
		$d=pg_fetch_array(pg_query($conn,$sql));

		header("location: identitas-".$_POST['id_subkategori']);
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){
		$sql="UPDATE master_aset_subkategori_identitas SET unit='$_POST[unit]',nama='$_POST[nama]',merk='$_POST[merk]',kapasitas='$_POST[kapasitas]',jumlah='$_POST[jumlah]',satuan='$_POST[satuan]',keterangan='$_POST[keterangan]' WHERE id='$_POST[id]'";
		
		$result=pg_query($conn,$sql);
		header("location: identitas-".$_POST['id_subkategori']);
	}
	
	elseif($act=='delete'){
		$sql="DELETE FROM master_aset_subkategori_identitas WHERE id='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: identitas-".$_GET['id_subkategori']);
	}
	pg_close($conn);
}
?>