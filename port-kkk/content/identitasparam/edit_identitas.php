<?php
$q=pg_query($conn,"SELECT * FROM master_aset_subkategori_identitas WHERE id='$_POST[id]'");
$r=pg_fetch_array($q);
?>
<form action="aksi-edit-identitas" method="POST" enctype="multipart/form-data">
	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Tambah</h5>
			</div>
			<div class="modal-body" id="form-data">
                <div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Nama Alat</label>
					<div class="col-md-9">
						<input type="hidden"  class="form-control form-control-alternative" placeholder="" name="id" value="<?php echo $_POST['id'];?>">
						<input type="hidden"  class="form-control form-control-alternative" placeholder="" name="id_subkategori" value="<?php echo $r['id_subkategori'];?>">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="nama" autofocus value="<?php echo $r['nama'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Merk</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="merk" value="<?php echo $r['merk'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Kapasitas</label>
					<div class="col-md-9">
						<select class="form-control" name="kapasitas">
							<option value="">Pilih</option>
							<?php 
								$qc=pg_query($conn,"SELECT * FROM kapasitas WHERE id_subkategori='$_GET[id_sub]' ORDER BY nama ASC");
								while($rx=pg_fetch_array($qc)){
									$select = $r['kapasitas'] == $rx['id'] ? 'selected' : '';
									echo '<option value="'.$rx['id'].'" '.$select.'>'.$rx['nama'].'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Jumlah</label>
					<div class="col-md-9">
						<input type="number"  class="form-control form-control-alternative" placeholder="" name="jumlah" value="<?php echo $r['jumlah'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Satuan</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="satuan" value="<?php echo $r['satuan'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Tanggal Beli</label>
					<div class="col-md-9">
						<input type="date"  class="form-control form-control-alternative" placeholder="" name="tanggal_beli" value="<?php echo date('Y-m-d',strtotime($r['lokasi_penempatan']));?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Lokasi Penempatan</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="lokasi_penempatan" value="<?php echo $r['lokasi_penempatan'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Jenis/Varian</label>
					<div class="col-md-9">
						<select class="form-control" name="id_varian">
							<option value="">Pilih</option>
							<?php 
								$qu=pg_query($conn,"SELECT * FROM varian WHERE id_subkategori='$_GET[id_sub]' ORDER BY nama ASC");
								while($rx=pg_fetch_array($qu)){
									$select = $rx['id'] == $r['id_varian'] ? 'selected' : '';
 									echo '<option value="'.$rx['id'].'" '.$select.'>'.$rx['nama'].'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Keterangan</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="keterangan" value="<?php echo $r['keterangan'];?>">
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