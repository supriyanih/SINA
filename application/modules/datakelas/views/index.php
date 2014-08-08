<div class="page-header">
    <h1>Data Program Studi</h1>
</div>
    <table class="table table-hover table-responsive">
        <thead>
            <tr class="success">
                <th>#</th>
                <th>Kode program studi</th>
                <th>Nama program studi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($prodi): ?>
                <?php
                $i = 1;
                foreach ($prodi as $pro) :
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $pro->kd_prodi; ?></td>
                        <td><?php echo $pro->nm_prodi; ?></td>
                        <td>
                            <?php echo btn_edit('prodi/edit/' . $pro->id_prodi); ?>
                            <?php echo btn_delete('prodi/delete/' . $pro->id_prodi); ?>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>
            <?php else: ?>
                <tr><td>Belum ada data !</td></tr> 
            <?php endif; ?>
                <tr><td colspan="4"><a href="<?php echo base_url('/prodi/tambah'); ?>" class="btn btn-xs btn-success"><strong>+</strong>Tambah Data</a>
        </tbody>
    </table>