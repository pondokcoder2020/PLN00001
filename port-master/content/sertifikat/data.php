<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sertifikat</li>
                </ol>
            </nav>
            <h3 class="m-0">Data Sertifikat</h3>
        </div>
        <button type="button" class="btn btn-info ml-3" onclick="tambah_data('tambah-sertifikat')"><i class="fa fa-plus"></i> Tambah</button>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped table-hover" style="width:100%" >
                    <thead> 
                        <tr>
                            <th width="50px">No.</th>
                            <th>Nama</th>
                            <th>Tgl Awal</th>
                            <th>Tgl Akhir</th>
                            <th>Keterangan</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT * FROM master_sertifikat WHERE deleted_at IS NULL ORDER BY nama");
                        while($r=pg_fetch_array($tampil)){
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $r['nama'];?></td>
                                <td><?php echo $r['tanggal_awal'];?></td>
                                <td><?php echo $r['tanggal_akhir'];?></td>
                                <td><?php echo $r['keterangan'];?></td>
                                <td>
                                    <button type="button" rel="tooltip" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit" onclick="edit_data('<?php echo $r['uid_sertifikat'];?>','edit-sertifikat')">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    
                                    <button type="button" rel="tooltip" class="btn btn-sm btn-danger btnHapus" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="hapus_data('<?php echo $r['uid_sertifikat'];?>','aksi-hapus-sertifikat')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
	
<script type="text/javascript" src="addons/js/myscript.js"></script>