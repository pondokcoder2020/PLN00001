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

		$foto=crop_image('../../../images/pegawai/');
		$password=encrypt('12345');//default pasword

		$cek=pg_query($conn,"SELECT * FROM master_pegawai WHERE nip='$_POST[nip]'");

		if(pg_num_rows($cek) > 0){
			
		}
		else{
			$sql="INSERT INTO master_pegawai (nip,nama,foto,uid_unit,id_jenkel,password,kategori,bidang,jabatan,perusahaan,created_at) VALUES ('$_POST[nip]','$_POST[nama]','$foto','$_POST[unit]','$_POST[id_jenkel]','$password','$_POST[kategori]','$_POST[bidang]','$_POST[jabatan]','$_POST[perusahaan]','$waktu_sekarang')RETURNING uid";
			$d=pg_fetch_array(pg_query($conn,$sql));
		}
		header("location: master-pegawai");
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){
		$foto=crop_image('../../../images/pegawai/');
		$foto_e= $foto == "" ? $_POST['image_edit'] : $foto;
		$sql="UPDATE master_pegawai SET nip='$_POST[nip]',nama='$_POST[nama]',foto='$foto_e',uid_unit='$_POST[unit]',id_jenkel='$_POST[id_jenkel]',kategori='$_POST[kategori]',bidang='$_POST[bidang]',jabatan='$_POST[jabatan]',perusahaan='$_POST[perusahaan]', updated_at='$waktu_sekarang' WHERE uid='$_POST[id]'";
		
		$result=pg_query($conn,$sql);
		// print_r($sql);die();
		header("location: master-pegawai");
	}
	
	elseif($act=='delete'){
		$sql="UPDATE master_pegawai SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: master-pegawai");
	}
	pg_close($conn);
}
?>