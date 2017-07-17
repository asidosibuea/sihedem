<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Penugasan Surveyor</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('penugasan_surveyor/add'); ?>" class="btn btn-success btn-sm">Tambah Penugasan</a> 
                </div>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
						<th>ID PENUGASAN</th>
						<th>NAMA SEKOLAH</th>
						<th>ID SURVEYOR</th>
						<th>TANGGAL</th>
						<!--<th>Actions</th>-->
                    </tr>
                    <?php foreach($penugasan_surveyor as $p){ ?>
                    <tr>
						<td><?php echo $p['ID_PENUGASAN']; ?></td>
						<td><?php echo $p['NAMA_SEKOLAH']; ?></td>
						<td><?php echo $p['ID_SURVEYOR']; ?></td>
						<td><?php echo $p['TANGGAL']; ?></td>
						<td>
                            <!-- <a href="<?php echo site_url('penugasan_surveyor/edit/'.$p['ID_PENUGASAN']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('penugasan_surveyor/remove/'.$p['ID_PENUGASAN']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> -->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
