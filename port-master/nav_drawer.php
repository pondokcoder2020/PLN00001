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
                    <span class="sidebar-menu-text">Data Unit Induk</span>
                </a>
            </li>
            <li class="sidebar-menu-item <?php if($module=='unitsektor'){echo "active";}?>">
                <a class="sidebar-menu-button" href="unitsektor">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">receipt</i>
                    <span class="sidebar-menu-text">Unit Sektor</span>
                </a>
            </li>
            <li class="sidebar-menu-item <?php if($module=='unitlayanan'){echo "active";}?>">
                <a class="sidebar-menu-button" href="unitlayanan">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">apps</i>
                    <span class="sidebar-menu-text">Unit Layanan</span>
                </a>
            </li>

            <li class="sidebar-menu-item <?php if($module=='jabatan'){echo "active";}?>">
                <a class="sidebar-menu-button" href="jabatan">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">apps</i>
                    <span class="sidebar-menu-text">Jabatan</span>
                </a>
            </li>
            
            <li class="sidebar-menu-item <?php if($module=='lap1' OR $module=='lap2' OR $module=='lap3' OR $module=='lap4' OR $module=='lap5' OR $module=='lap6' OR $module=='lap7' OR $module=='lap8' OR $module=='lap9'){echo "active open";}?>">
                <a class="sidebar-menu-button" data-toggle="collapse" href="#laporan">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">description</i>
                    <span class="sidebar-menu-text">Laporan</span>
                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                </a>
                <ul class="sidebar-submenu collapse" id="laporan">
                    <li class="sidebar-menu-item <?php if($module=='lap1'){echo "active";}?>">
                        <a class="sidebar-menu-button" href="lap1">
                            <span class="sidebar-menu-text">Data Kepegawaian</span>
                        </a>
                    </li>
                </ul>
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