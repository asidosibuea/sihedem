<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Approval Permohonan Perbaikan</h3>
            </div>
			<?php echo form_open('permohonan_perbaikan/edit/'.$permohonan_perbaikan['ID_PERMOHONAN']); ?>
			<div class="box-body">
				<?php echo validation_errors(); ?>			
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="NAMA_SEKOLAH" class="control-label">NAMA SEKOLAH</label>
						<div class="form-group">
							<input type="text" name="NAMA_SEKOLAH" value="<?php echo ($this->input->post('NAMA_SEKOLAH') ? $this->input->post('NAMA_SEKOLAH') : $permohonan_perbaikan['NAMA_SEKOLAH']); ?>" class="form-control" id="NAMA_SEKOLAH" disabled/>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="JUDUL_PERMOHONAN" class="control-label">JUDUL PERMOHONAN</label>
						<div class="form-group">
							<input type="text" name="JUDUL_PERMOHONAN" value="<?php echo ($this->input->post('JUDUL_PERMOHONAN') ? $this->input->post('JUDUL_PERMOHONAN') : $permohonan_perbaikan['JUDUL_PERMOHONAN']); ?>" class="form-control" id="JUDUL_PERMOHONAN" disabled/>
						</div>
					</div>
				</div>	

				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="TANGGAL" class="control-label">TANGGAL</label>
						<div class="form-group">
							<input type="text" name="TANGGAL" value="<?php echo ($this->input->post('TANGGAL') ? $this->input->post('TANGGAL') : $permohonan_perbaikan['TANGGAL']); ?>" class="form-control" id="TANGGAL" disabled/>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="DESKRIPSI" class="control-label">DESKRIPSI</label>
						<div class="form-group">
							<textarea name="DESKRIPSI" class="form-control" id="DESKRIPSI" disabled><?php echo ($this->input->post('DESKRIPSI') ? $this->input->post('DESKRIPSI') : $permohonan_perbaikan['DESKRIPSI']);?></textarea>
						</div>
					</div>
				</div>
				<div class="row clearfix">

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<label for="NILAI_KERUSAKAN" class="control-label">Aksi</label>
						<div class="form-group">
				            <select class="form-control" id="sel1" name="STATUS">
				            	<option value="">Pilih Aksi</option>
			             	 	<option value="DITERIMA">Acc Permohonan</option>
				              	<option value="DITOLAK">Tolak Permohonan</option>
				            </select>
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