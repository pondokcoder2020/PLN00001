<?php
switch($_GET['act']){
default:
?>
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Unit Sektor</li>
                </ol>
            </nav>
            <h4 class="m-0">Data Unit Sektor</h4>
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
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>No. Telepon</th>
                            <th>Alamat</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        $tampil=pg_query($conn,"SELECT * FROM master_unit WHERE id_level='2' AND deleted_at IS NULL ORDER BY kode");
                        while($r=pg_fetch_array($tampil)){
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $r['kode'];?></td>
                                <td><a href="view-unitsektor-<?php echo $r['uid'];?>"><?php echo $r['nama'];?></a></td>
                                <td><?php echo $r['no_telepon'];?></td>
                                <td><?php echo $r['alamat'];?></td>
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
	
<script type="text/javascript" src="addons/js/unitsektor.js"></script>
<?php
break;

case "view":
    include "view.php";
break;
}
?>