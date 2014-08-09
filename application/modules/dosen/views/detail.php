<div class="alert alert-info">
  <i class="glyphicon glyphicon-time"></i>
  
  
  <strong>JADWAL PERKULIAHAN</strong> 
</div>
           
            <table class="table table-hover table-responsive table-bordered" >
                <thead >
                    <tr class="success">
                        <th>No</th>
                        
                        <th>Mata Kuliah</th>
                        <th>KLS</th>
                        <th>SMT</th>
                        <th>Jadwal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($jadwal): ?>
                    <?php 
                     $i = 1;
                    foreach ($jadwal as $jad):
                        
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            
                            <td> <?php echo $jad->nm_matkul; ?>  </td>
                            <td><?php echo $jad->kd_kelas; ?></td>
                            <td><?php echo $jad->kd_smstr; ?></td>
                            <td>
                                <?php echo $jad->hari; ?>
                                /
                                <?php echo $jad->mulai; ?>
                                -
                                <?php echo $jad->selesai; ?>
                                /
                                <?php echo $jad->ruang; ?>
                            </td>
                            <td>
                                  
      <a href="<?php echo base_url('dosen/nilai_mhs/' .$jad->kd_jadwal ); ?>" class="btn btn-xs btn-info"><strong>+</strong>Nilai</a>                          
                            </td>
                        </tr>
                    <?php 
                    $i++;
                    endforeach; ?>
                    <?php else: ?>
                        <tr><td>BELUM ADA JADWAL !</td></tr> 
                    <?php endif; ?>
                </tbody>
            </table>

  