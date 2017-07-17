<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tambah Akun Admin</h3>
            </div>
            <?php echo form_open('admin/add'); ?>
          	<div class="box-body">
          		<?php echo validation_errors(); ?>
            	<div class="row clearfix">
            		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="ID_ADM" class="control-label">ID ADMIN</label>
						<div class="form-group">
							<input type="text" name="ID_ADM" value="<?php echo $this->input->post('ID_ADM'); ?>" class="form-control" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="USERNAME" class="control-label">USERNAME</label>
						<div class="form-group">
							<input type="text" name="USERNAME" value="<?php echo $this->input->post('USERNAME'); ?>" class="form-control" id="USERNAME" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="PASSWORD" class="control-label">PASSWORD</label>
						<div class="form-group">
							<input type="password" name="PASSWORD" value="<?php echo $this->input->post('PASSWORD'); ?>" class="form-control" id="PASSWORD" />
						</div>
					</div>
				</div>

				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="FOTO_PROFIL" class="control-label">FOTO PROFIL</label>
						<div class="form-group">
							<input type="file" name="FOTO_PROFIL" value="<?php echo $this->input->post('FOTO_PROFIL'); ?>" class="form-control" id="FOTO_PROFIL" />
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