<legend><i class="glyphicon glyphicon-user"></i>Data Staff</legend>  
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
                    
                </tr>
                <?php
                $i++;
            endforeach;
            ?>
        <?php else: ?>
            <tr><td>Belum ada data !</td></tr> 
        <?php endif; ?>
             
    </tbody>
</table>