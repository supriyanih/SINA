<div class="page-header">
    <h1>Edit Data Jabatab</h1>
</div>
<div class="col-md-12">
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open('', $attributes);
    ?>
    <div class="form-group">
        <label for="inputJab" class="col-lg-2 control-label">Kode Jabatan</label>
        <div class="col-lg-3">
            <?php
            $attr = attr(array('form-control', 'input_kdjab', 'kd_jab', 'length', '3-12', 'Kode Jabatan harus berisi 3-12 karakter'));
            ?>
            <?php echo form_input($attr , set_value('kd_jab', $jabatan->kd_jab)); ?>
            <?php echo form_hidden('id_jab' , set_value('id_jab', $jabatan->id_jab)); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Nama Jabatan</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control', 'input_namajab', 'n_jab', 'length', '3-12', 'Nama Jabatan harus berisi 3-12 karakter'));
            ?>
            <?php echo form_input($attr , set_value('n_jab', $jabatan->n_jab)); ?>
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