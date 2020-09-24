<?php
$r=pg_fetch_array(pg_query($conn,"SELECT * FROM training_usulan WHERE uid='$_POST[id]'"));
?>
<form action="aksi-upload-berkas" method="POST" enctype="multipart/form-data">
	
	<input type="hidden" name="uid" value="<?php echo $r['uid']?>">

	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Tambah</h5>
			</div>
			<div class="modal-body" id="form-data">
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Berkas</label>
					<div class="col-md-9">
						<input type="file"  class="form-control form-control-alternative" placeholder="" name="berkas">
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