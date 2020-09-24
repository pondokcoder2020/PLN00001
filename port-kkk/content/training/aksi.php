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
	if ($act=='tambahtraining'){
		include "tambah_training_usulan.php";
	}

	elseif ($act=='inputtraining'){
		$tgl=date('Y-m-d',strtotime($_POST['tanggal_pelaksanaan']));
		$uid_unit=$_SESSION['uid_unit'];
		$uid_pegawai=$_SESSION['login_user'];

		$sql="INSERT INTO training_usulan (nomor_usulan,tanggal_pelaksanaan,uid_sertifikat,uid_unit,uid_pegawai,id_status_usulan) VALUES ('$_POST[nomor_usulan]','$tgl','$_POST[uid_sertifikat]','$uid_unit','$uid_pegawai','$_POST[status]') RETURNING uid";
		$d=pg_fetch_array(pg_query($conn,$sql));

		for ($i=0; $i < count($_POST['uid_pegawai']); $i++) { 
			$pegawai=$_POST['uid_pegawai'][$i];
			$sql_pegawai="INSERT INTO training_usulan_pegawai (uid_usulan,uid_pegawai,keterangan) VALUES ('$d[uid]','$pegawai','$_POST[keterangan]')";
			pg_fetch_array(pg_query($conn,$sql_pegawai));
		}

		header("location: training");
	}

	elseif ($act=='edittraining'){
		include "edit_training_usulan.php";
	}

	elseif ($act=='updatetraining'){
		$tgl=date('Y-m-d',strtotime($_POST['tanggal_pelaksanaan']));
		$berkas_baru =upload_file('berkas','../../../document/');
		$berkas = $berkas_baru == "" ? $_POST['berkas_lama'] : $berkas_baru;

		$sql="UPDATE training_usulan SET nomor_usulan='$_POST[nomor_usulan]',tanggal_pelaksanaan='$_POST[tanggal_pelaksanaan]',uid_sertifikat='$_POST[uid_sertifikat]',id_status_usulan='$_POST[status]',berkas='$berkas' WHERE uid='$_POST[uid]'";
		
		$result=pg_query($conn,$sql);

		header("location: training");
	}

	elseif ($act=='deletetraining'){

		$sql="DELETE FROM training_usulan WHERE uid='$_GET[uid]'";
		
		$result=pg_query($conn,$sql);
		
		header("location: training");
	}

	elseif ($act=='tambahusulanpegawai'){
		include "tambah_usulan_pegawai.php";
	}

	elseif ($act=='inputusulanpegawai'){

		$sql="INSERT INTO training_usulan_pegawai (uid_usulan,uid_pegawai,keterangan) VALUES ('$_POST[uid_usulan]','$_POST[uid_pegawai]','$_POST[keterangan]')";
		$d=pg_fetch_array(pg_query($conn,$sql));
		header("location: training#tab-22");
	}

	elseif ($act=='editusulanpegawai'){
		include "edit_usulan_pegawai.php";
	}

	elseif ($act=='updateusulanpegawai'){

		$sql="UPDATE training_usulan_pegawai SET uid_usulan='$_POST[uid_usulan]',uid_pegawai='$_POST[uid_pegawai]',keterangan='$_POST[keterangan]' WHERE uid='$_POST[uid]'";
		
		$result=pg_query($conn,$sql);
		
		header("location: training#tab-22");
	}

	elseif ($act=='deleteusulanpegawai'){

		$sql="DELETE FROM training_usulan_pegawai WHERE uid='$_GET[uid]'";
		
		$result=pg_query($conn,$sql);
		
		header("location: training#tab-22");
	}

	elseif ($act=='entrysertifikat'){
		include "entry_sertifikat.php";
	}

	elseif ($act=='inputsertifikat'){

		$status_training="UPDATE training_usulan_pegawai SET selesai_training='selesai' WHERE uid='$_POST[uid]'";
		
		$result=pg_query($conn,$status_training);

		$sql="INSERT INTO pegawai_sertifikat (uid_pegawai,uid_sertifikat,nomor,keterangan) VALUES ('$_POST[uid_pegawai]','$_POST[uid_sertifikat]','$_POST[nomor]','$_POST[keterangan]')";
		$d=pg_fetch_array(pg_query($conn,$sql));
		
		header("location: training#tab-22");
	}

	
	pg_close($conn);
}
?>