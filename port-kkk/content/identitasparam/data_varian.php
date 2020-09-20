<div class="text-right">
    <button type="button" class="btn btn-info ml-3" onclick="tambah_data('tambah-varian-<?php echo $_GET['id']; ?>')"><i class="fa fa-plus"></i> Tambah</button>
</div>
<br>
<br>
<div class="card-body">
    <div class="table-responsive">
        <table id="example" class="table table-bordered table-striped table-hover" style="width:100%" >
            <thead> 
                <tr>
                    <th width="50px">No.</th>
                    <th>Nama Varian</th>
                    <th>Keterangan</th>
                    <th width="100px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $tampil=pg_query($conn,"SELECT * FROM varian WHERE id_subkategori='$_GET[id]' ORDER BY nama ASC");
                while($r=pg_fetch_array($tampil)){
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $r['nama'];?></td>
                        <td><?php echo $r['keterangan'];?></td>
                        <td>
                            <button onclick="edit_data('<?php echo $r['id']?>','edit-varian-<?php echo $r['id']?>')" class="btn btn-sm btn-warning" data-placement="top" title="Edit">
                                <i class="fa fa-edit"></i>
                            </button>
                            
                            <button type="button" class="btn btn-sm btn-danger" data-placement="top" title="Hapus" onclick="hapus_data('<?php echo $r['id']?>','aksi-hapus-varian')">
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