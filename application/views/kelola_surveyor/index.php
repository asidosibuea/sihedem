<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List Data Surveyor</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('Kelola_Surveyor/add'); ?>" class="btn btn-success btn-sm">Tambah Akun</a> 
                </div>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
						<th>ID SURVEYOR</th>
						<th>NAMA SURVEYOR</th>
						<th>USERNAME</th>
						<th>PASSWORD</th>
						<th>NO TELP</th>
						<th>ALAMAT</th>
						<th>FOTO PROFIL</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($surveyor as $s){ 
                        $foto_url = base_url().'/uploads/'.$s['FOTO_PROFIL'];

                        ?>
                    <tr>
						<td><?php echo $s['ID_SURVEYOR']; ?></td>
						<td><?php echo $s['NAMA_SURVEYOR']; ?></td>
						<td><?php echo $s['USERNAME']; ?></td>
						<td><?php echo $s['PASSWORD']; ?></td>
						<td><?php echo $s['NO_TELP']; ?></td>
						<td><?php echo $s['ALAMAT']; ?></td>
						<td>
                                <a href="<?php echo $foto_url;?>" target="_blank">
                                <img src="<?php echo $foto_url;?>" alt="<?php echo $s['FOTO_PROFIL'] ?>" width="50px">
                                </a>
                        </td>
						<td>
                            <a href="<?php echo site_url('Kelola_Surveyor/edit/'.$s['ID_SURVEYOR']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('Kelola_Surveyor/remove/'.$s['ID_SURVEYOR']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
