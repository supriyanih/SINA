<legend><i class="glyphicon glyphicon-tasks"></i>BUAT INFO KAMPUS</legend> 
<div class="col-md-12">
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open('', $attributes);
    ?>
    <div class="form-group">
        <label for="inputmatkul" class="col-lg-2 control-label">JUDUL INFO</label>
        <div class="col-lg-3">
            <?php
            $attr = attr(array('form-control', 'input_kdmatkul', 'judul', 'length', '3-100', 'karakter harus 3-100'));
            ?>
            <?php echo form_input($attr); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">INFO KAMPUS</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control', 'input_namamatkul', 'info', 'length', '3-250', 'Nama Mata Kuliah harus berisi 3-12 karakter'));
            ?>
            <?php echo form_textarea($attr); ?>
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