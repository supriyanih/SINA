<legend><i class="glyphicon glyphicon-user"></i>Data Mahasiswa</legend>
<table class="table table-hover table-responsive">
    <thead>
        <tr class="success">
            <th>#</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>Jurusan</th>
            <th>Data Kelas</th>
            <th>email</th>
            <th>telpon</th>
            
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($mhs): ?>
            <?php
            $i = 1;
            foreach ($mhs as $p) :
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $p->nim; ?></td>
                    <td><?php echo $p->nama; ?></td>
                     <td><?php echo $p->jenkel; ?></td>
                     <td><?php echo $p->nm_prodi; ?></td>
                    <td><?php echo $p->kd_kelas; ?></td>
                    <td><?php echo $p->email; ?></td>
                    <td><?php echo $p->telpon; ?></td>
                    
                   
                   
                    <td>
                        <?php echo btn_edit('mahasiswa/edit/' . $p->nim); ?>
                        <?php echo btn_delete('mahasiswa/delete/' . $p->nim); ?>
                        <a href="<?php echo base_url('mahasiswa/detail/' . $p->nim); ?>" class="btn btn-default btn-xs btn-info" ><span class="glyphicon glyphicon-cog"></span> Detail</a>
                    </td>
                </tr>
                <?php
                $i++;
            endforeach;
            ?>
        <?php else: ?>
            <tr><td>Belum ada data !</td></tr> 
        <?php endif; ?>
             <tr><td colspan="4"><a href="<?php echo base_url('/mahasiswa/register'); ?>" class="btn btn-xs btn-success"><strong>+</strong>Tambah Mahasiswa</a>
    </tbody>
</table>