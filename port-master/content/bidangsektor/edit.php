<?php
$d=pg_fetch_array(pg_query($conn,"SELECT * FROM master_bidang WHERE uid='$_POST[id]'"));
?>
<form action="aksi-edit-bidangsektor" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="uid" value="<?php echo $_POST['id'];?>">
	<div class="modal-dialog modal-md a-lightSpeed">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-standard-title">Edit</h5>
			</div>
			<div class="modal-body" id="form-data">
                 <div class="form-group focused">
                    <label class="form-control-label">Nama Bidang</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Bidang" name="nama" autofocus required value="<?php echo $d['nama'];?>">
				</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success btn-md"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" class="btn btn-danger btn-md" data-dismiss="modal"><i class="fa fa-ban"></i> Batal</button>
			</div>
		</div>
	</div>
</form>