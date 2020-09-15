<form action="aksi-tambah-unitsektor" method="POST" enctype="multipart/form-data">
	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Tambah</h5>
			</div>
			<div class="modal-body" id="form-data">
                <div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Kode Unit</label>
					<div class="col-md-4">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="kode" autofocus required max="10">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Nama Unit</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="nama" required>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">No. Telepon</label>
					<div class="col-md-6">
						<input type="text" class="form-control form-control-alternative phone" placeholder="" name="no_telepon">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Alamat</label>
					<div class="col-md-9">
						<textarea name="alamat" class="form-control"></textarea>
					</div>
                </div>
                <div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Level Sektor</label>
					<div class="col-md-4">
						<select name="id_level" class="form-control" required="">
							<option value="">Pilih</option>
							<option value="1">1</option>
							<option value="2">2</option>
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
<script src="../addons/masking_form.js"></script>