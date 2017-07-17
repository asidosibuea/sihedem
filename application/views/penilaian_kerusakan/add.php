<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Input Laporan Penilaian Kerusakan</h3>
            </div>
            <?php echo form_open_multipart('penilaian_kerusakan/add'); ?>
          	<div class="box-body">
          		
            	<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="ID_SURVEYOR" class="control-label">ID SURVEYOR</label>
						<div class="form-group">
							<input type="text" name="ID_SURVEYOR" value="<?php echo $this->input->post('ID_SURVEYOR'); ?>" class="form-control" id="ID_SURVEYOR" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="NAMA_SEKOLAH" class="control-label">NAMA SEKOLAH</label>
						<div class="form-group">
							<input type="text" name="NAMA_SEKOLAH" value="<?php echo $this->input->post('ID_SURVEYOR'); ?>" class="form-control" id="ID_SURVEYOR" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="NILAI_KERUSAKAN" class="control-label">NILAI KERUSAKAN</label>
						<div class="form-group">
				            <select class="form-control" id="sel1" name="NILAI_KERUSAKAN">
				            	<option value="">Pilih Urgensi</option>
			             	 	<option value="RUSAK RINGAN">KERUSAKAN RINGAN</option>
				              	<option value="RUSAK SEDANG">KERUSAKAN SEDANG</option>
				              	<option value="RUSAK BERAT">KERUSAKAN BERAT</option>
				            </select>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="SARAN" class="control-label">SARAN</label>
						<div class="form-group">
							<textarea name="SARAN" class="form-control" ><?php echo $this->input->post('SARAN'); ?></textarea>
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="TANGGAL" class="control-label">TANGGAL</label>
						<div class="form-group">
							<input type="date" name="TANGGAL" value="<?php echo $this->input->post('TANGGAL'); ?>" class="form-control" id="TANGGAL" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="JANGKA_WAKTU" class="control-label">JANGKA WAKTU</label>
						<div class="form-group">
							<input type="date" name="JANGKA_WAKTU" value="<?php echo $this->input->post('JANGKA_WAKTU'); ?>" class="form-control" id="JANGKA_WAKTU" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="FOTO1" class="control-label">FOTO1</label>
						<div class="form-input">
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