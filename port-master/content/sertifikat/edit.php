<?php
$d=pg_fetch_array(pg_query($conn,"SELECT * FROM master_sertifikat WHERE uid_sertifikat='$_POST[id]'"));
?>
<form action="aksi-edit-sertifikat" method="POST" enctype="multipart/form-data">

	<input type="hidden" name="uid" value="<?php echo $d['uid_sertifikat'];?>">

	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Tambah</h5>
			</div>
			<div class="modal-body" id="form-data">
                <div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Nama Sertifikat</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="nama" autofocus value="<?php echo $d['nama'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Tanggal Awal</label>
					<div class="col-md-9">
						<input type="date" class="form-control form-control-alternative" placeholder="" name="tanggal_awal" value="<?php echo date('Y-m-d',strtotime($d['tanggal_awal']));?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Tanggal Akhir</label>
					<div class="col-md-9">
						<input type="date" class="form-control form-control-alternative" placeholder="" name="tanggal_akhir" value="<?php echo date('Y-m-d',strtotime($d['tanggal_akhir']));?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Keterangan</label>
					<div class="col-md-9">
						<input type="text" class="form-control form-control-alternative" placeholder="" name="keterangan" value="<?php echo $d['keterangan'];?>">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success btn-md"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" class="btn btn-danger btn-md" data-dismiss="modal"><i class="fa fa-ban"></i> Batal</button>
			</div>
		</div>
	</div>
</form>
