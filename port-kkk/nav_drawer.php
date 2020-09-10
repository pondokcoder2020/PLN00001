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
            <li class="sidebar-menu-item <?php if($module=='perusahaan'){echo "active open";}?>">
                <a class="sidebar-menu-button" data-toggle="collapse" href="#personil_master">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">description</i>
                    <span class="sidebar-menu-text">Seting Personil</span>
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
                    <li class="sidebar-menu-item <?php if($module=='kategori-presonil'){echo "active";}?>">
                        <a class="sidebar-menu-button" href="kategori-presonil">
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
            <li class="sidebar-menu-item <?php if($module=='lap1' OR $module=='lap2' OR $module=='lap3' OR $module=='lap4' OR $module=='lap5' OR $module=='lap6' OR $module=='lap7' OR $module=='lap8' OR $module=='lap9'){echo "active open";}?>">
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
                </ul>
            </li>
            <li class="sidebar-menu-item <?php if($module=='master-personil'){echo "active";}?>">
                <a class="sidebar-menu-button" href="master-personil">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left fa fa-user"></i>
                    <span class="sidebar-menu-text">Master Personil</span>
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