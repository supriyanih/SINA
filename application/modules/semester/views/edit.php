<legend><i class="glyphicon glyphicon-edit"></i>Edit Semester</legend>
<div class="col-md-12">
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open('', $attributes);
    ?>
    <div class="form-group">
        <label for="inputMatkul" class="col-lg-2 control-label">Kode Semester</label>
        <div class="col-lg-3">
            <?php
            $attr = attr(array('form-control', 'input_kdsmstr', 'kd_smstr', 'length', '1-12', 'Kode  harus berisi 2-12 karakter'));
            ?>
            <?php echo form_input($attr , set_value('kd_smstr', $semester->kd_smstr)); ?>
            <?php echo form_hidden('id_smstr' , set_value('id_smstr', $semester->id_smstr)); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Semester</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control', 'input_namasmstr', 'nm_smstr', 'length', '1-12', 'Semester berisi 1-12 karakter'));
            ?>
            <?php echo form_input($attr , set_value('nm_smstr', $semester->nm_smstr)); ?>
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