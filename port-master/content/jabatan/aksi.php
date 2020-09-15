<?php
session_start();
//error_reporting(0);
if (empty($_SESSION['login_user'])){
	header('location:keluar');
}
else{
	include "../../../konfig/koneksi.php";
	include "../../../konfig/library.php";
	include "../../../konfig/fungsi_tanggal.php";

	$act=$_GET['act'];
	if ($act=='tambah'){
		include "tambah.php";
	}
	
	elseif($act=='input'){
		if($_POST['uid_atasan']==''){
			$sql="INSERT INTO master_pegawai_jabatan(nama, created_at, uid_unit) VALUES ('$_POST[nama]',  '$waktu_sekarang', '$_SESSION[uid_unit]') RETURNING uid";
		}
		else{
			$sql="INSERT INTO master_pegawai_jabatan(nama, uid_parent, created_at, uid_unit) VALUES ('$_POST[nama]', '$_POST[uid_atasan]', '$waktu_sekarang', '$_SESSION[uid_unit]') RETURNING uid";
		}
		$d=pg_fetch_array(pg_query($conn,$sql));
		
		header("location: jabatan");
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){
		if($_POST['uid_atasan']==''){
			$sql="UPDATE master_pegawai_jabatan SET nama='$_POST[nama]', updated_at='$waktu_sekarang' WHERE uid='$_POST[uid]'";
		}
		else{
			$sql="UPDATE master_pegawai_jabatan SET nama='$_POST[nama]', updated_at='$waktu_sekarang', uid_parent='$_POST[uid_atasan]' WHERE uid='$_POST[uid]'";
		}
		$result=pg_query($conn,$sql);

		header("location: jabatan");
	}
	
	elseif($act=='delete'){
		$sql="UPDATE master_pegawai_jabatan SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[id]'";
		$result=pg_query($conn,$sql);

		
		header("location: jabatan");
	}
	pg_close($conn);
}
?>