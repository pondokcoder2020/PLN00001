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

else if($module=='jabatan'){
    include "content/jabatan/data.php";
}

else if($module=='kategori-personil'){
    include "content/kategori-personil/data.php";
}

else if($module=='bidang'){
    include "content/bidang/data.php";
}

else if($module=='unit'){
    include "content/unit/data.php";
}

else if($module=='master-pegawai'){
    include "content/master-pegawai/data.php";
}

else if($module=='klasifikasi'){
    include "content/klasifikasi/data.php";
}

else if($module=='item-kategori'){
    include "content/item-kategori/data.php";
}

else if($module=='item-varian'){
    include "content/item-varian/data.php";
}

else if($module=='item'){
    include "content/item/data.php";
}

else if($module=='master-aset'){
    include "content/master-aset/data.php";
}

else if($module=='lokasi-penempatan'){
    include "content/lokasi-penempatan/data.php";
}

else if($module=='master-inspeksi-peralatan'){
    include "content/master-inspeksi-peralatan/data.php";
}

else if($module=='detail-inspeksi'){
    include "content/detail-inspeksi/data.php";
}

else if($module=='parameter'){
    include "content/parameter/data.php";
}

else if($module=='identitas'){
    include "content/identitas/data.php";
}

else if($module=='identitasparam'){
    include "content/identitasparam/data.php";
}

else if($module=='training'){
    include "content/training/data.php";
}

?>