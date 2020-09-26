<div class="text-right">
    <button type="button" class="btn btn-info ml-3" onclick="tambah_data('tambah-parameter-<?php echo $_GET['id']; ?>')"><i class="fa fa-plus"></i> Tambah</button>
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
                    <th width="100px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $tampil=pg_query($conn,"SELECT * FROM master_aset_subkategori_parameter WHERE id_subkategori='$_GET[id]' AND deleted_at IS NULL  ORDER BY nama ASC");
                while($r=pg_fetch_array($tampil)){
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $r['nama'];?></td>
                        <td>
                            <button onclick="edit_data('<?php echo $r['id']?>','edit-parameter-<?php echo $_GET['id']?>')" rel="tooltip" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="fa fa-edit"></i>
                            </button>
                            
                            <button type="button" class="btn btn-sm btn-danger"  title="Hapus" onclick="hapus_data('<?php echo $r['id']?>','aksi-hapus-parameter')">
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