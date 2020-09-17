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
            <li class="sidebar-menu-item <?php if($module=='unit'){echo "active";}?>">
                <a class="sidebar-menu-button" href="unit">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_balance</i>
                    <span class="sidebar-menu-text">Profile Unit</span>
                </a>
            </li>
            <?php
            if($_SESSION['id_level']=='1'){
            ?>
            <li class="sidebar-menu-item <?php if($module=='unitsektor'){echo "active";}?>">
                <a class="sidebar-menu-button" href="unitsektor">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">receipt</i>
                    <span class="sidebar-menu-text">Unit Sektor</span>
                </a>
            </li>
            <?php
            }
            else if($_SESSION['id_level']=='2'){
            ?>
            <li class="sidebar-menu-item <?php if($module=='unitlayanan'){echo "active";}?>">
                <a class="sidebar-menu-button" href="unitlayanan">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">receipt</i>
                    <span class="sidebar-menu-text">Unit Layanan</span>
                </a>
            </li>
            <?php 
            }
            ?>
            
            <li class="sidebar-menu-item <?php if($module=='pegawai' OR $module=='jabatan' OR $module=='bidang'){echo "active open";}?>">
                <a class="sidebar-menu-button" data-toggle="collapse" href="#laporan">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">people</i>
                    <span class="sidebar-menu-text">Manajemen Kepegawaian</span>
                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                </a>
                <ul class="sidebar-submenu collapse" id="laporan">
                    <li class="sidebar-menu-item <?php if($module=='jabatan'){echo "active";}?>">
                        <a class="sidebar-menu-button" href="jabatan">
                            <span class="sidebar-menu-text">Jabatan</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item <?php if($module=='bidang'){echo "active";}?>">
                        <a class="sidebar-menu-button" href="bidang">
                            <span class="sidebar-menu-text">Bidang</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item <?php if($module=='pegawai'){echo "active";}?>">
                        <a class="sidebar-menu-button" href="pegawai">
                            <span class="sidebar-menu-text">Pegawai</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--<li class="sidebar-menu-item <?php if($module=='struktur'){echo "active";}?>">
                <a class="sidebar-menu-button" href="struktur">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">apps</i>
                    <span class="sidebar-menu-text">Struktur Jabatan</span>
                </a>
            </li>-->
               
            <li class="sidebar-menu-item <?php if($module=='profile'){echo "active";}?>">
                <a class="sidebar-menu-button" href="profile">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person</i>
                    <span class="sidebar-menu-text">My Profile</span>
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