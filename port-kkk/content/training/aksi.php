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

		$sql="INSERT INTO training_usulan (nomor_usulan,tanggal_pelaksanaan,uid_sertifikat,uid_unit,uid_pegawai,id_status_usulan,created_at) VALUES ('$_POST[nomor_usulan]','$tgl','$_POST[uid_sertifikat]','$uid_unit','$uid_pegawai','$_POST[status]','$waktu_sekarang')RETURNING uid";
		$d=pg_fetch_array(pg_query($conn,$sql));

		for ($i=0; $i < count($_POST['uid_pegawai']); $i++) { 
			$pegawai=$_POST['uid_pegawai'][$i];
			$sql_pegawai="INSERT INTO training_usulan_pegawai (uid_usulan,uid_pegawai,keterangan,created_at) VALUES ('$d[uid]','$pegawai','$_POST[keterangan]','$waktu_sekarang')";
			pg_fetch_array(pg_query($conn,$sql_pegawai));
		}

		header("location: training");
	}

	elseif ($act=='edittraining'){
		include "edit_training_usulan.php";
	}

	elseif ($act=='updatetraining'){
		$tgl=date('Y-m-d',strtotime($_POST['tanggal_pelaksanaan']));
		$uid_unit=$_SESSION['uid_unit'];
		$uid_pegawai=$_SESSION['login_user'];

		$sql="UPDATE training_usulan SET nomor_usulan='$_POST[nomor_usulan]',tanggal_pelaksanaan='$tgl',uid_sertifikat='$_POST[uid_sertifikat]',id_status_usulan='$_POST[status]', updated_at='$waktu_sekarang'WHERE uid='$_POST[uid]'";
		
		pg_query($conn,$sql);
		if($x=pg_query($conn,"UPDATE  training_usulan_pegawai SET deleted_at='$waktu_sekarang' WHERE uid_usulan='$_POST[uid]'")){
			for ($i=0; $i < count($_POST['uid_pegawai']); $i++) { 
				$pegawai=$_POST['uid_pegawai'][$i];
				$sql_pegawai="INSERT INTO training_usulan_pegawai (uid_usulan,uid_pegawai,keterangan,created_at) VALUES ('$_POST[uid]','$pegawai','$_POST[keterangan]','$waktu_sekarang')";
				pg_fetch_array(pg_query($conn,$sql_pegawai));
			}
		}

		header("location: training");
	}

	elseif ($act=='deletetraining'){

		$sql="UPDATE  training_usulan SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[uid]'";
		
		$result=pg_query($conn,$sql);
		
		header("location: training");
	}

	elseif ($act=='tambahusulanpegawai'){
		include "tambah_usulan_pegawai.php";
	}

	elseif ($act=='inputusulanpegawai'){

		$sql="INSERT INTO training_usulan_pegawai (uid_usulan,uid_pegawai,keterangan, created_at) VALUES ('$_POST[uid_usulan]','$_POST[uid_pegawai]','$_POST[keterangan]','$waktu_sekarang')";
		$d=pg_fetch_array(pg_query($conn,$sql));
		header("location: training#tab-22");
	}

	elseif ($act=='editusulanpegawai'){
		include "edit_usulan_pegawai.php";
	}

	elseif ($act=='updateusulanpegawai'){

		$sql="UPDATE training_usulan_pegawai SET uid_usulan='$_POST[uid_usulan]',uid_pegawai='$_POST[uid_pegawai]',keterangan='$_POST[keterangan]', updated_at='$waktu_sekarang' WHERE uid='$_POST[uid]'";
		
		$result=pg_query($conn,$sql);
		
		header("location: training#tab-22");
	}

	elseif ($act=='deleteusulanpegawai'){

		$sql="UPDATE training_usulan_pegawai SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[uid]'";
		
		$result=pg_query($conn,$sql);
		
		header("location: training#tab-22");
	}

	elseif ($act=='entrysertifikat'){
		include "entry_sertifikat.php";
	}

	elseif ($act=='inputsertifikat'){

		$status_training="UPDATE training_usulan_pegawai SET selesai_training='selesai', updated_at='$waktu_sekarang' WHERE uid='$_POST[uid]'";
		
		$result=pg_query($conn,$status_training);

		$sql="INSERT INTO pegawai_sertifikat (uid_pegawai,uid_sertifikat,nomor,keterangan,created_at) VALUES ('$_POST[uid_pegawai]','$_POST[uid_sertifikat]','$_POST[nomor]','$_POST[keterangan]','$waktu_sekarang')";
		$d=pg_fetch_array(pg_query($conn,$sql));
		
		header("location: training#tab-22");
	}

	
	pg_close($conn);
}
?>