<?php
$d=pg_fetch_array(pg_query($conn,"SELECT * FROM master_unit WHERE uid='$_SESSION[uid_unit]'"));
?>

<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile Unit</li>
                </ol>
            </nav>
            <h4 class="m-0">Data Profile Unit</h4>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">DATA</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr><td width="150px">Kode</td><td width="10px">:</td><td><?php echo $d['kode'];?></td></tr>
                        <tr><td width="150px">Nama</td><td width="10px">:</td><td><?php echo $d['nama'];?></td></tr>
                        <tr><td>No. Telepon</td><td>:</td><td><?php echo $d['no_telepon'];?></td></tr>
                        <tr><td>Alamat</td><td>:</td><td><?php echo $d['alamat'];?></td></tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <form method="POST" action="aksi-edit-unit" enctype="multipart/form-data">
                    <div class="card-header">EDIT</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label class="col-md-4 text-right pt-2">Nama</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="nama" value="<?php echo $d['nama'];?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-4 text-right pt-2">No. Telepon</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control phone" name="no_telepon" value="<?php echo $d['no_telepon'];?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-4 text-right pt-2">Alamat</label>
                            <div class="col-md-8">
                                <textarea name="alamat" class="form-control"><?php echo $d['alamat'];?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> SIMPAN</button></div>
                </form>
            </div>
        </div>
    </div>
</div>