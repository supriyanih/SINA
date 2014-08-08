
<legend><h5 align="center"><strong>TRANSKRIP NILAI </strong></h5>
   <?php if ($mahasiswa){
     echo ' <h6><strong>Nama&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp; '.$mahasiswa->nama.'</strong></h6>
    <h6><strong>Nim&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp; '.$mahasiswa->nim.'</strong></h6>
    ' ;
       
   }else{
       echo 'Nim Mahasiswa salah';
   } ?>
   
   
    
</legend>

    <table class="table table-hover table-responsive table-bordered">
        <thead>
            <tr class="success">
                <th>No</th>
                <th>Kode</th>
                <th>Mata Kuliah</th>
                <th>MK. Smt</th>
                <th>SKS</th>
                <th>Nilai</th>
                <th>A.M</th>
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
                        <td><?php echo $nil->kd_matkul; ?></td>
                        <td><?php echo $nil->nm_matkul; ?></td>
                        <td><?php echo $nil->kd_smstr; ?></td>
                        <td><?php echo $nil->sks; ?></td>
                        <td><?php echo $nil->grade; ?></td>
                        <td><?php echo $nil->ttl; ?></td>
                        <td><?php echo $nil->thn_akademik; ?></td>
                        <td><?php echo $nil->smtr_tmp; ?></td>
                    </tr>
                  
                    <?php
                    $i++;
                    if($nil->grade != 'T'){
                        $totalnb +=$nil->ttl;
                        $totalsks+=$nil->sks;
                    }
                endforeach;
                $ip=0;
                $totalmk= $i-1;
                if($totalnb != 0)
                    $ip = round($totalnb/$totalsks,2);
               echo'<tr>
                  <td colspan="3" align ="center"><strong> Jumlah : '.$totalmk.' Mata kuliah</strong></td>   
                   <td></td>
                   <td><b>'.$totalsks.'</b></td>
	        
                
                <td><strong></strong></td>
                <td><strong>'.$totalnb.'</strong></td>
                <td><strong></strong></td>
                    <td><strong></strong></td>
	        
	        </tr>  ';
                ?>
                   
        <td colspan="10" align ="center"><b><strong>Indeks Prestasi Kumulatif : <?php  echo $ip;?></strong></b></td>   
            <?php else: ?>
                <tr><td>Belum ada data !</td></tr> 
            <?php endif; ?>
             
        </tbody>
    </table>


