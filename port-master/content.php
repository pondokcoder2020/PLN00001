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

else if($module=='jabatan'){
    include "content/jabatan/data.php";
}

else if($module=='jabatansektor'){
    include "content/jabatansektor/data.php";
}

else if($module=='jabatanlayanan'){
    include "content/jabatanlayanan/data.php";
}

else if($module=='bidang'){
    include "content/bidang/data.php";
}

else if($module=='bidangsektor'){
    include "content/bidangsektor/data.php";
}

else if($module=='bidanglayanan'){
    include "content/bidanglayanan/data.php";
}

else if($module=='struktur'){
    include "content/struktur/data.php";
}

else if($module=='profile'){
    include "content/profile/data.php";
}

else if($module=='pegawai'){
    include "content/pegawai/data.php";
}

else if($module=='unitlayanan'){
    include "content/unitlayanan/data.php";
}

else if($module=='identitasparam'){
    include "content/identitasparam/data.php";
}

else if($module=='sertifikat'){
    include "content/sertifikat/data.php";
}
?>