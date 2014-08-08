<legend><i class="glyphicon glyphicon-edit"></i>Edit Kelas</legend>
<div class="col-md-12">
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open('', $attributes);
    ?>
    <div class="form-group">
        <label for="inputProdi" class="col-lg-2 control-label">Kode Kelas</label>
        <div class="col-lg-3">
            <?php
            $attr = attr(array('form-control', 'input_kdprodi', 'kd_kelas', 'length', '2-12', 'Kode Kelas harus berisi 3-12 karakter'));
            ?>
            <?php echo form_input($attr , set_value('kd_kelas', $kelas->kd_kelas)); ?>
            <?php echo form_hidden('id_kelas' , set_value('id_kelas', $kelas->id_kelas)); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Kelas</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control', 'input_namakls', 'nm_kelas', 'length', '2-12', 'Nama Jabatan harus berisi 3-12 karakter'));
            ?>
            <?php echo form_input($attr , set_value('nm_kelas', $kelas->nm_kelas)); ?>
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Tahun Masuk</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control', 'input_thnmsk', 'thn_masuk', 'length', '4', 'Nama Jabatan harus berisi 3-12 karakter'));
            ?>
            <?php echo form_input($attr , set_value('thn_masuk', $kelas->thn_masuk)); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php
            $data = array(
                "value" => 'Submit',
                "class" => 'btn btn-primary',
                "id" => 'x',
                "name" => 'submit'
            );
            ?>
            <?php echo form_submit($data); ?>
            <?php echo form_reset('reset', 'Reset', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
    <script>
        $.validate({
            form: '#myForm',
            modules: 'security',
        });
    </script>