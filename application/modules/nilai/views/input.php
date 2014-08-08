
<form action="" method="post">

    <table class="table-responsive">
        <thead>
            <tr class="success">
                <th>#</th>
                <th>jadwal</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Absen</th>
                <th>Tugas</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Nilai</th>
                
            </tr>
        </thead>
        <tbody >
            <?php if ($mahasiswa): ?>
                <?php
                $i = 1;
                foreach ($mahasiswa as $mhs) :
                    ?>
                        <?php
               $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
               echo form_open_multipart('', $attributes);
               ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                          
                        <td>
                 
                   <?php echo form_dropdown('id_jadwal', $jadwal,'' , 'class="form-control"'); ?>
                        </td>
                          
                        <td>
                           <?php $data = array('class' => 'form-control', 'id' => 'inputID', 'name' => 'nim'); ?>
                        <?php echo form_input($data, set_value('nim', $mhs->nim)); ?>
                        
                        </td>
                        <td>
                          <?php $data = array('class' => 'form-control', 'id' => 'inputkls', 'name' => 'nama'); ?>
                        <?php echo form_input($data, set_value('nama', $mhs->nama)); ?>
                        </td>
                        <td>
                         <?php
                        $attr = attr(array('form-control', 'input_namaprodi', 'absen', 'length', '3-50', 'Nama Jabatan harus berisi 3-12 karakter'));
                             ?>
                        <?php echo form_input($attr); ?>
                        </td>
                        
                        <td>
                          <?php
            $attr = attr(array('form-control', 'input_namaprodi', 'nm_prodi', 'length', '3-50', 'Nama Jabatan harus berisi 3-12 karakter'));
            ?>
            <?php echo form_input($attr); ?>
                        </td>
                        
                        <td>
                          <?php
            $attr = attr(array('form-control', 'input_namaprodi', 'nm_prodi', 'length', '3-50', 'Nama Jabatan harus berisi 3-12 karakter'));
            ?>
            <?php echo form_input($attr); ?>
                        </td>
                        
                        <td>
                          <?php
            $attr = attr(array('form-control', 'input_namaprodi', 'nm_prodi', 'length', '3-50', 'Nama Jabatan harus berisi 3-12 karakter'));
            ?>
            <?php echo form_input($attr); ?>
                        </td>
                        
                        <td>
                          <?php
                        $attr = attr(array('form-control', 'input_namaprodi', 'nm_prodi', 'length', '3-50', 'Nama Jabatan harus berisi 3-12 karakter'));
                        ?>
                        <?php echo form_input($attr); ?>
                        </td>
                        
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
     
            <?php
            $data = array(
                "value" => 'Input semua',
                "class" => 'btn btn-xs btn-success',
                "id" => 'x',
                "name" => 'submit'
            );
            ?>
            <?php echo form_submit($data); ?>
            
        
    <?php echo form_close(); ?>
    </form>
    <script>
        $.validate({
            form: '#myForm',
            modules: 'security',
        });
    </script>