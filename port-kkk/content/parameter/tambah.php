<form action="aksi-tambah-parameter" method="POST" enctype="multipart/form-data">
	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Tambah</h5>
			</div>
			<div class="modal-body" id="form-data">
                <div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Parameter Pengecekan</label>
					<div class="col-md-9">
						<input type="hidden"  class="form-control form-control-alternative" placeholder="" name="id_subkategori" value="<?php echo $_GET['id'];?>">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="nama" autofocus>
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
								echo '<option value="'.$r['id'].'">'.$r['nama'].'</option>';
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