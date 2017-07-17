<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Penugasan Surveyor Edit</h3>
            </div>
			<?php echo form_open('penugasan_surveyor/edit/'.$penugasan_surveyor['ID_PENUGASAN']); ?>
			<div class="box-body">
							
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="TANGGAL" class="control-label">TANGGAL</label>
						<div class="form-group">
							<input type="text" name="TANGGAL" value="<?php echo ($this->input->post('TANGGAL') ? $this->input->post('TANGGAL') : $penugasan_surveyor['TANGGAL']); ?>" class="form-control" id="TANGGAL" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="NAMA_SEKOLAH" class="control-label">NAMA SEKOLAH</label>
						<div class="form-group">
							<input type="text" name="NAMA_SEKOLAH" value="<?php echo ($this->input->post('NAMA_SEKOLAH') ? $this->input->post('NAMA_SEKOLAH') : $penugasan_surveyor['NAMA_SEKOLAH']); ?>" class="form-control" id="NAMA_SEKOLAH" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="ID_SURVEYOR" class="control-label">ID SURVEYOR</label>
						<div class="form-group">
							<input type="text" name="ID_SURVEYOR" value="<?php echo ($this->input->post('ID_SURVEYOR') ? $this->input->post('ID_SURVEYOR') : $penugasan_surveyor['ID_SURVEYOR']); ?>" class="form-control" id="ID_SURVEYOR" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>