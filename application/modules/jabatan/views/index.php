<div class="page-header">
    <h1>Data Jabatan</h1>
</div>
    <table class="table table-hover table-responsive">
        <thead>
            <tr class="success">
                <th>#</th>
                <th>Kode Jabatan</th>
                <th>Nama Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($jabatan): ?>
                <?php
                $i = 1;
                foreach ($jabatan as $jab) :
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $jab->kd_jab; ?></td>
                        <td><?php echo $jab->n_jab; ?></td>
                        <td>
                            <?php echo btn_edit('jabatan/edit/' . $jab->id_jab); ?>
                            <?php echo btn_delete('jabatan/delete/' . $jab->id_jab); ?>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>
            <?php else: ?>
                <tr><td>Belum ada data !</td></tr> 
            <?php endif; ?>
                <tr><td colspan="4"><a href="<?php echo base_url('/jabatan/tambah'); ?>" class="btn btn-xs btn-success"><strong>+</strong>Tambah Data</a>
        </tbody>
    </table>