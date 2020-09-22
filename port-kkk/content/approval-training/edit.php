<?php
$d=pg_fetch_array(pg_query($conn,"SELECT * FROM master_aset_subkategori_identitas WHERE id='$_POST[id]'"));
?>
<form action="aksi-edit-identitas" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Edit</h5>
			</div>
			<div class="modal-body" id="form-data">
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Unit</label>
					<div class="col-md-9">
						<select class="form-control form-control-alternative" name="unit" required="">
							<option value="">Pilih</option>
							<?php
							$q=pg_query($conn,"SELECT * FROM master_unit");
							while($r=pg_fetch_array($q)){
								$select = $d['unit'] == $r['uid'] ? 'selected' : '';
								echo '<option value="'.$r['uid'].'" '.$select.'>'.$r['nama'].'</option>';
							}
							?>
						</select>
					</div>
				</div>
                <div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Nama Alat</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="nama" value="<?php echo $d['nama'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Merk</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="merk" value="<?php echo $d['merk'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Kapasitas</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="kapasitas" value="<?php echo $d['kapasitas'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Jumlah</label>
					<div class="col-md-9">
						<input type="number"  class="form-control form-control-alternative" placeholder="" name="jumlah" value="<?php echo $d['jumlah'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Satuan</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="satuan" value="<?php echo $d['satuan'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Keterangan</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="keterangan" value="<?php echo $d['keterangan'];?>">
						<input type="hidden" name="id_subkategori" value="<?php echo $d['id_subkategori'];?>">
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