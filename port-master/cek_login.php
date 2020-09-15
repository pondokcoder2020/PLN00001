<?php
session_start();
error_reporting(0);
include("../konfig/koneksi.php");
include("../konfig/library.php");
include("../konfig/myencrypt.php");

// username and password sent from Form
$username=pg_escape_string($conn,$_POST['username']); 
//Here converting passsword into MD5 encryption. 
$password=encrypt(pg_escape_string($conn,$_POST['password']));

$result=pg_query($conn,"SELECT a.uid, b.uid AS uid_unit, b.id_level FROM master_pegawai a, master_unit b WHERE a.uid_unit=b.uid AND a.nip='$username' AND a.password='$password' AND a.deleted_at IS NULL");
$row=pg_fetch_array($result);
if($row['uid']!=''){
	echo "ok";
	include "timeout.php";
	timer();

	session_regenerate_id();
	$sid=session_id();
	$_SESSION['login_user']    = $row['uid'];
	$_SESSION['id_session']    = $sid;
	$_SESSION['login_portal']  = 1;
	$_SESSION['uid_unit']      = $row['uid_unit'];
	$_SESSION['id_level']      = $row['id_level'];

	pg_query($conn,"UPDATE master_pegawai SET is_login='Y', last_login='$waktu_sekarang' WHERE uid='$row[uid]'");
	
	//pg_query($conn,"INSERT INTO log_login (uid_pegawai, waktu_login, id_session) VALUES ('$_SESSION[login_user]', '$waktu_sekarang', '$sid')");

}
else{
	echo "notok";
}
?>