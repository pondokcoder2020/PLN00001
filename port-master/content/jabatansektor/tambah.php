<form action="aksi-tambah-jabatansektor" method="POST" enctype="multipart/form-data">
	<div class="modal-dialog modal-md a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Tambah</h5>
			</div>
			<div class="modal-body" id="form-data">
                <div class="form-group focused">
                    <label class="form-control-label">Nama Jabatan</label>
                    <input type="text"  class="form-control form-control-alternative" placeholder="Jabatan" name="nama" autofocus required>
                </div>
				<div class="form-group focused">
                    <label class="form-control-label">Atasan</label>
                    <select name="uid_atasan" class="form-control">
						<option value="">Tidak Ada</option>
						<?php
						$tampil=pg_query($conn,"SELECT uid, nama FROM master_jabatan WHERE deleted_at IS NULL AND id_level='2' ORDER BY nama");
						while($r=pg_fetch_array($tampil)){
							echo"<option value='$r[uid]'>$r[nama]</option>";
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
