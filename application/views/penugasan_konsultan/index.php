<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Penugasan Konsultan</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('penugasan_konsultan/add'); ?>" class="btn btn-success btn-sm">Tambah Penugasan</a> 
                </div>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
						<th>ID PENUGASAN</th>
                                                <th>NAMA SEKOLAH</th>
						<th>ID KONSULTAN</th>
                                                <th>TANGGAL</th>
						<th>LAMA PENUGASAN</th>												
						<!--<th>Actions</th>  -->
                    </tr>
                    <?php foreach($penugasan_konsultan as $p){ ?>
                    <tr>
						<td><?php echo $p['ID_PENUGASAN']; ?></td>
						<td><?php echo $p['NAMA_SEKOLAH']; ?></td>
						<td><?php echo $p['ID_KONSULTAN']; ?></td>
						<td><?php echo $p['TANGGAL']; ?></td>
                                                <td><?php echo $p['LAMA_PENUGASAN']; ?></td>
						
						<td>
                            <!-- <a href="<?php echo site_url('penugasan_konsultan/edit/'.$p['ID_PENUGASAN']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>  -->
                            <!-- <a href="<?php echo site_url('penugasan_konsultan/remove/'.$p['ID_PENUGASAN']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> -->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
