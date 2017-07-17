<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List Data Konsultan</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('kelola_konsultan/add'); ?>" class="btn btn-success btn-sm">Tambah Akun</a> 
                </div>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
						<th>ID KONSULTAN</th>
                                                <th>NAMA KONSULTAN</th>
                                                <th>USERNAME</th>
						<th>PASSWORD</th>						
						<th>NO TELP</th>
                                                <th>ALAMAT</th>
						<th>FOTO PROFIL</th>						
						<th>Actions</th>
                        </tr>
                            <?php foreach($konsultan as $k){ 
                            $foto_url = base_url().'/uploads/'.$k['FOTO_PROFIL'];?>
                        <tr>
						<td><?php echo $k['ID_KONSULTAN']; ?></td>
						<td><?php echo $k['NAMA_KONSULTAN']; ?></td>
                        <td><?php echo $k['USERNAME']; ?></td>
                        <td><?php echo $k['PASSWORD']; ?></td>						
						<td><?php echo $k['NO_TELP']; ?></td>	
                        <td><?php echo $k['ALAMAT']; ?></td>
						<td>
                                <a href="<?php echo $foto_url;?>" target="_blank">
                                <img src="<?php echo $foto_url;?>" alt="<?php echo $k['FOTO_PROFIL'] ?>" width="50px">
                                </a>
                        </td>						
						<td>
                            <a href="<?php echo site_url('kelola_konsultan/edit/'.$k['ID_KONSULTAN']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('kelola_konsultan/remove/'.$k['ID_KONSULTAN']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
