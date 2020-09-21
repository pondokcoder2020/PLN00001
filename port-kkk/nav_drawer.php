<?php
$module=$_GET['module'];
?>
<div class="mdk-drawer__content">
    <div class="sidebar sidebar-light sidebar-left simplebar" data-simplebar>
        <div class="sidebar-heading sidebar-m-t">Menu</div>
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item <?php if($module=='home'){echo "active";}?>">
                <a class="sidebar-menu-button" href="home">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                    <span class="sidebar-menu-text">Dashboard</span>
                </a>
            </li>
            <?php
                $no=1;
                $tampil=pg_query($conn,"SELECT * FROM master_aset_kategori");
                while($rw=pg_fetch_array($tampil)){
                    if($no % 2 == 0){
                        $ic="box";
                    }
                    else{
                        $ic="fire";
                    }
            ?>
            <li class="sidebar-menu-item <?php if($module=='identitasparam'){echo "active open";}?>">
                <a class="sidebar-menu-button" data-toggle="collapse" href="#fps<?php echo $no;?>">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left fa fa-<?php echo $ic;?>"></i>
                    <span class="sidebar-menu-text"><?php echo $rw['nama'];?></span>
                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                </a>
                <ul class="sidebar-submenu collapse" id="fps<?php echo $no;?>">
                    <?php
                        $menux=pg_query($conn,"SELECT * FROM master_aset_subkategori WHERE id_kategori=".$rw['id']);
                        while($rx=pg_fetch_array($menux)){
                    ?>
                    <li class="sidebar-menu-item <?php if($_GET['id']==$rx['id']){echo "active";}?>">
                        <a class="sidebar-menu-button" href="view-identitasparam-<?php echo $rx['id'];?>">
                            <span class="sidebar-menu-text"><?php echo $rx['nama'];?></span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php $no ++; } ?>
            <li class="sidebar-menu-item">
                <a class="sidebar-menu-button" href="training">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left fa fa-users"></i>
                    <span class="sidebar-menu-text">Training</span>
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a class="sidebar-menu-button" href="keluar">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left fa fa-sign-out-alt"></i>
                    <span class="sidebar-menu-text">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>