    <table class="table table-bordered" >
         <thead>
             <tr class="success">
            <td>No</td>
            <td>Nim</td>
            <td>Nama</td>
            <td>Absn</td>
            <td>Tgs</td>
            <td>UTS</td>
            <td>UAS</td>
            <td>Nilai</td>
            <td>Aksi</td>
        </tr>
         </thead>
<?php if ($mahasiswa):?>
 
                <?php
                $i = 1;
                foreach ($mahasiswa as $mhs) :
                    ?>
        <tr>
            
                <td><?php echo $i ?></td>
                <td><?php echo $mhs->nim; ?> </td>
                <td><?php echo $mhs->nama; ?> </td>
                <td><?php echo $mhs->absen; ?> </td>
                <td><?php echo $mhs->tugas; ?> </td>
                <td><?php echo $mhs->uts; ?> </td>
                <td><?php echo $mhs->uas; ?> </td>
                <td><?php echo $mhs->grade; ?> </td>
                <td>
                  <a href="<?php echo base_url('dosen/input_nilai/' .$mhs->id ); ?>" class="btn btn-xs btn-success"><strong>+</strong>Nilai</a>    
                </td>
                
             
        </tr>
         <?php
                    $i++;
                endforeach;
                ?>
        
      
         <?php else: ?>
        <tr><td><strong>Belum Ada Mahasiswa ! harap hubungi pihak administrasi</strong></td></tr> 
                  
            <?php endif; ?>
    </table>
   

