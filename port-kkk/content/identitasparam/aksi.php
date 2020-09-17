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

	$login= pg_query($conn,"SELECT * FROM master_pegawai WHERE uid='$_SESSION[login_user]'");

	$rx= pg_fetch_array($login);

	$act=$_GET['act'];
	if ($act=='tambahidentitas'){
		include "tambah_identitas.php";
	}

	elseif ($act=='tambahparameter'){
		include "tambah_parameter.php";
	}

	elseif($act=='inputparameter'){

		$sql="INSERT INTO master_aset_subkategori_parameter (nama,id_kategori,id_subkategori) VALUES ('$_POST[nama]','$rx[id_kategori]','$_POST[id_subkategori]')";
		$d=pg_fetch_array(pg_query($conn,$sql));

		header("location: view-identitasparam-".$_POST['id_subkategori']."#tab-22");
	}
	
	elseif($act=='inputidentitas'){
		$tgl=date('Y-m-d',strtotime($_POST['tanggal_beli']));
		$sql="INSERT INTO master_aset_subkategori_identitas (unit,nama,merk,kapasitas,jumlah,satuan,keterangan,id_subkategori,tanggal_beli,lokasi_penempatan,jenis) VALUES ('$rx[uid_unit]','$_POST[nama]','$_POST[merk]','$_POST[kapasitas]','$_POST[jumlah]','$_POST[satuan]','$_POST[keterangan]','$_POST[id_subkategori]','$tgl','$_POST[lokasi_penempatan]','$_POST[jenis]')";
		$d=pg_fetch_array(pg_query($conn,$sql));

		header("location: view-identitasparam-".$_POST['id_subkategori']);
	}
	
	elseif($act=='editidentitas'){
		include "edit_identitas.php";
	}

	elseif($act=='editparameter'){
		include "edit_parameter.php";
	}
	
	elseif ($act=='updateidentitas'){

		$tgl=date('Y-m-d',strtotime($_POST['tanggal_beli']));
		$sql="UPDATE master_aset_subkategori_identitas SET nama='$_POST[nama]',merk='$_POST[merk]',kapasitas='$_POST[kapasitas]',jumlah='$_POST[jumlah]',satuan='$_POST[satuan]',keterangan='$_POST[keterangan]',tanggal_beli='$tgl',lokasi_penempatan='$_POST[lokasi_penempatan]',jenis='$_POST[jenis]' WHERE id='$_POST[id]'";
		
		$result=pg_query($conn,$sql);

		// print_r($sql);die();

		header("location: view-identitasparam-".$_POST['id_subkategori']);
	}

	elseif ($act=='updateparameter'){
		$sql="UPDATE master_aset_subkategori_parameter SET nama='$_POST[nama]' WHERE id='$_POST[id]'";
		
		$result=pg_query($conn,$sql);
		// print_r($sql);die();
		header("location: view-identitasparam-".$_POST['id_subkategori']."#tab-22");
	}
	
	elseif($act=='deleteidentitas'){
		$q=pg_query($conn,"SELECT * FROM master_aset_subkategori_identitas WHERE id='$_GET[id]'");
		$r=pg_fetch_array($q);

		$sql="DELETE FROM master_aset_subkategori_identitas WHERE id='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: view-identitasparam-".$r['id_subkategori']);
	}

	elseif($act=='deleteparameter'){
		$q=pg_query($conn,"SELECT * FROM master_aset_subkategori_parameter WHERE id='$_GET[id]'");
		$r=pg_fetch_array($q);

		$sql="DELETE FROM master_aset_subkategori_parameter WHERE id='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: view-identitasparam-".$r['id_subkategori']."#tab-22");
	}

	
	pg_close($conn);
}
?>