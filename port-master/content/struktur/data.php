<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="home"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Struktur Jabatan</li>
                </ol>
            </nav>
            <h3 class="m-0">Struktur Jabatan</h3>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card">
        <div class="card-body">
            <div class="responsive-content">
            <figure class="org-chart cf">
                <div class="board ">
                <?php
                $d=pg_fetch_array(pg_query($conn,"SELECT uid, nama FROM master_pegawai_jabatan WHERE deleted_at IS NULL AND uid_parent IS NULL AND uid_unit='$_SESSION[uid_unit]'"));
                $a=pg_fetch_array(pg_query($conn,"SELECT nama FROM pegawai WHERE uid_jabatan='$d[uid]'"));
                ?>
                    <ul class="columnOne">
                        <li>
                        <span class="lvl-b">
                            <strong><?php echo $d['nama'];?></strong>
                            <br>&nbsp;
                            </span>
                        </li>
                    </ul>
                    <?php
                    $tampil=pg_query($conn,"SELECT a.uid, a.nama FROM master_pegawai_jabatan a WHERE a.uid_parent='$d[uid]' AND a.deleted_at IS NULL AND NOT EXISTS(SELECT NULL FROM master_pegawai_jabatan b WHERE b.uid_parent=a.uid) ORDER BY nama");
                    $count = pg_num_rows($tampil);
                    if($count=='1'){
                        $column="columnOne";
                    }
                    elseif($count=='2'){
                        $column="columnTwo";
                    }
                    elseif($count=='3'){
                        $column="columnThree";
                    }
                    elseif($count=='4'){
                            $column="columnFour";
                        }
                        ?>
                        <ul class="<?php echo $column;?>">
                            <?php
                            while($r=pg_fetch_array($tampil)){
                                $a=pg_fetch_array(pg_query($conn,"SELECT nama FROM pegawai WHERE uid_jabatan='$r[uid]'"));
                                ?>
                                <li>
                                <span>
                                    <strong><?php echo $r['nama'];?></strong>
                                    <br>&nbsp;
                                    </span>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <ul class="departments ">
                        <?php
                        $tampil=pg_query($conn,"SELECT a.uid, a.nama FROM master_pegawai_jabatan a WHERE a.uid_parent='$d[uid]' AND a.deleted_at IS NULL AND EXISTS(SELECT NULL FROM master_pegawai_jabatan b WHERE b.uid_parent=a.uid) ORDER BY nama");
                        while($r=pg_fetch_array($tampil)){
                            $a=pg_fetch_array(pg_query($conn,"SELECT nama FROM pegawai WHERE uid_jabatan='$r[uid]'"));
                            ?>
                            <li class="department ">
                                <span class="lvl-b">
                                    <strong><?php echo $r['nama'];?></strong>
                                    <br>&nbsp;
                                    </span>
                                <ul class="sections">
                                    <?php
                                    $data=pg_query($conn,"SELECT uid, nama FROM master_pegawai_jabatan WHERE uid_parent='$r[uid]' AND deleted_at IS NULL ORDER BY nama");
                                    while($u=pg_fetch_array($data)){
                                        $a=pg_fetch_array(pg_query($conn,"SELECT nama FROM pegawai WHERE uid_jabatan='$u[uid]'"));
                                        ?>
                                        <li class="section"> <span>
                                            <strong><?php echo $u['nama'];?></strong>
                                            <br>&nbsp;
                                            </span>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </figure>
            </div>
        </div>
    </div>
</div>