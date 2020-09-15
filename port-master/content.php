<?php
include "../konfig/fungsi_tanggal.php";
include "../konfig/library.php";
include "../konfig/myencrypt.php";
include "../konfig/fungsi_angka.php";
$module=$_GET['module'];

if($module=='home'){
    include "content/home/data.php";
}

//AWAL MENU TERMINOLOGI
else if($module=='unit'){
    include "content/unit/data.php";
}

else if($module=='unitsektor'){
    include "content/unitsektor/data.php";
}

else if($module=='unitlayanan'){
    include "content/unitlayanan/data.php";
}

else if($module=='jabatan'){
    include "content/jabatan/data.php";
}

else if($module=='pegawai-sektor'){
    include "content/pegawai-sektor/data.php";
}
?>