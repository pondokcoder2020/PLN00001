<!DOCTYPE html>
<html>
<head>
	<title>Berkas Upload</title>
	<link type="text/css" href="../../../assets/vendor/datatable/bootstrap.css" rel="stylesheet">
</head>
<style type="text/css">
	body{
		font-family: Times New Roman;
	}
	table,tr,td, #judul{
		padding: 8px;
	}
</style>
<body class="container">
<div class="text-center">
	<h4>PERMINTAAN / PENGAJUAN PEGAWAI TRAINING PADA PLN</h4>
</div>
<br>
<br>
<?php
include "../../../konfig/koneksi.php";
$pegawai=pg_fetch_array(pg_query($conn,"SELECT uid, nama, foto, nip, uid_jabatan, uid_bidang, id_kategori FROM master_pegawai WHERE uid='$_SESSION[login_user]'"));
$uid=base64_decode($_GET['uid']);
$rx=pg_fetch_array(pg_query("SELECT a.nomor_usulan,a.tanggal_pelaksanaan,c.nama as pemohon,d.nama as unit,f.nama as jabatan,b.nama as training FROM training_usulan a LEFT JOIN master_sertifikat b ON a.uid_sertifikat=b.uid_sertifikat LEFT JOIN master_pegawai c ON a.uid_pegawai=c.uid LEFT JOIN master_unit d ON c.uid_unit=d.uid LEFT JOIN master_jabatan f ON c.uid_jabatan=f.uid WHERE a.uid='$uid'"));

?>
<table id="judul">
	<tr>
		<td>Nomor Pengajuan</td>
		<td>: </td>
		<td><?php echo $rx['nomor_usulan']?></td>
	</tr>
	<tr>
		<td>Nama Pemohon</td>
		<td>: </td>
		<td><?php echo $rx['pemohon']?></td>
	</tr>
	<tr>
		<td>Unit</td>
		<td>: </td>
		<td><?php echo $rx['unit']?></td>
	</tr>
	<tr>
		<td>Jabatan</td>
		<td>: </td>
		<td><?php echo $rx['jabatan']?></td>
	</tr>
	<tr>
		<td>Nama Training</td>
		<td>: </td>
		<td><?php echo $rx['training']?></td>
	</tr>
	<tr>
		<td colspan="3"><br>Berikut Nama Pegawai Pengajuan Traning:</td>
	</tr>
</table>
<br>
<table class="table" border="1">
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Jabatan</th>
	</tr>
	<?php
    $no=1;
    $tampil=pg_query($conn,"SELECT a.*,b.nama as pegawai,c.nama as jabatan FROM training_usulan_pegawai a LEFT JOIN master_pegawai b ON a.uid_pegawai=b.uid LEFT JOIN master_jabatan c ON b.uid_jabatan=c.uid WHERE a.uid_usulan='$uid'");
    while($r=pg_fetch_array($tampil)){
        ?>
	<tr>
		<td><?php echo $no;?></td>
		<td><?php echo $r['pegawai'];?></td>
		<td><?php echo $r['jabatan'];?></td>
	</tr>
	<?php $no++; } ?>
</table>
<br>
<table>
	<tr>
		<td width="400"></td>
		<td>Medan, <?php echo date('d-m-Y');?><br><br><br><br><br><br><?php echo $pegawai['nama'];?></td>
	</tr>
</table>
</body>
<script src="../../../assets/vendor/jquery.min.js"></script>
<script src="../../../assets/vendor/bootstrap.min.js"></script>
</html>