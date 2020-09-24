<?php
session_start();
include "../../timeout.php";
date_default_timezone_set("Asia/Jakarta");
if($_SESSION['login_portal']==1){
	if(!cek_login()){
		$_SESSION['login_portal'] = 0;
	}
}
if($_SESSION['login_portal']==0){
	header('location:logout.php');
}

	ob_start();
	include "format_berkas.php";
	$content = ob_get_clean();

	require_once "../../../assets/vendor/mpdf/autoload.php";

	$mpdf = new \Mpdf\Mpdf();
	$mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
	$mpdf->WriteHTML($content);
	$mpdf->Output();
?>