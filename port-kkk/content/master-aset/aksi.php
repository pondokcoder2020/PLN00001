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
		$tgl=date('Y-m-d',strtotime($_POST['tanggal_beli']));
		$sql="INSERT INTO master_asset (kategori,varian,uid_item,kode_aset,serial_number,tanggal_beli,uid_unit,lokasi_penempatan,created_at) VALUES ('$_POST[kategori]','$_POST[varian]','$_POST[uid_item]','$_POST[kode_aset]','$_POST[serial_number]','$tgl','$_POST[uid_unit]','$_POST[lokasi_penempatan]','$waktu_sekarang')RETURNING uid";
		$d=pg_fetch_array(pg_query($conn,$sql));

		// print_r($_POST);

		header("location: master-aset");
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){

		$tgl=date('Y-m-d',strtotime($_POST['tanggal_beli']));

		$sql="UPDATE master_asset SET kategori='$_POST[kategori]',varian='$_POST[varian]',uid_item='$_POST[uid_item]',kode_aset='$_POST[kode_aset]',serial_number='$_POST[serial_number]',tanggal_beli='$tgl',uid_unit='$_POST[uid_unit]',lokasi_penempatan='$_POST[lokasi_penempatan]', updated_at='$waktu_sekarang' WHERE uid='$_POST[id]'";
		
		$result=pg_query($conn,$sql);
		header("location: master-aset");
	}
	
	elseif($act=='delete'){
		$sql="UPDATE master_asset SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: master-aset");
	}
	pg_close($conn);
}
?>