<form action="aksi-tambah-master-pegawai" method="POST" enctype="multipart/form-data">
	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Tambah</h5>
			</div>
			<div class="modal-body" id="form-data">
                <div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">NIP</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="nip" autofocus required="">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Nama</label>
					<div class="col-md-9">
						<input type="text" class="form-control form-control-alternative" placeholder="" name="nama" required="">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Jenis Kelamin</label>
					<div class="col-md-9">
						<select class="form-control form-control-alternative" id="select2" name="id_jenkel" required="">
							<option value="">Pilih</option>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Foto</label>
					<div class="col-md-9">
						<input type="file" accept="image/*" class="form-control form-control-alternative" placeholder="" name="image">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Jabatan</label>
					<div class="col-md-9">
						<select class="form-control form-control-alternative" name="jabatan" required="">
							<option value="">Pilih</option>
							<?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT * FROM master_jabatan WHERE deleted_at IS NULL ORDER BY nama ASC");
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
						<select class="form-control form-control-alternative select2" name="unit" required="">
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
					<label class="form-control-label col-md-3 pt-2">Kategori</label>
					<div class="col-md-9">
						<select class="form-control form-control-alternative select2" name="kategori" required="">
							<option value="">Pilih</option>
							<?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT * FROM master_kategori_personil WHERE deleted_at IS NULL ORDER BY nama ASC");
                        while($r=pg_fetch_array($tampil)){
                        	echo '<option value="'.$r['uid'].'">'.$r['nama'].'</option>';
                        }
                            ?>
						</select>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Bidang</label>
					<div class="col-md-9">
						<select class="form-control form-control-alternative select2" name="bidang" required="">
							<option value="">Pilih</option>
							<?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT * FROM master_bidang WHERE deleted_at IS NULL ORDER BY nama ASC");
                        while($r=pg_fetch_array($tampil)){
                        	echo '<option value="'.$r['uid'].'">'.$r['nama'].'</option>';
                        }
                            ?>
						</select>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Perusahaan</label>
					<div class="col-md-9">
						<select class="form-control form-control-alternative select2" name="perusahaan" required="">
							<option value="">Pilih</option>
							<?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT * FROM master_perusahaan WHERE deleted_at IS NULL ORDER BY nama_perusahaan ASC");
                        while($r=pg_fetch_array($tampil)){
                        	echo '<option value="'.$r['uid'].'">'.$r['nama_perusahaan'].'</option>';
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
