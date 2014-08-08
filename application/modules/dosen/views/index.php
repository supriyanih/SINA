
   <legend><i class="glyphicon glyphicon-user"></i>Data Dosen</legend>  

<table class="table table-hover table-responsive">
    <thead>
        <tr class="success">
            <th>#</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>alamat</th>
            <th>email</th>
            <th>telpon</th>
            <th>jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($staff): ?>
            <?php
            $i = 1;
            foreach ($staff as $p) :
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $p->nip; ?></td>
                    <td><?php echo $p->nama; ?></td>
                    <td><?php echo $p->alamat; ?></td>
                    <td><?php echo $p->email; ?></td>
                    <td><?php echo $p->telpon; ?></td>
                    <td><?php echo $p->n_jab; ?></td>
                    <td>
                        <?php echo btn_edit('dosen/edit/' . $p->nip); ?>
                        <?php echo btn_delete('dosen/delete/' . $p->nip); ?>
                        <a href="<?php echo base_url('dosen/detail/' . $p->nip); ?>" class="btn btn-default btn-xs btn-info" ><span class="glyphicon glyphicon-cog"></span> Detail</a>
                    </td>
                </tr>
                <?php
                $i++;
            endforeach;
            ?>
        <?php else: ?>
            <tr><td>Belum ada data !</td></tr> 
        <?php endif; ?>
             <tr><td colspan="4"><a href="<?php echo base_url('/dosen/register'); ?>" class="btn btn-xs btn-success"><strong>+</strong>Tambah Dosen</a>
    </tbody>
</table>