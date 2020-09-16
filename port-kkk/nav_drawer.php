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
            <li class="sidebar-menu-item <?php if($module=='master-inspeksi-peralatan' or $module=='detail-inspeksi' or $module=='parameter' or $module=='identitas'){echo "active";}?>">
                <a class="sidebar-menu-button" href="master-inspeksi-peralatan">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left fa fa-wrench"></i>
                    <span class="sidebar-menu-text">Master Inspeksi Peralatan</span>
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