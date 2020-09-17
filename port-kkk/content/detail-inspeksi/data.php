<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Master Inspeksi Peralatan</li>
                </ol>
            </nav>
            <?php
                $da=pg_query($conn,"SELECT * FROM master_aset_kategori WHERE id=".$_GET['id']);
            ?>
            <h4 class="m-0">Data <?php echo pg_fetch_array($da)['nama']; ?></h4>
        </div>
        <button type="button" class="btn btn-info ml-3" onclick="tambah_data('tambah-detail-inspeksi-<?php echo $_GET['id'];?>')"><i class="fa fa-plus"></i> Tambah</button>
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
                            <th width="100px">Tools</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT * FROM master_aset_subkategori WHERE id_kategori=".$_GET['id']);
                        while($r=pg_fetch_array($tampil)){
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $r['nama'];?></td>
                                <td>
                                    <a href="identitas-<?php echo $r['id'];?>" rel="tooltip" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Identitas">
                                        Identitas
                                    </a>

                                    <a href="parameter-<?php echo $r['id'];?>" rel="tooltip" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Parameter">
                                        Parameter
                                    </a>
                                </td>
                                <td>
                                    <button type="button" rel="tooltip" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit" onclick="edit_data('<?php echo $r['id'];?>','edit-detail-inspeksi')">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    
                                    <button type="button" rel="tooltip" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="hapus_data('<?php echo $r['id'];?>','aksi-hapus-detail-inspeksi-<?php echo $_GET['id']?>')">
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