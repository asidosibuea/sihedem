<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Approval Edit</h3>
            </div>
			<?php echo form_open('approval/edit/'.$approval['IDAPPROVAL']); ?>
			<div class="box-body">
							
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="STATUS" class="control-label">STATUS</label>
						<div class="form-group">
							<input type="text" name="STATUS" value="<?php echo ($this->input->post('STATUS') ? $this->input->post('STATUS') : $approval['STATUS']); ?>" class="form-control" id="STATUS" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="TANGGAL" class="control-label">TANGGAL</label>
						<div class="form-group">
							<input type="text" name="TANGGAL" value="<?php echo ($this->input->post('TANGGAL') ? $this->input->post('TANGGAL') : $approval['TANGGAL']); ?>" class="form-control" id="TANGGAL" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="ID_PERMOHONAN" class="control-label">ID PERMOHONAN</label>
						<div class="form-group">
							<input type="text" name="ID_PERMOHONAN" value="<?php echo ($this->input->post('ID_PERMOHONAN') ? $this->input->post('ID_PERMOHONAN') : $approval['ID_PERMOHONAN']); ?>" class="form-control" id="ID_PERMOHONAN" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="ID_ADM" class="control-label">ID ADM</label>
						<div class="form-group">
							<input type="text" name="ID_ADM" value="<?php echo ($this->input->post('ID_ADM') ? $this->input->post('ID_ADM') : $approval['ID_ADM']); ?>" class="form-control" id="ID_ADM" />
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