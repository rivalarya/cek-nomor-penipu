<?php  ?>
<div class="container-fluid wave">
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
				<span class="kode">+62
					<input class="searchnomor ml-2" id="nomor" type="text" placeholder="Masukan nomor disini">
				</span>
				<button type="button" id="cari" class="btn-cari ">Cari</button>
			<div class="container text-left mt-1">
				<p class="">Masukan nomor tanpa awalan 0 atau +62. Contoh <span><a class="contoh">87814685520</a></span></p>
			</div>
		</div>
	</div>
</div>

<?php if ($this->session->flashdata('success')) : ?>
		<script>Swal.fire({
            icon: 'success',
            title: 'Berhasil ditambahkan',
            text: 'Terima kasih.',
          })</script>
<?php endif ?>

<div class="container text-center tambahkan-nomor">
	<div class="row justify-content-center">
		<div class="col-6 rounded-pill p-1">
			<a class="btn btn-primary rounded-pill" href="<?= base_url('tambah'); ?>" role="button">Tambahkan Nomor</a>
			<p>Menambahkan nomor berarti membantu orang lain agar terhindar dari penipuan</p>
		</div>
	</div>
</div>