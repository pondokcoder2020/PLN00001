<?php
$q=pg_query($conn,"SELECT * FROM training_usulan_pegawai WHERE uid='$_POST[id]'");
$rx=pg_fetch_array($q);
?>
<form action="aksi-edit-usulan-pegawai" method="POST" enctype="multipart/form-data">

	<input type="hidden" name="uid" value="<?php echo $rx['uid'];?>">

	<div class="modal-dialog modal-lg a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Tambah</h5>
			</div>
			<div class="modal-body" id="form-data">
                <div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Usulan Training</label>
					<div class="col-md-9">
						<select name="uid_usulan" class="form-control" required="">
							<option value="">Pilih</option>
							<?php
							$q=pg_query($conn,"SELECT * FROM training_usulan");
							while($r=pg_fetch_array($q)){
								$select = $rx['uid_usulan'] == $r['uid'] ? 'selected' : '';
								echo '<option value="'.$r['uid'].'" '.$select.'>Nomor '.$r['nomor_usulan'].' -- Tanggal '.date('d/m/Y',strtotime($r['tanggal_pelaksanaan'])).'</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group focused row">
					<label class="form-control-label col-md-3 pt-2">Pegawai</label>
					<div class="col-md-9">
						<select name="uid_pegawai" class="form-control" required="">
							<option value="">Pilih</option>
							<?php
							$q=pg_query($conn,"SELECT * FROM master_pegawai WHERE uid_unit='$_SESSION[uid_unit]'");
							while($r=pg_fetch_array($q)){
								$selectx = $rx['uid_pegawai'] == $r['uid'] ? 'selected' : '';
								echo '<option value="'.$r['uid'].'" '.$selectx.'>'.$r['nama'].'</option>';
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
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success btn-md"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" class="btn btn-danger btn-md" data-dismiss="modal"><i class="fa fa-ban"></i> Batal</button>
			</div>
		</div>
	</div>
</form>