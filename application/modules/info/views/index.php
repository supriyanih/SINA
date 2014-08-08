<legend><i class="glyphicon glyphicon-tags"></i>Info Kampus</legend> 
    <table class="table table-hover table-responsive">
        <thead>
            <tr class="success">
                <th>#</th>
                <th>Judul</th>
                <th>Info</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($info): ?>
                <?php
                $i = 1;
                foreach ($info as $mat) :
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $mat->judul; ?></td>
                        <td><?php echo $mat->info; ?></td>
                        <td><?php echo $mat->tgl_post; ?></td>
                        <td>
                            <?php echo btn_edit('info/edit/' . $mat->id); ?>
                            <?php echo btn_delete('info/delete/' . $mat->id); ?>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>
            <?php else: ?>
                <tr><td>Belum ada data !</td></tr> 
            <?php endif; ?>
                <tr><td colspan="4"><a href="<?php echo base_url('/info/tambah'); ?>" class="btn btn-xs btn-success"><strong>+</strong>Tambah Data</a>
        </tbody>
    </table>