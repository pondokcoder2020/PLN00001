<?php
$d=pg_fetch_array(pg_query($conn,"SELECT * FROM master_aset_subkategori_parameter WHERE id='$_POST[id]'"));
?>
<form action="aksi-edit-parameter" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Edit</h5>
			</div>
			<div class="modal-body" id="form-data">
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Parameter Pengecekan</label>
					<div class="col-md-9">
						<input type="hidden" name="id_subkategori" value="<?php echo $d['id_subkategori'];?>">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="nama" value="<?php echo $d['nama'];?>" autofocus>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Kategori</label>
					<div class="col-md-9">
						<select class="form-control form-control-alternative" name="id_kategori" required="">
							<option value="">Pilih</option>
							<?php
							$q=pg_query($conn,"SELECT * FROM master_aset_kategori");
							while($r=pg_fetch_array($q)){
								$select = $d['id_kategori'] == $r['id'] ? 'selected' : '';
								echo '<option value="'.$r['id'].'" '.$select.'>'.$r['nama'].'</option>';
							}
							?>
						</select>
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