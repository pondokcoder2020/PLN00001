<?php
include "../konfig/fungsi_tanggal.php";
include "../konfig/library.php";
include "../konfig/myencrypt.php";
include "../konfig/fungsi_angka.php";
$module=$_GET['module'];

if($module=='home'){
    // include "content/home/data.php";
}

//AWAL MENU TERMINOLOGI
else if($module=='perusahaan'){
    include "content/perusahaan/data.php";
}
?>