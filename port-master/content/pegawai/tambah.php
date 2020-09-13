<form action="aksi-tambah-pegawai" method="POST" enctype="multipart/form-data">
	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="title-form">Tambah</h4>
			</div>
			<div class="modal-body" id="form-data">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group focused">
							<label class="form-control-label">NIP</label>
							<input type="text"  class="form-control form-control-alternative" placeholder="NIP" name="nip" autofocus required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group focused">
							<label class="form-control-label">Password</label>
							<input type="password"  class="form-control form-control-alternative" placeholder="Password" name="password" required>
						</div>
					</div>
				</div>
                
				<div class="row">
					<div class="col-md-6">
						<div class="form-group focused">
							<label class="form-control-label">Nama Lengkap</label>
							<input type="text"  class="form-control form-control-alternative" placeholder="Nama Lengkap" name="nama" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group focused">
							<label class="form-control-label">Bidang</label>
							<select name="uid_bidang" class="form-control">
								<option value="">Tidak Ada</option>
								<?php
								$tampil=pg_query($conn,"SELECT * FROM master_pegawai_bidang WHERE deleted_at IS NULL AND uid_unit='$_SESSION[uid_unit]' ORDER BY nama");
								while($r=pg_fetch_array($tampil)){
									echo"<option value='$r[uid]'>$r[nama]</option>";
								}
								?>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group focused">
							<label class="form-control-label">Jabatan</label>
							<select name="uid_jabatan" class="form-control">
								<?php
								$tampil=pg_query($conn,"SELECT * FROM master_pegawai_jabatan WHERE deleted_at IS NULL AND uid_unit='$_SESSION[uid_unit]' ORDER BY nama");
								while($r=pg_fetch_array($tampil)){
									echo"<option value='$r[uid]'>$r[nama]</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group focused">
							<label class="form-control-label">Kategori</label>
							<select name="id_kategori" class="form-control">
								<?php
								$tampil=pg_query($conn,"SELECT * FROM master_term_data WHERE id_term='2' ORDER BY nama");
								while($r=pg_fetch_array($tampil)){
									echo"<option value='$r[id]'>$r[nama]</option>";
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group focused">
							<label class="form-control-label">Foto</label>
							<div>
								<img id="preview_gambar" src="../images/noimage.png" alt="" class="img-thumbnail" width="250px"/>
								<input type="file" class="form-control" name="fupload" id="fupload" onChange="readURL(this);" accept="image/*">
							</div>
						</div>
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
<script type="text/javascript" src="../addons/js/fungsi_display_image.js"></script>