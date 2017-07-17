<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Laporan Penilaian Kerusakan</h3>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
						<th>ID PENILAIAN</th>
						<th>ID SURVEYOR</th>
						<th>NILAI KERUSAKAN</th>
						<th>SARAN</th>
						<th>JANGKA WAKTU</th>
						<th>TANGGAL</th>
						<th>FOTO1</th>
						<th>FOTO2</th>
						<th>FOTO3</th>
						<!-- <th>Actions</th> -->
                    </tr>
                    <?php foreach($penilaian_kerusakan as $p){ 
                    		$foto_url = base_url().'/uploads/'.$p['FOTO1'];
							$foto_url2 = base_url().'/uploads/'.$p['FOTO2'];
							$foto_url3 = base_url().'/uploads/'.$p['FOTO3'];
                    	?>
                    <tr>
						<td><?php echo $p['ID_PENILAIAN']; ?></td>
						<td><?php echo $p['ID_SURVEYOR']; ?></td>
						<td><?php echo $p['NILAI_KERUSAKAN']; ?></td>
						<td><?php echo $p['SARAN']; ?></td>
						<td><?php echo $p['JANGKA_WAKTU']; ?></td>
						<td><?php echo $p['TANGGAL']; ?></td>
						<td>
								<a href="<?php echo $foto_url;?>" target="_blank">
								<img src="<?php echo $foto_url;?>" alt="<?php echo $p['FOTO1'] ?>" width="50px">
								</a>
						</td>
						<td>
								<a href="<?php echo $foto_url2;?>" target="_blank">
								<img src="<?php echo $foto_url2;?>" alt="<?php echo $p['FOTO2'] ?>" width="50px">
								</a>
						</td>
						<td>
								<a href="<?php echo $foto_url3;?>" target="_blank">
								<img src="<?php echo $foto_url3;?>" alt="<?php echo $p['FOTO3'] ?>" width="50px">
								</a>
						</td>
						<td>
                       <!--      <a href="<?php echo site_url('penilaian_kerusakan/edit/'.$p['ID_PENILAIAN']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('penilaian_kerusakan/remove/'.$p['ID_PENILAIAN']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td> -->
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
