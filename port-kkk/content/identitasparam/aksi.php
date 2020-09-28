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

		$sql="INSERT INTO aset (uid_unit,nama_perusahaan,kode,nama_lokasi,id_kapasitas,jumlah,satuan,id_subkategori,id_varian,created_at,nomor) VALUES ('$rx[uid_unit]','$_POST[nama]','$_POST[kode]','$_POST[merk]','$_POST[kapasitas]','$_POST[jumlah]','$_POST[satuan]','$_POST[id_subkategori]','$_POST[id_varian]','$waktu_sekarang','$_POST[nomor]')";
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

		$sql="UPDATE aset SET nama_perusahaan='$_POST[nama_perusahaan]',nama_lokasi='$_POST[nama_lokasi]',id_kapasitas='$_POST[id_kapasitas]',jumlah='$_POST[jumlah]',satuan='$_POST[satuan]',id_varian='$_POST[id_varian]',kode='$_POST[kode]', updated_at='$waktu_sekarang',nomor='$_POST[nomor]' WHERE uid='$_POST[uid]'";
		
		$result=pg_query($conn,$sql);

		print_r($sql);die();

		// header("location: view-identitasparam-".$_POST['id_subkategori']);
	}

	elseif ($act=='updateparameter'){
		$sql="UPDATE master_aset_subkategori_parameter SET nama='$_POST[nama]' WHERE id='$_POST[id]'";
		
		$result=pg_query($conn,$sql);
		// print_r($sql);die();
		header("location: view-identitasparam-".$_POST['id_subkategori']."#tab-22");
	}
	
	elseif($act=='deleteidentitas'){
		$q=pg_query($conn,"SELECT * FROM aset  WHERE uid='$_GET[id]'");
		$r=pg_fetch_array($q);

		$sql="UPDATE  aset SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: view-identitasparam-".$r['id_subkategori']);
	}

	elseif($act=='deleteparameter'){
		$q=pg_query($conn,"SELECT * FROM master_aset_subkategori_parameter WHERE id='$_GET[id]'");
		$r=pg_fetch_array($q);

		$sql="UPDATE  master_aset_subkategori_parameter  SET deleted_at='$waktu_sekarang' WHERE id='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: view-identitasparam-".$r['id_subkategori']."#tab-22");
	}

	elseif ($act=="tambahvarian"){
		include "tambah_varian.php";
	}

	elseif ($act=="editvarian"){
		include "edit_varian.php";
	}

	elseif($act=='inputvarian'){
		$sql="INSERT INTO master_aset_subkategori_varian (nama,keterangan,id_subkategori,created_at) VALUES ('$_POST[nama]','$_POST[keterangan]','$_POST[id_subkategori]','$waktu_sekarang')";
		$d=pg_fetch_array(pg_query($conn,$sql));

		header("location: view-identitasparam-".$_POST['id_subkategori'].'#tab-23');
	}

	elseif($act=='updatevarian'){
		$sql="UPDATE master_aset_subkategori_varian SET nama='$_POST[nama]',keterangan='$_POST[keterangan]' WHERE id='$_POST[id]'";
		
		$result=pg_query($conn,$sql);
		// print_r($sql);die();
		header("location: view-identitasparam-".$_POST['id_subkategori']."#tab-23");
	}

	elseif($act=='deletevarian'){
		$q=pg_query($conn,"SELECT * FROM master_aset_subkategori_varian WHERE id='$_GET[id]'");
		$r=pg_fetch_array($q);

		$sql="DELETE FROM master_aset_subkategori_varian WHERE id='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: view-identitasparam-".$r['id_subkategori']."#tab-23");
	}

	elseif ($act=="tambahkapasitas"){
		include "tambah_kapasitas.php";
	}

	elseif ($act=="editkapasitas"){
		include "edit_kapasitas.php";
	}

	elseif($act=='inputkapasitas'){
		$sql="INSERT INTO kapasitas (nama,keterangan,id_subkategori) VALUES ('$_POST[nama]','$_POST[keterangan]','$_POST[id_subkategori]')";
		$d=pg_fetch_array(pg_query($conn,$sql));

		header("location: view-identitasparam-".$_POST['id_subkategori'].'#tab-24');
	}

	elseif($act=='updatekapasitas'){
		$sql="UPDATE kapasitas SET nama='$_POST[nama]',keterangan='$_POST[keterangan]' WHERE id='$_POST[id]'";
		
		$result=pg_query($conn,$sql);
		// print_r($sql);die();
		header("location: view-identitasparam-".$_POST['id_subkategori']."#tab-24");
	}

	elseif($act=='deletekapasitas'){
		$q=pg_query($conn,"SELECT * FROM kapasitas WHERE id='$_GET[id]'");
		$r=pg_fetch_array($q);

		$sql="DELETE FROM kapasitas WHERE id='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: view-identitasparam-".$r['id_subkategori']."#tab-24");
	}

	
	pg_close($conn);
}
?>