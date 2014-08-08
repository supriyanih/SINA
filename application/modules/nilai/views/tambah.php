<form action="" method="post">
    <table class="table-responsive" >
        <tr>
            <td>No</td>
            <td>KD Jadwal</td>
            <td>Nim</td>
            <td>Nama</td>
            <td>Absen</td>
            <td>Tugas</td>
            <td>UTS</td>
            <td>UAS</td>
            <td>Nilai</td>
        </tr>

        <?php 
        
       for($i=1;$i<=$jumlah;$i++): 
          
            ?>
         <?php if ($mahasiswa):?>
       
                <?php
                $i = 1;
                foreach ($mahasiswa as $mhs) :
                    ?>
        <tr>
            
                <td><?php echo $i ?></td>
                <td><input class="form-control" name="data[<?php echo $i ?>][id_jadwal]" value="<?php echo $jadwal; ?>"/></td>        
                <td><input class="form-control" name="data[<?php echo $i ?>][nim]" value="<?php echo $mhs->nim; ?>"  /></td>
                <td><input class="form-control" name="data[<?php echo $i ?>][nama]" value="<?php echo $mhs->nama; ?>" /></td>
                <td><input class="form-control" name="data[<?php echo $i ?>][absen]" /></td>
                <td><input class="form-control" name="data[<?php echo $i ?>][tugas]" /></td>
                <td><input class="form-control" name="data[<?php echo $i ?>][uts]" /></td>
                <td><input class="form-control" name="data[<?php echo $i ?>][uas]" /></td>
                <td><input class="form-control" name="data[<?php echo $i ?>][grade]" /></td>
                
             
        </tr>
         <?php
                    $i++;
                endforeach;
                ?>
         <?php else: ?>
                <tr><td>Belum Ada Mahasiswa !</td></tr> 
            <?php endif; ?>
                
       <?php endfor ?>   
        
    </table>
    <input type="submit" value="simpan semua" class="btn btn-success btn-xs" />
</form>
