
<div class="alert alert-success">
  <b  >DATA JADWAL SELESAI</b>
</div>


    <table class="table table-hover table-responsive">
        <thead>
            <tr class="success">
                <th>No</th>
                <th>KD JADWAL</th>
                <th>KD KLS</th>
                <th>MATA KULIAH</th>
                <th>SMSTR</th>
                <th>DOSEN</th>
                <th>JADWAL</th>
                <th>Tahun Ajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($jadwal): ?>
                <?php
                $i = 1;
                foreach ($jadwal as $jad) :
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $jad->kd_jadwal; ?></td>
                        <td><?php echo $jad->kd_kelas; ?></td>
                        <td><?php echo $jad->nm_matkul; ?></td>
                        <td><?php echo $jad->kd_smstr; ?></td>
                        <td><?php echo $jad->nama; ?></td>
                        <td>
                            <?php echo $jad->hari; ?>
                            /
                            <?php echo $jad->mulai; ?>
                            -
                            <?php echo $jad->selesai; ?>
                            /
                            <?php echo $jad->ruang; ?>
                        </td>
                        <td><?php echo $jad->thn_akademik; ?></td>
                        <td>
                               
                            <a href="<?php echo base_url('/jadwal/getmahasiswa/'. $jad->kd_jadwal ); ?>" 
                               class="btn btn-xs btn-success"><i class=" glyphicon glyphicon-cog"></i>Data MHS
                            </a>
                            
                            
                            <a href="<?php echo base_url('/jadwal/jadwal_aktif/'. $jad->kd_jadwal ); ?>" 
                                class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove-circle"></i>Aktifkan
                            </a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>
            <?php else: ?>
                <tr><td>Belum ada data !</td></tr> 
            <?php endif; ?>
                
        </tbody>
    </table>

