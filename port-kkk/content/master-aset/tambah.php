<form action="aksi-tambah-master-aset" method="POST" enctype="multipart/form-data">
	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Tambah</h5>
			</div>
			<div class="modal-body" id="form-data">
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Kategori</label>
					<div class="col-md-9">
						<select class="form-control form-control-alternative" name="kategori" required="">
							<option value="">Pilih</option>
							<?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT * FROM master_item_kategori WHERE deleted_at IS NULL ORDER BY nama ASC");
                        while($r=pg_fetch_array($tampil)){
                        	echo '<option value="'.$r['uid'].'">'.$r['nama'].'</option>';
                        }
                            ?>
						</select>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Varian</label>
					<div class="col-md-9">
						<select class="form-control form-control-alternative select2" name="varian" required="">
							<option value="">Pilih</option>
							<?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT * FROM master_item_varian WHERE deleted_at IS NULL ORDER BY nama ASC");
                        while($r=pg_fetch_array($tampil)){
                        	echo '<option value="'.$r['uid'].'">'.$r['nama'].'</option>';
                        }
                            ?>
						</select>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Item</label>
					<div class="col-md-9">
						<select class="form-control form-control-alternative select2" name="uid_item" required="">
							<option value="">Pilih</option>
							<?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT * FROM master_item WHERE deleted_at IS NULL ORDER BY nama ASC");
                        while($r=pg_fetch_array($tampil)){
                        	echo '<option value="'.$r['uid'].'">'.$r['nama'].'</option>';
                        }
                            ?>
						</select>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Unit</label>
					<div class="col-md-9">
						<select class="form-control form-control-alternative select2" name="uid_unit" required="">
							<option value="">Pilih</option>
							<?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT * FROM master_unit WHERE deleted_at IS NULL ORDER BY nama ASC");
                        while($r=pg_fetch_array($tampil)){
                        	echo '<option value="'.$r['uid'].'">'.$r['nama'].'</option>';
                        }
                            ?>
						</select>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Lokasi Penempatan</label>
					<div class="col-md-9">
						<select class="form-control form-control-alternative select2" name="lokasi_penempatan" required="">
							<option value="">Pilih</option>
							<?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT * FROM master_lokasi_penempatan WHERE deleted_at IS NULL ORDER BY nama ASC");
                        while($r=pg_fetch_array($tampil)){
                        	echo '<option value="'.$r['uid'].'">'.$r['nama'].'</option>';
                        }
                            ?>
						</select>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Serial Number</label>
					<div class="col-md-9">
						<input type="text" class="form-control form-control-alternative" placeholder="" name="serial_number">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Kode Aset</label>
					<div class="col-md-9">
						<input type="text" class="form-control form-control-alternative" placeholder="" name="kode_aset">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Tanggal Beli</label>
					<div class="col-md-9">
						<input type="date" class="form-control form-control-alternative tanggal" placeholder="" name="tanggal_beli">
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
