<?php
$d=pg_fetch_array(pg_query($conn,"SELECT * FROM master_item_kategori WHERE uid='$_POST[id]'"));
?>
<form action="aksi-edit-item-kategori" method="POST" enctype="multipart/form-data">
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
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="nama" autofocus value="<?php echo $d['nama'];?>">
					</div>
				</div>
                <div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Klasifikasi</label>
					<div class="col-md-9">
						<select class="form-control form-control-alternative" name="klasifikasi" required="">
							<option value="">Pilih</option>
							<?php
							$q=pg_query($conn,"SELECT * FROM master_klasifikasi WHERE deleted_at IS NULL");
							while ($r=pg_fetch_array($q)) {
								$select = $d['klasifikasi'] == $r['uid'] ? 'selected' : '';
								echo '<option value="'.$r['uid'].'" '.$select.'>'.$r['nama'].'</option>';
							}
							?>
						</select>
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