<div class="text-right">
    <button type="button" class="btn btn-info ml-3" onclick="tambah_data('tambah-usulan-pegawai')"><i class="fa fa-plus"></i> Tambah</button>
</div>
<br>
<br>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" style="width:100%" >
            <thead> 
                <tr>
                    <th width="50px">No.</th>
                    <th>No. Usulan</th>
                    <th>Sertifikat/Pelatihan</th>
                    <th>Pegawai</th>
                    <th>Keterangan</th>
                    <th>Berkas</th>
                    <th>Status</th>
                    <th width="100px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $tampil=pg_query($conn,"SELECT a.*,b.nomor_usulan,b.id_status_usulan,b.berkas,c.nama as pegawai,d.nama as sertifikat,e.nama as status FROM training_usulan_pegawai a LEFT JOIN training_usulan b ON a.uid_usulan=b.uid LEFT JOIN master_pegawai c ON a.uid_pegawai=c.uid LEFT JOIN master_sertifikat d ON b.uid_sertifikat=d.uid_sertifikat LEFT JOIN status_usulan e ON b.id_status_usulan=e.id WHERE selesai_training IS NULL AND a.deleted_at IS NULL ORDER BY d.nama ASC");
                while($r=pg_fetch_array($tampil)){
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $r['nomor_usulan'];?></td>
                        <td><?php echo $r['sertifikat'];?></td>
                        <td><?php echo $r['pegawai'];?></td>
                        <td><?php echo $r['keterangan'];?></td>
                        <td>
                            <?php if($r['berkas'] !=""){
                            ?>
                            <a download="../document/<?php echo $r['berkas'];?>" href="../document/<?php echo $r['berkas'];?>">Download</a>
                            <?php } ?>
                        </td>
                        <td><?php echo $r['status'];?></td>
                        <td>
                            <?php
                            if($r['id_status_usulan']=="13"){
                            ?>
                            <button onclick="edit_data('<?php echo $r['uid']?>','entry-sertifikat')" class="btn btn-sm btn-primary" data-placement="top" title="Input Nomor Sertifikat">
                                <i class="fa fa-briefcase"></i>
                            </button>

                            <?php } ?>

                            <?php
                            if($r['id_status_usulan']=="1" OR $r['id_status_usulan']=="3" OR $r['id_status_usulan']=="5" OR $r['id_status_usulan']=="9"){
                            ?>

                            <button onclick="edit_data('<?php echo $r['uid']?>','edit-usulan-pegawai')" class="btn btn-sm btn-warning" data-placement="top" title="Edit">
                                <i class="fa fa-edit"></i>
                            </button>
                            
                            <button type="button" class="btn btn-sm btn-danger" data-placement="top" title="Hapus" onclick="hapus_data('<?php echo $r['uid']?>','aksi-hapus-usulan-pegawai')">
                                <i class="fa fa-trash"></i>
                            </button>
                            <?php } ?>
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