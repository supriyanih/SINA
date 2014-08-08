<legend><i class="glyphicon glyphicon-tasks"></i>Semester</legend>
    <table class="table table-hover table-responsive">
        <thead>
            <tr class="success">
                <th>#</th>
                <th>Kode Semester</th>
                <th>Semester</th>
               
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($semester): ?>
                <?php
                $i = 1;
                foreach ($semester as $smstr) :
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $smstr->kd_smstr; ?></td>
                        <td><?php echo $smstr->nm_smstr; ?></td>
                        
                        <td>
                            <?php echo btn_edit('semester/edit/' . $smstr->id_smstr); ?>
                            <?php echo btn_delete('semester/delete/' . $smstr->id_smstr); ?>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>
            <?php else: ?>
                <tr><td>Belum ada data !</td></tr> 
            <?php endif; ?>
                <tr><td colspan="4"><a href="<?php echo base_url('/semester/tambah'); ?>" class="btn btn-xs btn-success"><strong>+</strong>Tambah Data</a>
        </tbody>
    </table>