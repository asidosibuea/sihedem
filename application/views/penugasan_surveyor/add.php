<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Input Penugasan Surveyor</h3>
            </div>
            <?php echo form_open('penugasan_surveyor/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="ID_SURVEYOR" class="control-label">ID SURVEYOR</label>
						<div class="form-group">
							<input type="text" name="ID_SURVEYOR" value="<?php echo $this->input->post('ID_SURVEYOR'); ?>" class="form-control" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="NAMA_SEKOLAH" class="control-label">NAMA SEKOLAH</label>
						<div class="form-group">
							<input type="text" name="NAMA_SEKOLAH" value="<?php echo $this->input->post('NAMA_SEKOLAH'); ?>" class="form-control" id="NAMA_SEKOLAH" />
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