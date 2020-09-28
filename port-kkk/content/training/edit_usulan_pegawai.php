<?php
$q=pg_query($conn,"SELECT a.*,b.nomor_usulan,b.tanggal_pelaksanaan,b.uid_sertifikat,b.id_status_usulan FROM training_usulan_pegawai a LEFT JOIN training_usulan b ON a.uid_usulan=b.uid WHERE a.uid='$_POST[id]' AND a.deleted_at IS NULL");
$rx=pg_fetch_array($q);
?>
<form action="aksi-edit-training" method="POST" enctype="multipart/form-data">

	<input type="hidden"  value="<?php echo $rx['uid_usulan'];?>" name="uid">

	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Tambah</h5>
			</div>
			<div class="modal-body" id="form-data">
                <div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Nomor Usulan</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="nomor_usulan" value="<?php echo $rx['nomor_usulan'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Tanggal Pelaksanaan</label>
					<div class="col-md-9">
						<input type="date"  class="form-control form-control-alternative" placeholder="" name="tanggal_pelaksanaan" value="<?php echo date('Y-m-d',strtotime($rx['tanggal_pelaksanaan']));?>">
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
									$select= $rx['uid_sertifikat'] == $r['uid_sertifikat'] ? 'selected' : '';
									echo '<option value="'.$r['uid_sertifikat'].'" '.$select.'>'.$r['nama'].'</option>';
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
							
							function selectx($uid_usulan,$uid_pegawai){
								global $conn;

								$qu=pg_query($conn,"SELECT * FROM training_usulan_pegawai WHERE deleted_at IS NULL AND uid_usulan='$uid_usulan' AND uid_pegawai='$uid_pegawai'");

								$x=pg_num_rows($qu);
								if($x>0){
									return true;
								}
								else{
									return false;
								}
							}

							$q=pg_query($conn,"SELECT a.* FROM master_pegawai a LEFT JOIN master_jabatan b ON a.uid_jabatan=b.uid  WHERE a.uid_unit='$_SESSION[uid_unit]' AND a.uid_jabatan IS NOT NULL");

							while($r=pg_fetch_array($q)){
								$select1 = selectx($rx['uid_usulan'],$r['uid']) ? 'selected' : '';
								echo '<option value="'.$r['uid'].'" '.$select1.'>'.$r['nama'].'</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Keterangan</label>
					<div class="col-md-9">
						<input type="text"  class="form-control form-control-alternative" placeholder="" name="keterangan" value="<?php echo $rx['keterangan'];?>">
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Status Usulan</label>
					<div class="col-md-9">
						<input type="radio"  class="form-control-alternative" placeholder="" name="status" value="1" id="draft" <?php echo $rx['id_status_usulan'] == '1' ? 'checked' : '';?>> <label for="draft"> Draf</label><br>
						<input type="radio"  class="form-control-alternative" placeholder="" name="status" value="3" id="ajukan" <?php echo $rx['id_status_usulan'] == '3' ? 'checked' : '';?>> <label for="ajukan"> Ajukan</label>
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
		dropdownParent: $('#form-modal2')
	});
</script>