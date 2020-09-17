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
		$sql="INSERT INTO master_unit (kode, nama, no_telepon, alamat, uid_parent, created_at, id_level) VALUES ('$_POST[kode]', '$_POST[nama]', '$_POST[no_telepon]', '$_POST[alamat]', '$_SESSION[uid_unit]', '$waktu_sekarang', '3') RETURNING uid";
		$d=pg_fetch_array(pg_query($conn,$sql));

		//header("location: unitlayanan");
	}
	
	elseif($act=='edit'){
		include "edit.php";
	}
	
	elseif ($act=='update'){
		$sql="UPDATE master_unit SET kode='$_POST[kode]', nama='$_POST[nama]', no_telepon='$_POST[no_telepon]', alamat='$_POST[alamat]', updated_at='$waktu_sekarang' WHERE uid='$_POST[id]'";
		$result=pg_query($conn,$sql);

		header("location: unitlayanan");
	}
	
	elseif($act=='delete'){
		$sql="UPDATE master_unit SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[id]'";
		$result=pg_query($conn,$sql);

		header("location: unitlayanan");
	}

	elseif($act=='inputpegawai'){
		$foto=crop_image('../../../images/pegawai/');
		$password=encrypt('12345');//default pasword

		$cek=pg_query($conn,"SELECT * FROM master_pegawai WHERE nip='$_POST[nip]'");

		if(pg_num_rows($cek) > 0){
			
		}
		else{
			$sql="INSERT INTO master_pegawai (nip,nama,foto,uid_unit,id_jenkel,password,created_at) VALUES ('$_POST[nip]','$_POST[nama]','$foto','$_POST[unit]','$_POST[id_jenkel]','$password','$waktu_sekarang')RETURNING uid";
			$d=pg_fetch_array(pg_query($conn,$sql));
		}
		header("location: view-unitlayanan-".$_POST['unit']."#tab-22");
	}

	elseif($act=='tambahadmin'){
		include "tambah_admin.php";
	}

	elseif($act=='updateadmin'){
		include "edit_admin.php";
	}

	elseif($act=='inputadminsektor'){
		$foto=crop_image('../../../images/pegawai/');

		$cek=pg_query($conn,"SELECT * FROM master_pegawai WHERE nip='$_POST[nip]'");

		if(pg_num_rows($cek) > 0){
			
		}
		else{
			$sql="INSERT INTO master_pegawai (nip,nama,foto,uid_unit,password,created_at) VALUES ('$_POST[nip]','$_POST[nama]','$foto','$_POST[unit]','$_POST[password]','$waktu_sekarang')RETURNING uid";
			$d=pg_fetch_array(pg_query($conn,$sql));
		}
		header("location: view-unitlayanan-".$_POST['unit']);
	}

	elseif($act=='updateadminsektor'){
		$foto=crop_image('../../../images/pegawai/');

		if($foto==""){
			$foto=$_POST['foto'];
		}

		$sql="UPDATE master_pegawai SET nip='$_POST[nip]',nama='$_POST[nama]',foto='$foto',password='$_POST[password]',updated_at='$waktu_sekarang' WHERE uid='$_POST[uid]'";
		$d=pg_fetch_array(pg_query($conn,$sql));

		// print_r($sql);die();

		header("location: view-unitlayanan-".$_POST['unit']);
	}

	elseif($act=='deleteadminsektor'){
		
		$r=pg_fetch_array(pg_query($conn,"SELECT * FROM master_pegawai WHERE uid='$_GET[uid]'"));

		$sql="UPDATE master_pegawai SET deleted_at='$waktu_sekarang' WHERE uid='$_GET[uid]'";
		$d=pg_fetch_array(pg_query($conn,$sql));

		// print_r($sql);die();

		header("location: view-unitlayanan-".$r['uid_unit']);
	}

	
	pg_close($conn);
}
?>