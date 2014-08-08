<legend><i class="glyphicon glyphicon-tasks"></i>Data Kelas</legend> 
    <table class="table table-hover table-responsive">
        <thead>
            <tr class="success">
                <th>#</th>
                <th>Kode Kelas</th>
                <th>Kelas</th>
                <th>Tahun Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($kelas): ?>
                <?php
                $i = 1;
                foreach ($kelas as $kls) :
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $kls->kd_kelas; ?></td>
                        <td><?php echo $kls->nm_kelas; ?></td>
                        <td><?php echo $kls->thn_masuk; ?></td>
                        <td>
                            <?php echo btn_edit('kelas/edit/' . $kls->id_kelas); ?>
                            <?php echo btn_delete('kelas/delete/' . $kls->id_kelas); ?>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>
            <?php else: ?>
                <tr><td>Belum ada data !</td></tr> 
            <?php endif; ?>
                <tr><td colspan="4"><a href="<?php echo base_url('/kelas/tambah'); ?>" class="btn btn-xs btn-success"><strong>+</strong>Tambah Data</a>
        </tbody>
    </table>