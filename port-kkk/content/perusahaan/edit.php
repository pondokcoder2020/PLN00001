<?php
$d=pg_fetch_array(pg_query($conn,"SELECT * FROM master_perusahaan WHERE uid='$_POST[id]'"));
?>
<form action="aksi-edit-perusahaan" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Edit</h5>
			</div>
			<div class="modal-body" id="form-data">
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Nama Perusahaan</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="nama_perusahaan" value="<?php echo $d['nama_perusahaan'];?>" autofocus>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Jenis Perusahaan</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="jenis_perusahaan" value="<?php echo $d['jenis_perusahaan'];?>" required>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Keterangan</label>
					<div class="col-md-9">
						<input type="text" class="form-control form-control-alternative" placeholder="" value="<?php echo $d['keterangan'];?>" name="keterangan">
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