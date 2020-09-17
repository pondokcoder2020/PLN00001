<?php
$d=pg_fetch_array(pg_query($conn,"SELECT * FROM master_pegawai WHERE uid='$_POST[id]'"));
// print_r($d);die();
$password=decrypt($d['password']);
?>
<form action="aksi-edit-admin-unitsektor" method="POST" enctype="multipart/form-data">
	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="title-form">Edit</h4>
			</div>
			<div class="modal-body" id="form-data">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group focused">
							<label class="form-control-label">NIP</label>
							<input type="hidden"  class="form-control form-control-alternative"  name="uid" value="<?php echo $d['uid']?>">
							<input type="hidden"  class="form-control form-control-alternative"  name="unit" value="<?php echo $d['uid_unit']?>">
							<input type="text"  class="form-control form-control-alternative" placeholder="NIP" name="nip" autofocus value="<?php echo $d['nip']?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group focused">
							<label class="form-control-label">Password</label>
							<input type="password"  class="form-control form-control-alternative" placeholder="Password" name="password" required value="<?php echo $password;?>">
						</div>
					</div>
				</div>
                
				<div class="row">
					<div class="col-md-12">
						<div class="form-group focused">
							<label class="form-control-label">Nama Lengkap</label>
							<input type="text"  class="form-control form-control-alternative" placeholder="Nama Lengkap" name="nama" value="<?php echo $d['nama'];?>" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group focused">
							<label class="form-control-label">Foto</label>
							<div>
								<img id="preview_gambar" src="../images/pegawai/upload_<?php echo $d['foto'];?>" alt="" class="img-thumbnail" width="250px"/>
								<input type="file" class="form-control" name="fupload" id="fupload" onChange="readURL(this);" accept="image/*">
								<input type="hidden" name="foto" value="<?php echo $d['foto'];?>">
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
<script type="text/javascript" src="addons/js/fungsi_display_image.js"></script>