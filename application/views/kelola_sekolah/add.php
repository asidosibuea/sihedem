<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tambah Akun Sekolah</h3>
            </div>
            <?php echo form_open_multipart('kelola_sekolah/add'); ?>
          	<div class="box-body">
          		<?php echo validation_errors(); ?>
            	<div class="row clearfix">
            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<label for="NAMA_SEKOLAH" class="control-label">Nama Sekolah <font color="red">* TANPA SPASI</font></label>
						<div class="form-group">
							<input type="text" name="NAMA_SEKOLAH" value="<?php echo $this->input->post('NAMA_SEKOLAH'); ?>" class="form-control" />
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
						<label for="NO_TELP" class="control-label">NO TELP</label>
						<div class="form-group">
							<input type="text" name="NO_TELP" value="<?php echo $this->input->post('NO_TELP'); ?>" class="form-control" id="NO_TELP" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="FOTO_PROFIL" class="control-label">FOTO PROFIL</label>
						<div class="form-group">
							<input type="file" name="FOTO_PROFIL" value="<?php echo $this->input->post('FOTO_PROFIL'); ?>" class="form-control" id="FOTO_PROFIL" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="ALAMAT" class="control-label">ALAMAT</label>
						<div class="form-group">
							<textarea name="ALAMAT" class="form-control" id="ALAMAT"><?php echo $this->input->post('ALAMAT'); ?></textarea>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Buat Akun
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>