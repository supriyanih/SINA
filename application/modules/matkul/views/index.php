<legend><i class="glyphicon glyphicon-tags"></i>Data Mata Kuliah</legend> 
    <table class="table table-hover table-responsive">
        <thead>
            <tr class="success">
                <th>#</th>
                <th>Kode Mata Kuliah</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($matkul): ?>
                <?php
                $i = 1;
                foreach ($matkul as $mat) :
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $mat->kd_matkul; ?></td>
                        <td><?php echo $mat->nm_matkul; ?></td>
                        <td><?php echo $mat->sks; ?></td>
                        <td>
                            <?php echo btn_edit('matkul/edit/' . $mat->id_matkul); ?>
                            <?php echo btn_delete('matkul/delete/' . $mat->id_matkul); ?>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>
            <?php else: ?>
                <tr><td>Belum ada data !</td></tr> 
            <?php endif; ?>
                <tr><td colspan="4"><a href="<?php echo base_url('/matkul/tambah'); ?>" class="btn btn-xs btn-success"><strong>+</strong>Tambah Data</a>
        </tbody>
    </table>