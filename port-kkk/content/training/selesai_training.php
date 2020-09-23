
<br>
<br>
<div class="card-body">
    <div class="table-responsive">
        <table id="example2" class="table table-bordered table-striped table-hover" style="width:100%" >
            <thead> 
                <tr>
                    <th width="50px">No.</th>
                    <th>No. Usulan</th>
                    <th>Sertifikat/Pelatihan</th>
                    <th>Pegawai</th>
                    <th>No. Sertifikat</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $tampil=pg_query($conn,"SELECT a.*,b.nomor_usulan,b.id_status_usulan,c.nama as pegawai,d.nama as sertifikat,e.nomor as no_sertifikat,e.keterangan as ket_sertifikat FROM training_usulan_pegawai a LEFT JOIN training_usulan b ON a.uid_usulan=b.uid LEFT JOIN master_pegawai c ON a.uid_pegawai=c.uid LEFT JOIN master_sertifikat d ON b.uid_sertifikat=d.uid_sertifikat LEFT JOIN pegawai_sertifikat e ON a.uid_pegawai=e.uid_pegawai WHERE selesai_training IS NOT NULL ORDER BY d.nama ASC");
                while($r=pg_fetch_array($tampil)){
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $r['nomor_usulan'];?></td>
                        <td><?php echo $r['sertifikat'];?></td>
                        <td><?php echo $r['pegawai'];?></td>
                        <td><?php echo $r['no_sertifikat'];?></td>
                        <td><?php echo $r['ket_sertifikat'];?></td>
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