<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item"><a href="#">Kepegawaian</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <h3 class="m-0">Data Pegawai</h3>
        </div>
        <button type="button" class="btn btn-info ml-3 btnTambah"><i class="fa fa-plus"></i> Tambah</button>
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
                            <th>Foto</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Bidang</th>
                            <th>Status</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT a.*, b.nama AS nama_jabatan, c.nama AS nama_status FROM master_pegawai a, master_pegawai_jabatan b, master_term_data c WHERE a.deleted_at IS NULL AND a.uid_jabatan=b.uid AND a.id_kategori=c.id AND a.uid_unit='$_SESSION[uid_unit]' ORDER BY a.nama");
                        while($r=pg_fetch_array($tampil)){
                            if($r['foto']!=NULL){
                                $gambar="../images/pegawai/upload_$r[foto]";
                            }
                            else{
                                $gambar="../images/noimage.png";
                            }

                            if($r['uid_bidang']!=''){
                                $a=pg_fetch_array(pg_query($conn,"SELECT nama FROM master_pegawai_bidang WHERE uid='$r[uid_bidang]'"));
                                $bidang=$a['nama'];
                            }
                            else{
                                $bidang="-";
                            }
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td>
                                    <div class="thumbnail">
                                        <img src="<?php echo $gambar;?>" alt="Image" width="100" />
                                    </div>
                                </td>
                                <td><?php echo $r['nip'];?></td>
                                <td><?php echo $r['nama'];?></td>
                                <td><?php echo $r['nama_jabatan'];?></td>
                                <td><?php echo $bidang;?></td>
                                <td><?php echo $r['nama_status'];?></td>
                                <td>
                                    <button type="button" rel="tooltip" class="btn btn-sm btn-warning btnEdit" data-toggle="tooltip" data-placement="top" title="Edit" id="<?php echo $r['uid'];?>">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    
                                    <button type="button" rel="tooltip" class="btn btn-sm btn-danger btnHapus" data-toggle="tooltip" data-placement="top" title="Hapus" id="<?php echo $r['uid'];?>">
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
    </div>
</div>
	
<script type="text/javascript" src="addons/js/pegawai.js"></script>