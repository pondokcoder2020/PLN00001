<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="home"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Jabatan Sektor</li>
                </ol>
            </nav>
            <h3 class="m-0">Jabatan Sektor</h3>
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
                            <th>Nama</th>
                            <th>Atasan</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT uid, nama, uid_parent FROM master_jabatan WHERE deleted_at IS NULL AND id_level='2' ORDER BY nama");
                        while($r=pg_fetch_array($tampil)){
                            $a=pg_fetch_array(pg_query($conn,"SELECT nama FROM master_jabatan WHERE uid='$r[uid_parent]' AND deleted_at IS NULL"));
                            if($a['nama']!=''){
                                $atasan=$a['nama'];
                            }
                            else{
                                $atasan="-";
                            }
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $r['nama'];?></td>
                                <td><?php echo $atasan;?></td>
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
	
<script type="text/javascript" src="addons/js/jabatansektor.js"></script>