<?php
$id=isset($_GET['id']) ? $_GET['id'] : '';

$d=pg_fetch_array(pg_query($conn,"SELECT * FROM master_aset_subkategori WHERE id='$id'"));
?>
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item"><a href="unitsektor">Data FPS</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $d['nama'];?></li>
                </ol>
            </nav>
            <h4 class="m-0"><?php echo $d['nama'];?></h4>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="z-0">
        <ul class="nav nav-tabs nav-tabs-custom" role="tablist" id="myTab">
            <li class="nav-item">
                <a href="#tab-22" class="nav-link active" data-toggle="tab" role="tab" aria-controls="tab-22" aria-selected="true">
                    <span class="nav-link__count">Parameter</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#tab-23" class="nav-link" data-toggle="tab" role="tab" aria-selected="false">
                    <span class="nav-link__count">Varian</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#tab-24" class="nav-link" data-toggle="tab" role="tab" aria-selected="false">
                    <span class="nav-link__count">Kapasitas</span>
                </a>
            </li>
            
        </ul>
        <div class="card">
            <div class="card-body tab-content">
                <div class="tab-pane active show fade" id="tab-22">
                    <?php
                    include "data_parameter.php";
                    ?>
                </div>
                <div class="tab-pane fade" id="tab-23">
                    <?php
                    include "data_varian.php";
                    ?>
                </div>
                <div class="tab-pane fade" id="tab-24">
                    <?php
                    include "data_kapasitas.php";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function () {
	$('#myTab a').click(function(e) {
		e.preventDefault();
		$(this).tab('show');
	});

	// store the currently selected tab in the hash value
	$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
		var id = $(e.target).attr("href").substr(1);
		window.location.hash = id;
	});

	// on load of the page: switch to the currently selected tab
	var hash = window.location.hash;
	$('#myTab a[href="' + hash + '"]').tab('show');
});
</script>