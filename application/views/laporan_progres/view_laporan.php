<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Laporan Progress</h3>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
						<th>ID PROGRESS</th>
                        <th>PERSENTASE PROGRESS</th>
                        <th>ID KONSULTAN</th>
						<th>NAMA PROGRESS</th>					
						<th>TANGGAL</th>                                                
						<th>FOTO1</th>
						<th>FOTO2</th>
						<th>FOTO3</th>						
						<!-- <th>Actions</th> -->
                    </tr>
                    <?php foreach($laporan_progress as $l){
                            $foto_url = base_url().'/uploads/'.$l['FOTO1'];
                            $foto_url2 = base_url().'/uploads/'.$l['FOTO2'];
                            $foto_url3 = base_url().'/uploads/'.$l['FOTO3'];
                            
                     ?>
                    <tr>
						<td><?php echo $l['ID_PROGRESS']; ?></td>
                        <td><?php echo $l['PERSENTASE_PROGRESS']; ?></td>
                        <td><?php echo $l['ID_KONSULTAN']; ?></td>
						<td><?php echo $l['NAMA_PROGRESS']; ?></td>						
						<td><?php echo $l['TANGGAL']; ?></td>
                        <td>
                                <a href="<?php echo $foto_url;?>" target="_blank">
                                <img src="<?php echo $foto_url;?>" alt="<?php echo $l['FOTO1'] ?>" width="50px">
                                </a>
                        </td>
                        <td>
                                <a href="<?php echo $foto_url2;?>" target="_blank">
                                <img src="<?php echo $foto_url2;?>" alt="<?php echo $l['FOTO2'] ?>" width="50px">
                                </a>
                        </td>
                        <td>
                                <a href="<?php echo $foto_url3;?>" target="_blank">
                                <img src="<?php echo $foto_url3;?>" alt="<?php echo $l['FOTO3'] ?>" width="50px">
                                </a>
                        </td>
						
					<!-- 	<td>
                            <a href="<?php echo site_url('laporan_progres/edit/'.$l['ID_PROGRESS']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('laporan_progres/remove/'.$l['ID_PROGRESS']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td> -->
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
