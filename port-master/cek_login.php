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

$result=pg_query($conn,"SELECT uid FROM master_pegawai WHERE nip='$username' AND password='$password' AND deleted_at IS NULL");
$row=pg_fetch_array($result);
if($row['uid']!=''){
	echo "ok";
	include "timeout.php";
	timer();

	session_regenerate_id();
	$sid=session_id();
	$_SESSION['login_user']    = $row['uid'];
	$_SESSION['id_session']    = $sid;
	$_SESSION['username']      = $_POST['username'];
	$_SESSION['login_portal']   = 1;
	
	pg_query($conn,"UPDATE pegawai SET is_login='Y', last_login='$waktu_sekarang' WHERE uid='$row[uid]'");
	
	pg_query($conn,"INSERT INTO log_login (uid_pegawai, waktu_login, id_session) VALUES ('$_SESSION[login_user]', '$waktu_sekarang', '$sid')");

}
else{
	echo "notok";
}
?>