<?php
$d=pg_fetch_array(pg_query($conn,"SELECT * FROM master_pegawai WHERE uid='$_POST[id]'"));
?>
<form action="aksi-edit-master-pegawai" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Edit</h5>
			</div>
			<div class="modal-body" id="form-data">
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">NIP</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" value="<?php echo $d['nip']?>" name="nip" autofocus required="">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Nama</label>
					<div class="col-md-9">
						<input type="text" class="form-control form-control-alternative" placeholder="" value="<?php echo $d['nama']?>" name="nama" required="">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Jenis Kelamin</label>
					<div class="col-md-9">
						<select class="form-control form-control-alternative" id="select2" name="id_jenkel" required="">
							<option value="">Pilih</option>
							<option value="L" <?php echo $d['id_jenkel'] == "L" ? 'selected':'';?> >Laki-laki</option>
							<option value="P" <?php echo $d['id_jenkel'] == "P" ? 'selected':'';?>>Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Foto</label>
					<div class="col-md-9">
						<input type="file" accept="image/*" class="form-control form-control-alternative" placeholder="" name="image">
						<input type="hidden" class="form-control form-control-alternative" placeholder="" name="image_edit" value="<?php echo $d['foto'];?>" required="">
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
                        	$selected1= $d['jabatan'] == $r['uid'] ? 'selected' : '';
                        	echo '<option value="'.$r['uid'].'" '.$selected1.'>'.$r['nama'].'</option>';
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
                        	$selected2= $d['uid_unit'] == $r['uid'] ? 'selected' : '';
                        	echo '<option value="'.$r['uid'].'" '.$selected2.'>'.$r['nama'].'</option>';
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
                        	$selected3= $d['kategori'] == $r['uid'] ? 'selected' : '';
                        	echo '<option value="'.$r['uid'].'" '.$selected3.'>'.$r['nama'].'</option>';
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
                        	$selected1= $d['bidang'] == $r['uid'] ? 'selected' : '';
                        	echo '<option value="'.$r['uid'].'" '.$selected1.'>'.$r['nama'].'</option>';
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
                        	$selected1= $d['perusahaan'] == $r['uid'] ? 'selected' : '';
                        	echo '<option value="'.$r['uid'].'" '.$selected1.'>'.$r['nama_perusahaan'].'</option>';
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