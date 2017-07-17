<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Penilaian Kerusakan Edit</h3>
            </div>
			<?php echo form_open('penilaian_kerusakan/edit/'.$penilaian_kerusakan['ID_PENILAIAN']); ?>
			<div class="box-body">
							
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="SARAN" class="control-label">SARAN</label>
						<div class="form-group">
							<input type="text" name="SARAN" value="<?php echo ($this->input->post('SARAN') ? $this->input->post('SARAN') : $penilaian_kerusakan['SARAN']); ?>" class="form-control" id="SARAN" />
						</div>
					</div>
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
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="JANGKA_WAKTU" class="control-label">JANGKA WAKTU</label>
						<div class="form-group">
							<input type="date" name="JANGKA_WAKTU" value="<?php echo ($this->input->post('JANGKA_WAKTU') ? $this->input->post('JANGKA_WAKTU') : $penilaian_kerusakan['JANGKA_WAKTU']); ?>" class="form-control" id="JANGKA_WAKTU" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="TANGGAL" class="control-label">TANGGAL</label>
						<div class="form-group">
							<input type="date" name="TANGGAL" value="<?php echo ($this->input->post('TANGGAL') ? $this->input->post('TANGGAL') : $penilaian_kerusakan['TANGGAL']); ?>" class="form-control" id="TANGGAL" />
						</div>
					</div>
				</div>
				<!--<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="FOTO1" class="control-label">FOTO1</label>
						<div class="form-group">
							<input type="file" name="FOTO1" value="<?php echo ($this->input->post('FOTO1') ? $this->input->post('FOTO1') : $penilaian_kerusakan['FOTO1']); ?>" class="form-control" id="FOTO1" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="FOTO2" class="control-label">FOTO2</label>
						<div class="form-group">
							<input type="file" name="FOTO2" value="<?php echo ($this->input->post('FOTO2') ? $this->input->post('FOTO2') : $penilaian_kerusakan['FOTO2']); ?>" class="form-control" id="FOTO2" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="FOTO3" class="control-label">FOTO3</label>
						<div class="form-group">
							<input type="file" name="FOTO3" value="<?php echo ($this->input->post('FOTO3') ? $this->input->post('FOTO3') : $penilaian_kerusakan['FOTO3']); ?>" class="form-control" id="FOTO3" />
						</div>
					</div> -->
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="ID_SURVEYOR" class="control-label">ID SURVEYOR</label>
						<div class="form-group">
							<input type="text" name="ID_SURVEYOR" value="<?php echo ($this->input->post('ID_SURVEYOR') ? $this->input->post('ID_SURVEYOR') : $penilaian_kerusakan['ID_SURVEYOR']); ?>" class="form-control" id="ID_SURVEYOR" />
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