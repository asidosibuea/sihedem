<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Approval Permohonan</h3>
            </div>
            <?php echo form_open('approval/add'); ?>
          	<div class="box-body">
          		
            	<div class="row clearfix">
            		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="ID_ADM" class="control-label">ID ADMIN</label>
						<div class="form-group">
							<input type="text" name="ID_ADM" value="<?php echo $this->input->post('ID_ADM'); ?>" class="form-control" id="ID_ADM" />
						</div>
					</div>
            		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="ID_PERMOHONAN" class="control-label">ID PERMOHONAN</label>
						<div class="form-group">
							<input type="text" name="ID_PERMOHONAN" value="<?php echo $this->input->post('ID_PERMOHONAN'); ?>" class="form-control" id="ID_PERMOHONAN" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="STATUS" class="control-label">STATUS</label>
						<div class="form-group">
							<select class="form-control" name="STATUS">
				            	<option value="">Pilih Aksi</option>
			             	 	<option value="DITERIMA"> ACC PERMOHONAN</option>
				              	<option value="DITOLAK"> TOLAK PERMOHONAN</option>
				            </select>
						</div>
					</div>
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
            		<i class="fa fa-check"></i> Approve
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>