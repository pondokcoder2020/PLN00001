<?php
$q=pg_query($conn,"SELECT a.*,b.nama FROM training_usulan_pegawai a LEFT JOIN master_pegawai b ON a.uid_pegawai=b.uid WHERE a.uid='$_POST[id]'");
$rx=pg_fetch_array($q);
?>
<form action="aksi-entry-sertifikat" method="POST" enctype="multipart/form-data">

	<input type="hidden" name="uid" value="<?php echo $rx['uid'];?>">

	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Tambah</h5>
			</div>
			<div class="modal-body" id="form-data">
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Nama Pegawai</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder=""  value="<?php echo $rx['nama'];?>" readonly="readonly">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Nomor Sertifikat</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="nomor" value="">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Keterangan</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="keterangan" value="">
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