<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Approval Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('approval/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
						<th>IDAPPROVAL</th>
						<th>STATUS</th>
						<th>TANGGAL</th>
						<th>ID PERMOHONAN</th>
						<th>ID ADM</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($approval as $a){ ?>
                    <tr>
						<td><?php echo $a['IDAPPROVAL']; ?></td>
						<td><?php echo $a['STATUS']; ?></td>
						<td><?php echo $a['TANGGAL']; ?></td>
						<td><?php echo $a['ID_PERMOHONAN']; ?></td>
						<td><?php echo $a['ID_ADM']; ?></td>
						<td>
                            <a href="<?php echo site_url('approval/edit/'.$a['IDAPPROVAL']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('approval/remove/'.$a['IDAPPROVAL']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
