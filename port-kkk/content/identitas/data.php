<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page">Master Inspeksi Peralatan</li>
                    <li class="breadcrumb-item active" aria-current="page">Parameter</li>
                </ol>
            </nav>
            <?php
                $nama_param=pg_query($conn,"SELECT * FROM master_aset_subkategori WHERE id=$_GET[id]");

            ?>
            <h4 class="m-0">Data Parameter <?php echo pg_fetch_array($nama_param)['nama']; ?></h4>
        </div>
        <button type="button" class="btn btn-info ml-3" onclick="tambah_data('tambah-identitas-<?php echo $_GET['id']?>')"><i class="fa fa-plus"></i> Tambah</button>
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
                            <th>Unit</th>
                            <th>Nama Peralatan</th>
                            <th>Merk</th>
                            <th>Kapasitas</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Keterangan</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT a.*,b.nama as unit FROM master_aset_subkategori_identitas a LEFT JOIN master_unit b ON a.unit=b.uid WHERE a.id_subkategori=$_GET[id] ORDER BY a.nama ASC");
                        while($r=pg_fetch_array($tampil)){
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $r['unit'];?></td>
                                <td><?php echo $r['nama'];?></td>
                                <td><?php echo $r['merk'];?></td>
                                <td><?php echo $r['kapasitas'];?></td>
                                <td><?php echo $r['jumlah'];?></td>
                                <td><?php echo $r['satuan'];?></td>
                                <td><?php echo $r['keterangan'];?></td>
                                <td>
                                    <button type="button" rel="tooltip" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit" onclick="edit_data('<?php echo $r['id'];?>','edit-identitas')">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    
                                    <button type="button" rel="tooltip" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="hapus_data('<?php echo $r['id'];?>','aksi-hapus-identitas-<?php echo $_GET['id']?>')">
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