<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Input Permohonan Perbaikan</h3>
            </div>
            <?php echo form_open_multipart('permohonan_perbaikan/add'); ?>
          	<div class="box-body">
          		<?php echo validation_errors(); ?>
            	<div class="row clearfix">
            		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="NAMA_SEKOLAH" class="control-label">NAMA SEKOLAH</label>
						<div class="form-group">
							<input type="text" name="NAMA_SEKOLAH" value="<?php echo $this->input->post('NAMA_SEKOLAH'); ?>" class="form-control" id="NAMA_SEKOLAH" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="JUDUL_PERMOHONAN" class="control-label">JUDUL PERMOHONAN</label>
						<div class="form-group">
							<input type="text" name="JUDUL_PERMOHONAN" value="<?php echo $this->input->post('JUDUL_PERMOHONAN'); ?>" class="form-control" id="JUDUL_PERMOHONAN" />
						</div>
					</div>


				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="DESKRIPSI" class="control-label">DESKRIPSI</label>
						<div class="form-group">
							<textarea name="DESKRIPSI" class="form-control" id="DESKRIPSI"><?php echo $this->input->post('DESKRIPSI'); ?></textarea>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="TANGGAL" class="control-label">TANGGAL</label>
						<div class="form-group">
							<input type="date" name="TANGGAL" value="<?php echo $this->input->post('TANGGAL'); ?>" class="form-control" id="TANGGAL" />
						</div>
					</div>
				</div>
								<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="FOTO1" class="control-label">FOTO1</label>
						<div class="form-group">
							<input type="file" name="FOTO1" value="<?php echo $this->input->post('FOTO1'); ?>" class="form-control" id="FOTO1" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="FOTO2" class="control-label">FOTO2</label>
						<div class="form-group">
							<input type="file" name="FOTO2" value="<?php echo $this->input->post('FOTO2'); ?>" class="form-control" id="FOTO2" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="FOTO3" class="control-label">FOTO3</label>
						<div class="form-group">
							<input type="file" name="FOTO3" value="<?php echo $this->input->post('FOTO3'); ?>" class="form-control" id="FOTO3" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Kirim
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>