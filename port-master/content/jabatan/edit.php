<?php
$d=pg_fetch_array(pg_query($conn,"SELECT * FROM master_unit WHERE uid='$_POST[id]'"));
?>
<form action="aksi-edit-jabatan" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Edit</h5>
			</div>
			<div class="modal-body" id="form-data">
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Kode Unit</label>
					<div class="col-md-4">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="kode" autofocus required max="10" value="<?php echo $d['kode'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Nama Unit</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="nama" required value="<?php echo $d['nama'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">No. Telepon</label>
					<div class="col-md-6">
						<input type="text" class="form-control form-control-alternative" placeholder="" name="no_telepon" value="<?php echo $d['no_telepon'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Alamat</label>
					<div class="col-md-9">
						<textarea name="alamat" class="form-control"><?php echo $d['alamat'];?></textarea>
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