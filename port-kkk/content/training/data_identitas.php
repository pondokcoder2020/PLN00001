<div class="text-right">
    <button type="button" class="btn btn-info ml-3" onclick="tambah_data('tambah-training')"><i class="fa fa-plus"></i> Tambah</button>
</div>
<br>
<br>
<div class="card-body">
    <div class="table-responsive">
        <table id="example" class="table table-bordered table-striped table-hover" style="width:100%" >
            <thead> 
                <tr>
                    <th width="50px">No.</th>
                    <th>Nomor Usulan</th>
                    <th>Tanggal Pelaksanaan</th>
                    <th>Nama Training</th>
                    <th>Unit</th>
                    <th>Pengusul</th>
                    <th>Berkas</th>
                    <th>Status</th>
                    <th width="100px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $tampil=pg_query($conn,"SELECT a.*,b.nama as unit,c.nama as pegawai,d.nama as sertifkat FROM training_usulan a LEFT JOIN master_unit b ON a.uid_unit=b.uid LEFT JOIN master_pegawai c ON a.uid_pegawai=c.uid LEFT JOIN master_sertifikat d ON a.uid_sertifikat=b.uid");
                while($r=pg_fetch_array($tampil)){
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $r['nomor_usulan'];?></td>
                        <td><?php echo $r['tanggal_pelaksanaan'];?></td>
                        <td><?php echo $r['sertifkat'];?></td>
                        <td><?php echo $r['unit'];?></td>
                        <td><?php echo $r['pegawai'];?></td>
                        <td><?php echo $r['berkas'];?></td>
                        <td>
                            <button onclick="edit_data('<?php echo $r['uid']?>','edit-identitas')" rel="tooltip" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
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