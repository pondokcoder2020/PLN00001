<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Approval Training</li>
                </ol>
            </nav>
            <h4 class="m-0">Data Permintaan Approval</h4>
        </div>
        <!-- <button type="button" class="btn btn-info ml-3" onclick="tambah_data('tambah-identitas')"><i class="fa fa-plus"></i> Tambah</button> -->
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
                
                $ubah="";
                if($pegawai['uid_jabatan']=='5f861064-3019-82b6-edc7-97be309a02d0'){
                    $status='3';
                    $ubah='7';
                }
                if($pegawai['uid_jabatan']=='ec61e0f7-d6b2-2ede-e679-f862b41ed9d2'){
                    $status='7';
                    $ubah='11';
                }
                if($pegawai['uid_jabatan']=='ac99005c-ac71-4c0c-a4d1-50862b4a433b'){
                    $status='11';
                    $ubah='13';
                }
                else{
                    $status="3";
                }

                $no=1;
                $query="SELECT a.*,b.nama as unit,c.nama as pegawai,d.nama as sertifkat,e.nama as status FROM training_usulan a LEFT JOIN master_unit b ON a.uid_unit=b.uid LEFT JOIN master_pegawai c ON a.uid_pegawai=c.uid LEFT JOIN master_sertifikat d ON a.uid_sertifikat=d.uid_sertifikat LEFT JOIN status_usulan e ON a.id_status_usulan=e.id WHERE a.id_status_usulan='$status' ";
                $tampil=pg_query($conn,$query);
                while($r=pg_fetch_array($tampil)){
                    if($ubah==""){
                        $ubah=$r['id_status_usulan'];
                    }

                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $r['nomor_usulan'];?></td>
                        <td><?php echo date('d/m/Y',strtotime($r['tanggal_pelaksanaan']));?></td>
                        <td><?php echo $r['sertifkat'];?></td>
                        <td><?php echo $r['unit'];?></td>
                        <td><?php echo $r['pegawai'];?></td>
                        <td><a download="../../document/<?php echo $r['berkas'];?>" href="../../document/<?php echo $r['berkas'];?>">Lihat</a></td>
                        <td><?php echo $r['status'];?></td>
                        <td>
                            
                            <button type="button" rel="tooltip" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Approve?" onclick="approved_btn('<?php echo $r['uid']?>','approved-<?php echo $ubah;?>')">
                                <i class="fa fa-check"></i>
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