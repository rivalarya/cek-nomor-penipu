<div class="container">
    <div class="row justify-content-center my-auto border">
        <div class="col ">
                <?php echo validation_errors(); ?>
            <?= form_open_multipart('tambah/tambah_data'); ?>
            <div class="form-row my-auto">
                <div class="form-group col-6">
                    <label for="nama">Nama Anda (opsional)</label>
                    <input type="text" name="id" hidden readonly>
                    <input type="text" name="nama" class="form-control" id="nama">                
                </div>
                <div class="form-group col-6">  
                    <label for="nomor_telepon_pelaku">Nomor Telepon Pelaku</label>
                    <input type="text" name="nomor_telepon_pelaku" class="form-control" id="nomor_telepon_pelaku" required>            
                </div>
            </div>
            <div class="form-group row">  
                <label for="tgl_kejadian" class="col-sm-4 col-form-label">Tanggal Kejadian</label>
                <div class="col-sm-8">
                    <input type="date" name="tgl_kejadian" class="form-control" id="tgl_kejadian" max="<?= date("Y-m-d")?>" required>          
                </div>  
            </div>
            <div class="form-group">  
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control"></textarea>            
            </div>
            <div class="form-group">
                <label for="bukti" >Upload Bukti</label>
                <div class="form-inline justify-content-around border mt-3 mb-3">
                    <input type="file" class="form-control col-4" name="bukti1" id="bukti1" required>
                    <img id="thumb1"  class="bukti col-6" src=""/>
                </div>
                 <a id="tambah">Tambah bukti</a>
                 
            </div>
                <?php 
					if($this->session->flashdata('pesan'))
					{
					?>
					<p class="text-danger"> <?=$this->session->flashdata('pesan')?></p>
					<?php }
				    ?>

                <button type="submit" class="btn btn-primary btn-block w-50 m-auto" name="kirim" id="kirim">Kirim</button>
            
            <?= form_close() ?>

        </div>
    </div>

</div>