<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Laporan Progres Edit</h3>
            </div>
			<?php echo form_open('laporan_progres/edit/'.$laporan_progres['ID_PROGRESS']); ?>
			<div class="box-body">
				<?php echo validation_errors(); ?>			
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="NAMA_PROGRESS" class="control-label">NAMA PROGRESS</label>
						<div class="form-group">
							<select name="NAMA_PROGRESS" class="form-control">
								<option value="">select</option>
								<?php 
								$NAMA_PROGRESS_values = array(
					);

								foreach($NAMA_PROGRESS_values as $value => $display_text)
								{
									$selected = ($value == $laporan_progres['NAMA_PROGRESS']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="PERSENTASE_PROGRESS" class="control-label">PERSENTASE PROGRESS</label>
						<div class="form-group">
							<select name="PERSENTASE_PROGRESS" class="form-control">
								<option value="">select</option>
								<?php 
								$PERSENTASE_PROGRESS_values = array(
						'Ringan'=>'Kerusakan ringan',
						'Sedang'=>'Kerusakan sedang',
						'Berat'=>'Kerusakan berat',
					);

								foreach($PERSENTASE_PROGRESS_values as $value => $display_text)
								{
									$selected = ($value == $laporan_progres['PERSENTASE_PROGRESS']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="TANGGAL" class="control-label">TANGGAL</label>
						<div class="form-group">
							<input type="text" name="TANGGAL" value="<?php echo ($this->input->post('TANGGAL') ? $this->input->post('TANGGAL') : $laporan_progres['TANGGAL']); ?>" class="form-control" id="TANGGAL" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="FOTO1" class="control-label">FOTO1</label>
						<div class="form-group">
							<input type="text" name="FOTO1" value="<?php echo ($this->input->post('FOTO1') ? $this->input->post('FOTO1') : $laporan_progres['FOTO1']); ?>" class="form-control" id="FOTO1" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="FOTO2" class="control-label">FOTO2</label>
						<div class="form-group">
							<input type="text" name="FOTO2" value="<?php echo ($this->input->post('FOTO2') ? $this->input->post('FOTO2') : $laporan_progres['FOTO2']); ?>" class="form-control" id="FOTO2" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="FOTO3" class="control-label">FOTO3</label>
						<div class="form-group">
							<input type="text" name="FOTO3" value="<?php echo ($this->input->post('FOTO3') ? $this->input->post('FOTO3') : $laporan_progres['FOTO3']); ?>" class="form-control" id="FOTO3" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="ID_KONSULTAN" class="control-label">ID KONSULTAN</label>
						<div class="form-group">
							<input type="text" name="ID_KONSULTAN" value="<?php echo ($this->input->post('ID_KONSULTAN') ? $this->input->post('ID_KONSULTAN') : $laporan_progres['ID_KONSULTAN']); ?>" class="form-control" id="ID_KONSULTAN" />
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