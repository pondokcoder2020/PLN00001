<div class="text-right">
    <button type="button" class="btn btn-info ml-3" onclick="tambah_data('tambah-identitas-<?php echo $_GET['id']; ?>')"><i class="fa fa-plus"></i> Tambah</button>
</div>
<br>
<br>
<div class="card-body">
    <div class="table-responsive">
        <table id="example" class="table table-bordered table-striped table-hover" style="width:100%" >
            <thead> 
                <tr>
                    <th width="50px">No.</th>
                    <th>Nama</th>
                    <th>Merk</th>
                    <th>Kapasitas</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Tgl Beli</th>
                    <th>Lokasi Penempatan</th>
                    <th>Varian</th>
                    <th>Keterangan</th>
                    <th width="100px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $tampil=pg_query($conn,"SELECT a.*,b.nama as varian,c.nama as kapasitas FROM master_aset_subkategori_identitas a LEFT JOIN varian b ON a.id_varian=b.id LEFT JOIN kapasitas c ON a.kapasitas=c.id WHERE a.id_subkategori='$_GET[id]' ORDER BY a.nama ASC");
                while($r=pg_fetch_array($tampil)){
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $r['nama'];?></td>
                        <td><?php echo $r['merk'];?></td>
                        <td><?php echo $r['kapasitas'];?></td>
                        <td><?php echo $r['jumlah'];?></td>
                        <td><?php echo $r['satuan'];?></td>
                        <td><?php echo date('d/m/Y',strtotime($r['tanggal_beli']));?></td>
                        <td><?php echo $r['lokasi_penempatan'];?></td>
                        <td><?php echo $r['varian'];?></td>
                        <td><?php echo $r['keterangan'];?></td>
                        <td>
                            <button onclick="edit_data('<?php echo $r['id']?>','edit-identitas-<?php echo $_GET['id']?>')" rel="tooltip" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="fa fa-edit"></i>
                            </button>
                            
                            <button type="button" rel="tooltip" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="hapus_data('<?php echo $r['id']?>','aksi-hapus-identitas')">
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
	
<script type="text/javascript" src="addons/js/myscript.js"></script>