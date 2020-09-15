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
            <li class="sidebar-menu-item <?php if($module=='perusahaan' or $module=='jabatan' or $module=='bidang' or $module=='kategori-personil' or $module=='unit'){echo "active open";}?>">
                <a class="sidebar-menu-button" data-toggle="collapse" href="#personil_master">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">description</i>
                    <span class="sidebar-menu-text">Data FPS</span>
                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                </a>
                <ul class="sidebar-submenu collapse" id="personil_master">
                    <li class="sidebar-menu-item <?php if($module=='perusahaan'){echo "active";}?>">
                        <a class="sidebar-menu-button" href="perusahaan">
                            <span class="sidebar-menu-text">Perusahaan</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item <?php if($module=='jabatan'){echo "active";}?>">
                        <a class="sidebar-menu-button" href="jabatan">
                            <span class="sidebar-menu-text">Jabatan</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item <?php if($module=='kategori-personil'){echo "active";}?>">
                        <a class="sidebar-menu-button" href="kategori-personil">
                            <span class="sidebar-menu-text">Kategori Personil</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item <?php if($module=='bidang'){echo "active";}?>">
                        <a class="sidebar-menu-button" href="bidang">
                            <span class="sidebar-menu-text">Bidang</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item <?php if($module=='unit'){echo "active";}?>">
                        <a class="sidebar-menu-button" href="unit">
                            <span class="sidebar-menu-text">Unit</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu-item <?php if($module=='klasifikasi' or $module=='item-kategori' or $module=='item-varian' or $module=='item' or $module=='lokasi-penempatan'){echo "active open";}?>">
                <a class="sidebar-menu-button" data-toggle="collapse" href="#aset_master">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left fa fa-edit"></i>
                    <span class="sidebar-menu-text">Setting Aset</span>
                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                </a>
                <ul class="sidebar-submenu collapse" id="aset_master">
                    <li class="sidebar-menu-item <?php if($module=='klasifikasi'){echo "active";}?>">
                        <a class="sidebar-menu-button" href="klasifikasi">
                            <span class="sidebar-menu-text">Klasifikasi</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item <?php if($module=='item-kategori'){echo "active";}?>">
                        <a class="sidebar-menu-button" href="item-kategori">
                            <span class="sidebar-menu-text">Item Kategori</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item <?php if($module=='item-varian'){echo "active";}?>">
                        <a class="sidebar-menu-button" href="item-varian">
                            <span class="sidebar-menu-text">Item Varian</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item <?php if($module=='item'){echo "active";}?>">
                        <a class="sidebar-menu-button" href="item">
                            <span class="sidebar-menu-text">Item</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item <?php if($module=='lokasi-penempatan'){echo "active";}?>">
                        <a class="sidebar-menu-button" href="lokasi-penempatan">
                            <span class="sidebar-menu-text">Lokasi Penempatan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu-item <?php if($module=='master-pegawai'){echo "active";}?>">
                <a class="sidebar-menu-button" href="master-pegawai">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left fa fa-user"></i>
                    <span class="sidebar-menu-text">Master Pegawai</span>
                </a>
            </li>
            <li class="sidebar-menu-item <?php if($module=='master-aset'){echo "active";}?>">
                <a class="sidebar-menu-button" href="master-aset">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left fa fa-box"></i>
                    <span class="sidebar-menu-text">Master Aset</span>
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