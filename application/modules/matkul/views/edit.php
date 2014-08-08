<legend><i class="glyphicon glyphicon-edit"></i>Edit Mata Kuliah</legend>
<div class="col-md-12">
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open('', $attributes);
    ?>
    <div class="form-group">
        <label for="inputMatkul" class="col-lg-2 control-label">Kode Mata Kuliah</label>
        <div class="col-lg-3">
            <?php
            $attr = attr(array('form-control', 'input_kdmatkul', 'kd_matkul', 'length', '2-12', 'Kode mata kuliah harus berisi 2-12 karakter'));
            ?>
            <?php echo form_input($attr , set_value('kd_matkul', $matkul->kd_matkul)); ?>
            <?php echo form_hidden('id_matkul' , set_value('id_matkul', $matkul->id_matkul)); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Mata Kuliah</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control', 'input_namamatkul', 'nm_matkul', 'length', '4-12', 'Mata kuliah harus berisi 4-12 karakter'));
            ?>
            <?php echo form_input($attr , set_value('nm_matkul', $matkul->nm_matkul)); ?>
        </div>
    </div>
     <div class="form-group">
        <label for="inputSks" class="col-lg-2 control-label">SKS</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control', 'input_sks', 'sks', 'length', '1-3', 'SKS harus berisi 1-3 karakter'));
            ?>
            <?php echo form_input($attr , set_value('sks', $matkul->sks)); ?>
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