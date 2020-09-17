<div class="text-right">
    <button type="button" class="btn btn-info ml-3" onclick="tambah_data('tambah-admin-unitsektor-<?php echo $_GET['id']?>')"><i class="fa fa-plus"></i> Tambah</button>
    <br>
    <br>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table id="data_sektor" class="table table-bordered table-striped table-hover" style="width:100%" >
            <thead> 
                <tr>
                    <th width="50px">No.</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Unit</th>
                    <th>Foto</th>
                    <th width="100px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $tampil=pg_query($conn,"SELECT a.uid,a.uid_unit,a.nip,a.nama,a.id_jenkel,a.foto,b.nama as unit FROM master_pegawai a LEFT JOIN master_unit b ON a.uid_unit=b.uid WHERE a.deleted_at IS NULL AND b.id_level='2' AND uid_jabatan IS NULL AND a.uid_unit='$_GET[id]' ORDER BY a.nama ASC");
                while($r=pg_fetch_array($tampil)){
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $r['nip'];?></td>
                        <td><?php echo $r['nama'];?></td>
                        <td><?php echo $r['id_jenkel'] == "P" ? "Perempuan" : "Laki-laki";?></td>
                        <td><?php echo $r['unit'];?></td>
                        <td><img src="../images/pegawai/<?php echo $r['foto'] ? $r['foto'] : 'default.jpg';?>" width="100"></td>
                        <td>
                            <button onclick="edit_data('<?php echo $r['uid'];?>','edit-admin-unitsektor')" rel="tooltip" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="fa fa-edit"></i>
                            </button>
                            
                            <button type="button" rel="tooltip" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="hapus_data('<?php echo $r['uid'];?>','aksi-hapus-admin-unitsektor')">
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
