<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List Data Permohonan Perbaikan</h3>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
						<th>ID PERMOHONAN</th>
						<th>NAMA SEKOLAH</th>
                        <th>JUDUL PERMOHONAN</th>
						<th>DESKRIPSI</th>
                        <th>TANGGAL</th>
                        <th>FOTO1</th>
                        <th>FOTO2</th>
                        <th>FOTO3</th>
                        <th>STATUS</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($permohonan_perbaikan as $p){ 
                             $foto_url = base_url().'/uploads/'.$p['FOTO1'];
                            $foto_url2 = base_url().'/uploads/'.$p['FOTO2'];
                            $foto_url3 = base_url().'/uploads/'.$p['FOTO3'];
                        ?>
                    <tr>
                        <td><?php echo $p['ID_PERMOHONAN']; ?></td>
                        <td><?php echo $p['NAMA_SEKOLAH']; ?></td>
                        <td><?php echo $p['JUDUL_PERMOHONAN']; ?></td>
						<td><?php echo $p['DESKRIPSI']; ?></td>
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
                        <td><?php echo $p['STATUS']; ?></td>
                       <td>
                            <a href="<?php echo site_url('permohonan_perbaikan/edit/'.$p['ID_PERMOHONAN']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Approval</a> 
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
