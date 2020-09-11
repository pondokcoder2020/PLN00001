<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Master Pegawai</li>
                </ol>
            </nav>
            <h4 class="m-0">Data Pegawai</h4>
        </div>
        <button type="button" class="btn btn-info ml-3" onclick="tambah_data('tambah-master-pegawai')"><i class="fa fa-plus"></i> Tambah</button>
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
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Unit</th>
                            <th>Kategori</th>
                            <th>Bidang</th>
                            <th>Jabatan</th>
                            <th>Perusahaan</th>
                            <th>Foto</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT a.uid,a.nip,a.nama,a.id_jenkel,a.foto,b.nama as unit,c.nama as kategori,d.nama as jabatan,e.nama as bidang,f.nama_perusahaan as perusahaan FROM master_pegawai a LEFT JOIN master_unit b ON a.uid_unit=b.uid LEFT JOIN master_kategori_personil c ON a.kategori=c.uid LEFT JOIN master_jabatan d ON a.jabatan=d.uid LEFT JOIN master_bidang e ON a.bidang=e.uid LEFT JOIN master_perusahaan f ON a.perusahaan=f.uid WHERE a.deleted_at IS NULL ORDER BY a.nama ASC");
                        while($r=pg_fetch_array($tampil)){
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $r['nip'];?></td>
                                <td><?php echo $r['nama'];?></td>
                                <td><?php echo $r['id_jenkel'] == "P" ? "Perempuan" : "Laki-laki";?></td>
                                <td><?php echo $r['unit'];?></td>
                                <td><?php echo $r['kategori'];?></td>
                                <td><?php echo $r['bidang'];?></td>
                                <td><?php echo $r['jabatan'];?></td>
                                <td><?php echo $r['perusahaan'];?></td>
                                <td><img src="../images/pegawai/<?php echo $r['foto'] ? $r['foto'] : 'default.jpg';?>" width="100"></td>
                                <td>
                                    <button type="button" rel="tooltip" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit" onclick="edit_data('<?php echo $r['uid'];?>','edit-master-pegawai')">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    
                                    <button type="button" rel="tooltip" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="hapus_data('<?php echo $r['uid'];?>','aksi-hapus-master-pegawai')">
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
	
<script type="text/javascript" src="addons/js/myscript.js"></script>