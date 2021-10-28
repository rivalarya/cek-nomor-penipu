<? ?>
<div class="container m-auto">
    <div class="row justify-content-center border shadow-lg p-3 mb-5 bg-white rounded">
        <div class="col">
            <?= form_open_multipart('tambah','id="formTambah"'); ?>
            <div class="form-row my-auto">
                <div class="form-group col-6">
                    <label for="nama">Nama Anda (opsional)</label>
                    <input type="text" name="id" hidden readonly>
                    <input type="text" name="nama" class="form-control" id="nama">                
                </div>
                <div class="form-group col-6">  
                    <label for="nomor_telepon_pelaku">Nomor Telepon Pelaku</label>
                    <input type="text" name="nomor_telepon_pelaku" class="form-control" id="nomor_telepon_pelaku" required>
                    <small class="ml-2 text-danger no d-none">Kolom "Nomor Telepon" hanya boleh berisi angka.</small>
                    <div class="text-danger"><?php echo form_error('nomor_telepon_pelaku'); ?></div>
                </div>
            </div>
            <div class="form-group row">  
                <label for="tgl_kejadian" class="col-sm-4 col-form-label">Tanggal Kejadian</label>
                <div class="col-sm-8">
                    <input type="date" name="tgl_kejadian" class="form-control" id="tgl_kejadian" min="1997-01-01" max="<?= date("Y-m-d")?>" required>          
                </div>
                <div class="text-danger"><?php echo form_error('tgl_kejadian'); ?></div>
            </div>
            <div class="form-group">  
                <label for="keterangan">Keterangan (Opsional)</label>
                <textarea name="keterangan" id="keterangan" class="form-control"></textarea>            
            </div>
            <label for="bukti">Upload Bukti</label>
            <div class="form-group">    
                <div class="form-inline justify-content-around border p-1 mt-3 mb-3">            
                    <div class="custom-file col-5">
                        <input type="file" class="custom-file-input" name="bukti1" id="bukti1" onchange='gantiLabel(this)' required>
                        <label class="custom-file-label justify-content-start" for="bukti1">Pilih bukti...</label>
                    </div>
                    <img id="thumb1" data-featherlight="image" class="bukti col-7" src=""/>
                    <a id="tambah" class="text-white badge badge-success">Tambah bukti</a>
                    <a class="tambah1 text-warning text-decoration-none">Maksimal <br> 3 bukti</a>
                </div>
                <span id="tambahbukti"></span>
            </div>
                <?php 
					if($this->session->flashdata('pesan'))
					{
					?>
					<p class="text-danger"> <?=$this->session->flashdata('pesan')?></p>
					<?php }
				    ?>

                <button type="submit" class="btn btn-primary btn-block w-50 m-auto" name="kirim" >Kirim</button>
            
            <?= form_close() ?>

        </div>
    </div>

</div>