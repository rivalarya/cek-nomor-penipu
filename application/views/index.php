<?php  ?>
<nav class="fixed-top text-left">
	<a href="<?= base_url('home/about');?>" target="_blank">
		<img src="<?= $about; ?>" class="about" title="About" alt="About" width="58px" height="100%">
	</a> 
</nav>
<div class="container-fluid wave">
	<div class="row">
		<div class="col-sm text-center mb-3 mt-4">
			<h1 class="title">Cek Nomor Penipu</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm text-center mb-5">
			<h3 class="description">Cek apakah nomor pernah atau berpotensi melakukan penipuan.</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md text-center justify-content-center">
				<div class="container input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text kode">+62</span>
					</div>
					<input type="text" placeholder="Masukan nomor disini" class="form-control searchnomor">
					<div class="input-group-append">
						<button type="button" class="btn btn-cari">Cari</button>
					</div>
				</div>
			<div class="container text-left mt-1">
				<p class="ml-3 p-contoh">Masukan nomor tanpa awalan 0 atau +62. Contoh <u class="contoh">87814685520</u></p>
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

<div class="container text-center tambahkan-nomor mb-5">
	<div class="row justify-content-center">
		<div class="col-6 rounded-pill p-1">
			<a class="btn btn-primary rounded-pill" href="<?= base_url('tambah'); ?>" role="button">Tambahkan Nomor</a>
			<p>Menambahkan nomor berarti membantu orang lain agar terhindar dari penipuan</p>
		</div>
	</div>
</div>