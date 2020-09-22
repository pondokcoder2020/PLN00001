<div class="text-right">
    <button type="button" class="btn btn-info ml-3" onclick="tambah_data('tambah-usulan-pegawai')"><i class="fa fa-plus"></i> Tambah</button>
</div>
<br>
<br>
<div class="card-body">
    <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped table-hover" style="width:100%" >
            <thead> 
                <tr>
                    <th width="50px">No.</th>
                    <th>No. Usulan</th>
                    <th>Sertifikat/Pelatihan</th>
                    <th>Pegawai</th>
                    <th>Keterangan</th>
                    <th width="100px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $tampil=pg_query($conn,"SELECT a.*,b.nomor_usulan,c.nama as pegawai,d.nama as sertifikat FROM training_usulan_pegawai a LEFT JOIN training_usulan b ON a.uid_usulan=b.uid LEFT JOIN master_pegawai c ON a.uid_pegawai=c.uid LEFT JOIN master_sertifikat d ON b.uid_sertifikat=d.uid_sertifikat ORDER BY d.nama ASC");
                while($r=pg_fetch_array($tampil)){
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $r['nomor_usulan'];?></td>
                        <td><?php echo $r['sertifikat'];?></td>
                        <td><?php echo $r['pegawai'];?></td>
                        <td><?php echo $r['keterangan'];?></td>
                        <td>
                            <button onclick="edit_data('<?php echo $r['uid']?>','edit-usulan-pegawai')" class="btn btn-sm btn-warning" data-placement="top" title="Edit">
                                <i class="fa fa-edit"></i>
                            </button>
                            
                            <button type="button" class="btn btn-sm btn-danger" data-placement="top" title="Hapus" onclick="hapus_data('<?php echo $r['uid']?>','aksi-hapus-usulan-pegawai')">
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