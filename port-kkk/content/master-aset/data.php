<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Master Aset</li>
                </ol>
            </nav>
            <h4 class="m-0">Data Aset</h4>
        </div>
        <button type="button" class="btn btn-info ml-3" onclick="tambah_data('tambah-master-aset')"><i class="fa fa-plus"></i> Tambah</button>
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
                            <th>Kategori</th>
                            <th>Varian</th>
                            <th>Item</th>
                            <th>Klasifikasi</th>
                            <th>Unit</th>
                            <th>Kode Aset</th>
                            <th>SN</th>
                            <th>Tgl Beli</th>
                            <th>Lokasi Penempatan</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT a.uid,a.serial_number,a.kode_aset,a.tanggal_beli,b.nama as kategori,c.nama as varian,d.nama as item,e.nama as unit,f.nama as lokasi_penempatan,g.nama as klasifikasi FROM master_asset a LEFT JOIN master_item_kategori b ON a.kategori=b.uid LEFT JOIN master_item_varian c ON a.varian=c.uid LEFT JOIN master_item d ON a.uid_item=d.uid LEFT JOIN master_unit e ON a.uid_unit=e.uid LEFT JOIN master_lokasi_penempatan f ON a.lokasi_penempatan=f.uid LEFT JOIN master_klasifikasi g ON b.klasifikasi=g.uid WHERE a.deleted_at IS NULL ORDER BY b.nama ASC");
                        while($r=pg_fetch_array($tampil)){
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $r['kategori'];?></td>
                                <td><?php echo $r['varian'];?></td>
                                <td><?php echo $r['item'];?></td>
                                <td><?php echo $r['klasifikasi'];?></td>
                                <td><?php echo $r['unit'];?></td>
                                <td><?php echo $r['kode_aset'];?></td>
                                <td><?php echo $r['serial_number'];?></td>
                                <td><?php echo DateToIndo3($r['tanggal_beli']);?></td>
                                <td><?php echo $r['lokasi_penempatan'];?></td>
                                <td>
                                    <button type="button" rel="tooltip" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit" onclick="edit_data('<?php echo $r['uid'];?>','edit-master-aset')">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    
                                    <button type="button" rel="tooltip" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="hapus_data('<?php echo $r['uid'];?>','aksi-hapus-master-aset')">
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