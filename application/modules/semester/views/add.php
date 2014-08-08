<legend><i class="glyphicon glyphicon-tasks"></i>Edit Mata Kuliah</legend>
<div class="col-md-10">
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open('', $attributes);
    ?>
    <div class="form-group">
        <label for="inputmatkul" class="col-lg-2 control-label">Kode Semester</label>
        <div class="col-lg-3">
            <?php
            $attr = attr(array('form-control', 'input_kdmatkul', 'kd_smstr', 'length', '1-50', 'Kode semester harus di isi'));
            ?>
            <?php echo form_input($attr); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Semester</label>
        <div class="col-lg-5">
                        <?php
            $attr = attr(array('form-control', 'input_namamatkul', 'nm_smstr', 'length', '1-50', 'Semester harus di isi'));
            ?>
            <?php echo form_input($attr); ?>
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