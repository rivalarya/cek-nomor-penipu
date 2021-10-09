<div class="container">
    <div class="row">
        <div class="col">

                <?php echo validation_errors(); ?>

            <?= form_open_multipart('tambah/tambah_data'); ?>
                <label for="nama">Nama Anda (opsional)</label>
                <input type="text" name="id" hidden>
                <input type="text" name="nama" id="nama">
                <label for="nomor_telepon_pelaku">Nomor Telepon Pelaku</label>
                <input type="text" name="nomor_telepon_pelaku" id="nomor_telepon_pelaku" required>
                <label for="tgl_kejadian">Tanggal Kejadian</label>
                <input type="date" name="tgl_kejadian" id="tgl_kejadian" max="<?= date("Y-m-d")?>" required>
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan">
                <label for="bukti">Upload Bukti</label>
                <input type="file" name="bukti" id="bukti" required>
                <button type="submit" name="kirim">kirim</button>
            <?= form_close() ?>

        </div>
    </div>

</div>