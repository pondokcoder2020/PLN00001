<form action="aksi-tambah-training" method="POST" enctype="multipart/form-data">
	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Tambah</h5>
			</div>
			<div class="modal-body" id="form-data">
                <div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Nomor Usulan</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="nomor_usulan" autofocus>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Tanggal Pelaksanaan</label>
					<div class="col-md-9">
						<input type="date"  class="form-control form-control-alternative" placeholder="" name="tanggal_pelaksanaan">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Pelatihan/Sertifikat</label>
					<div class="col-md-9">
						<select class="form-control select2" style="width: 100%;" name="uid_sertifikat" required="">
							<option value="">Pilih</option>
							<?php
								$q=pg_query($conn,"SELECT * FROM master_sertifikat ORDER BY nama ASC");
								while ($r=pg_fetch_array($q)){
									echo '<option value="'.$r['uid_sertifikat'].'">'.$r['nama'].'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<!-- <div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Berkas</label>
					<div class="col-md-9">
						<input type="file" accept="" class="form-control form-control-alternative" placeholder="" name="berkas">
					</div>
				</div> -->
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Pegawai</label>
					<div class="col-md-9">
						<select name="uid_pegawai[]" class="form-control select2"  multiple="multiple" style="width: 100%;">
							<?php
							$q=pg_query($conn,"SELECT a.* FROM master_pegawai a INNER JOIN master_jabatan b ON a.uid_jabatan=b.uid  WHERE a.uid_unit='$_SESSION[uid_unit]'");
							while($r=pg_fetch_array($q)){
								echo '<option value="'.$r['uid'].'">'.$r['nama'].'</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Keterangan</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="keterangan">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Status Usulan</label>
					<div class="col-md-9">
						<input type="radio"  class="form-control-alternative" placeholder="" name="status" value="1" id="draft"> <label for="draft"> Draf</label><br>
						<input type="radio"  class="form-control-alternative" placeholder="" name="status" value="3" id="ajukan"> <label for="ajukan"> Ajukan</label>
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
<script type="text/javascript">
	$('.select2').select2({
		dropdownParent: $('#form-modal')
	});
</script>