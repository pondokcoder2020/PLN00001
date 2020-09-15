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
	include "../../../konfig/fungsi_thumb.php";
	include "../../../konfig/myencrypt.php";


	$act=$_GET['act'];
	if ($act=='tambah'){
		include "tambah.php";
	}
	
	elseif($act=='input'){
		$acak			 = rand(1,99);
		$lokasi_file     = $_FILES['fupload']['tmp_name'];
		$tipe_file       = $_FILES['fupload']['type'];
		$nama_file       = $_FILES['fupload']['name'];
		$nama_file_unik  = $acak.$nama_file;
		
		if ($_FILES["fupload"]["error"] > 0 OR empty($lokasi_file)){
			$nama_file_unik = "";
		}
	  
		else{
			UploadPegawai($nama_file_unik);
		}
		
		$password=encrypt($_POST['password']);

		if($_POST['uid_bidang']==''){
			$sql="INSERT INTO master_pegawai(nip, nama, foto, created_at, uid_unit, password, uid_jabatan, id_kategori) VALUES ('$_POST[nip]', '$_POST[nama]',  '$nama_file_unik', '$waktu_sekarang', '$_SESSION[uid_unit]', '$password', '$_POST[uid_jabatan]', '$_POST[id_kategori]') RETURNING uid";
		}
		else{
			$sql="INSERT INTO master_pegawai(nip, nama, foto, created_at, uid_unit, password, uid_jabatan, uid_bidang, id_kategori) VALUES ('$_POST[nip]', '$_POST[nama]',  '$nama_file_unik', '$waktu_sekarang', '$_SESSION[uid_unit]', '$password', '$_POST[uid_jabatan]', '$_POST[uid_bidang]', '$_POST[id_kategori]') RETURNING uid";
		}
		$d=pg_fetch_array(pg_query($conn,$sql));

		//pg_query($conn,"INSERT INTO log_aktivitas (waktu, uid_pegawai, id_modul, aksi, id_data) VALUES ('$waktu_sekarang', '$_SESSION[login_user]', '2', 'C', '$d[uid]')");

		header("location: pegawai");
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){
		$acak			 = rand(1,99);
		$lokasi_file     = $_FILES['fupload']['tmp_name'];
		$tipe_file       = $_FILES['fupload']['type'];
		$nama_file       = $_FILES['fupload']['name'];
		$nama_file_unik  = $acak.$nama_file;
		
		if ($_FILES["fupload"]["error"] > 0 OR empty($lokasi_file)){
			$nama_file_unik = "$_POST[foto]";
		}
	  
		else{
			UploadPegawai($nama_file_unik);
			unlink("../../../images/pegawai/upload_$_POST[foto]");
		}
		
		$password=encrypt($_POST['password']);

		if($_POST['uid_bidang']==''){
			$sql="UPDATE master_pegawai SET nip='$_POST[nip]', nama='$_POST[nama]', foto='$nama_file_unik', updated_at='$waktu_sekarang', uid_jabatan='$_POST[uid_jabatan]', id_kategori='$_POST[id_kategori]'  WHERE uid='$_POST[uid]'";
		}
		else{
			$sql="UPDATE master_pegawai SET nip='$_POST[nip]', nama='$_POST[nama]', foto='$nama_file_unik', updated_at='$waktu_sekarang', uid_jabatan='$_POST[uid_jabatan]', uid_bidang='$_POST[uid_bidang]', id_kategori='$_POST[id_kategori]'  WHERE uid='$_POST[uid]'";
		}
		$result=pg_query($conn,$sql);

		//pg_query($conn,"INSERT INTO log_aktivitas (waktu, uid_pegawai, id_modul, aksi, id_data) VALUES ('$waktu_sekarang', '$_SESSION[login_user]', '2', 'U', '$_POST[uid]')");
		header("location: pegawai");
	}
	
	elseif($act=='delete'){
		$sql="UPDATE master_pegawai SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[id]'";
		$result=pg_query($conn,$sql);

		//pg_query($conn,"INSERT INTO log_aktivitas (waktu, uid_pegawai, id_modul, aksi, id_data) VALUES ('$waktu_sekarang', '$_SESSION[login_user]', '2', 'D', '$_GET[uid]')");

		header("location: pegawai");
	}
	pg_close($conn);
}
?>