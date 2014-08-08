
<legend><i class="glyphicon glyphicon-globe"></i>Nilai Mahasiswa</legend>

    <table class="table table-hover table-responsive table-bordered">
        <thead>
            <tr class="success">
                <th>No</th>
                <th>KD Jadwal</th>
                <th>KD M.K</th>
                <th>Mata Kuliah</th>
                <th>MK. Smt</th>
                <th>SKS</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Nilai</th>
                <th>M.A</th>
                <th>Total</th>
                <th>T.A</th>
                 <th>Semt. Tempuh</th>
               
            </tr>
        </thead>
        <tbody>
            <?php if ($nilai): ?>
                <?php
                $totalnb=0;
                $totalsks=0;
                $i = 1;
                foreach ($nilai as $nil) :
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $nil->kd_jadwal; ?></td>
                        <td><?php echo $nil->kd_matkul; ?></td>
                        <td><?php echo $nil->nm_matkul; ?></td>
                        <td><?php echo $nil->kd_smstr; ?></td>
                        <td><?php echo $nil->sks; ?></td>
                        <td><?php echo $nil->nim; ?></td>
                        <td><?php echo $nil->nama; ?></td>
                        <td><?php echo $nil->grade; ?></td>
                         <td><?php echo $nil->bobot; ?></td>
                         <td><?php echo $nil->ttl; ?></td>
                        <td><?php echo $nil->thn_akademik; ?></td>
                      
                        <td>
                       </td>
                    </tr>
                   
                    <?php
                    $i++;
                    if($nil->grade != 'T'){
                        $totalnb +=$nil->ttl;
                        $totalsks+=$nil->sks;
                    }
                endforeach;
                $ip=0;
                if($totalnb != 0)
                    $ip = round($totalnb/$totalsks,2);
               echo'<tr>
	        <td colspan="8" align="center"><strong>Jumlah SKS yang telah diselesaikan : '.$totalsks.' SKS</strong></td>
	        <td colspan="6" align ="center"><strong>IP Kumulatif : '.$ip.'</strong></td>
	        </tr>  ';
                ?>
                   
                    
            <?php else: ?>
                <tr><td>Belum ada data !</td></tr> 
            <?php endif; ?>
             
        </tbody>
    </table>