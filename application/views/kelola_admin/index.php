<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Admin Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('admin/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
						<th>ID ADM</th>
						<th>PASSWORD</th>
						<th>USERNAME</th>
						<th>FOTO PROFIL</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($admin as $a){ ?>
                    <tr>
						<td><?php echo $a['ID_ADM']; ?></td>
						<td><?php echo $a['PASSWORD']; ?></td>
						<td><?php echo $a['USERNAME']; ?></td>
						<td><?php echo $a['FOTO_PROFIL']; ?></td>
						<td>
                            <a href="<?php echo site_url('admin/edit/'.$a['ID_ADM']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('admin/remove/'.$a['ID_ADM']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
