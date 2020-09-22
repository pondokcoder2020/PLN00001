<?php
$q=pg_query($conn,"SELECT * FROM training_usulan WHERE uid='$_POST[id]'");
$r=pg_fetch_array($q);
?>
<form action="aksi-edit-training" method="POST" enctype="multipart/form-data">

	<input type="hideden"  class="form-control form-control-alternative"  name="uid" value="<?php echo $r['uid'];?>">

	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Tambah</h5>
			</div>
			<div class="modal-body" id="form-data">
                <div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Nomor Usulan</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="nomor_usulan" autofocus value="<?php echo $r['nomor_usulan'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Tanggal Pelaksanaan</label>
					<div class="col-md-9">
						<input type="date"  class="form-control form-control-alternative" placeholder="" name="tanggal_pelaksanaan" value="<?php echo date('Y-m-d',strtotime($r['tanggal_pelaksanaan']));?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Pelatihan/Sertifikat</label>
					<div class="col-md-9">
						<select class="form-control form-control-alternative" name="uid_sertifikat" required="">
							<option value="">Pilih</option>
							<?php
								$q=pg_query($conn,"SELECT * FROM master_sertifikat ORDER BY nama ASC");
								while ($re=pg_fetch_array($q)){
									$select = $re['uid_sertifikat'] == $r['uid_sertifikat'] ? 'selected' : '';
									echo '<option value="'.$re['uid_sertifikat'].'" '.$select.'>'.$re['nama'].'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Berkas</label>
					<div class="col-md-9">
						<input type="file" accept="" class="form-control form-control-alternative" placeholder="" name="berkas">
						<input type="hidden" accept="" class="form-control form-control-alternative" placeholder="" value="<?php echo $r['berkas'];?>" name="berkas_lama">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Status Usulan</label>
					<div class="col-md-9">
						<input type="radio"  class="form-control-alternative" placeholder="" name="status" value="1" id="draft" <?php echo $r['id_status_usulan'] == "1" ? "checked" : ""; ?> > <label for="draft"> Draf</label><br>
						<input type="radio"  class="form-control-alternative" placeholder="" name="status" value="3" id="ajukan" <?php echo $r['id_status_usulan'] == "3" ? "checked" : ""; ?>> <label for="ajukan"> Ajukan</label>
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