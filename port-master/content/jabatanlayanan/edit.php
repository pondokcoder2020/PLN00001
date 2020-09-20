<?php
$d=pg_fetch_array(pg_query($conn,"SELECT * FROM master_jabatan WHERE uid='$_POST[id]'"));
?>
<form action="aksi-edit-jabatanlayanan" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="uid" value="<?php echo $_POST['id'];?>">
	<div class="modal-dialog modal-md a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Edit</h5>
			</div>
			<div class="modal-body" id="form-data">
                 <div class="form-group focused">
                    <label class="form-control-label">Nama Jabatan</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Jabatan" name="nama" autofocus required value="<?php echo $d['nama'];?>">
				</div>
				<div class="form-group focused">
                    <label class="form-control-label">Atasan</label>
                    <select name="uid_atasan" class="form-control">
						<option value="">Tidak Ada</option>
						<?php
						$tampil=pg_query($conn,"SELECT uid, nama FROM master_jabatan WHERE deleted_at IS NULL AND uid!='$d[uid]' AND id_level='3' ORDER BY nama");
						while($r=pg_fetch_array($tampil)){
							if($r['uid']==$d['uid_parent']){
								echo"<option value='$r[uid]' selected>$r[nama]</option>";
							}
							else{
								echo"<option value='$r[uid]'>$r[nama]</option>";
							}
						}
						?>
					</select>
                </div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success btn-md"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" class="btn btn-danger btn-md" data-dismiss="modal"><i class="fa fa-ban"></i> Batal</button>
			</div>
		</div>
	</div>
</form>