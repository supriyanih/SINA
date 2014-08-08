<table class=" table table-hover table-responsive">
    <thead>
        <tr class=" alert-info">
    
        <td> <strong> KD: <?php echo $jadwal->kd_jadwal; ?> </strong> </td>
        <td><strong> KD M.K  : <?php echo $jadwal->id_matkul; ?> </strong> </td>
        <td><strong> Dosen   : <?php echo $jadwal->nip_dosen; ?> </strong> </td>
        <td><strong> Kelas   : <?php echo $jadwal->id_kelas; ?> </strong></td>
   
        </tr>
</thead>
</table>
    <table class="table table-bordered" >
         <thead>
             <tr class="success">
            <td>No</td>
            <td>Nim</td>
            <td>Nama</td>
            <td>Absen</td>
            <td>Tugas</td>
            <td>UTS</td>
            <td>UAS</td>
            <td>Nilai</td>
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
             
        </tr>
         <?php
                    $i++;
                endforeach;
                ?>
        
      
         <?php else: ?>
        <tr><td><strong>Belum Ada Mahasiswa !</strong></td></tr> 
                <tr><td colspan="4"><a href="<?php echo base_url('nilai/inputnilai/' 
                        . $jadwal->id_kelas.'/'.$jadwal->kd_jadwal ); ?>" 
                        class="btn btn-xs btn-success"><strong>+</strong>Tambah Data Mahasiswa</a>
                  </td></tr>       
            <?php endif; ?>
    </table>
   

