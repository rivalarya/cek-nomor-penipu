<?php  ?>
<div class="container">
	<div class="row">
		<div class="col-sm text-center mb-3 mt-4">
			<h1>Cek Nomor Penipu</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm text-center mb-5">
			<h3>Cek apakah nomor pernah atau berpotensi melakukan penipuan.</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md text-center">
			<input class="searchnomor" id="nomor" type="text" placeholder="Masukan nomor disini"><button type="button" id="cari" class="btn btn-primary btn-cari mb-1">Cari</button>
		</div>
	</div>
</div>

<div class="container text-center">
	<div class="row justify-content-center">
		<div class="col-6 bg-secondary rounded-pill p-1">
			<a class="btn btn-primary" href="<?= base_url('tambah'); ?>" role="button">Tambahkan Nomor</a>
			<p>Menambahkan nomor berarti membantu orang lain agar terhindar dari penipuan</p>
		</div>
	</div>
</div>