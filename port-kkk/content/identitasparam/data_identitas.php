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
                    <th>Nama Perusahaan</th>
                    <th>Kode</th>
                    <th>Nomor</th>
                    <th>Nama Lokasi</th>
                    <th>Kapasitas</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Varian</th>
                    <th width="100px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $tampil=pg_query($conn,"SELECT a.*,b.nama as varian,c.nama as kapasitas FROM aset a LEFT JOIN master_aset_subkategori_varian b ON a.id_varian=b.id LEFT JOIN kapasitas c ON a.id_kapasitas=c.id WHERE  a.id_subkategori='$_GET[id]' AND  a.deleted_at IS NULL ORDER BY a.nama_perusahaan ASC");
                while($r=pg_fetch_array($tampil)){
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $r['nama_perusahaan'];?></td>
                        <td><?php echo $r['kode'];?></td>
                        <td><?php echo $r['nomor'];?></td>
                        <td><?php echo $r['nama_lokasi'];?></td>
                        <td><?php echo $r['kapasitas'];?></td>
                        <td><?php echo $r['jumlah'];?></td>
                        <td><?php echo $r['satuan'];?></td>
                        <td><?php echo $r['varian'];?></td>
                        <td>
                            <button onclick="edit_data('<?php echo $r['uid']?>','edit-identitas-<?php echo $_GET['id']?>')" rel="tooltip" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="fa fa-edit"></i>
                            </button>
                            
                            <button type="button" rel="tooltip" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="hapus_data('<?php echo $r['uid']?>','aksi-hapus-identitas')">
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