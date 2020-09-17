<?php
$d=pg_fetch_array(pg_query($conn,"SELECT * FROM master_aset_subkategori WHERE id='$_POST[id]'"));
?>
<form action="aksi-edit-detail-inspeksi" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Edit</h5>
			</div>
			<div class="modal-body" id="form-data">
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Nama</label>
					<div class="col-md-9">
						<input type="hidden" class="form-control form-control-alternative" placeholder="" value="<?php echo $d['id_kategori']?>" name="id_kategori">
						<input type="text" class="form-control form-control-alternative" placeholder="" value="<?php echo $d['nama']?>" name="nama" required="">
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