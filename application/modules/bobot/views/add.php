<div class="page-header">
    <h1>Tambah Mata Kuliah</h1>
</div>
<div class="col-md-12">
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open('', $attributes);
    ?>
    <div class="form-group">
        <label for="inputmatkul" class="col-lg-2 control-label">Kode Mata Kuliah</label>
        <div class="col-lg-3">
            <?php
            $attr = attr(array('form-control', 'input_kdmatkul', 'kd_matkul', 'length', '3-50', 'Kode Mata Kuliah harus berisi 3-12 karakter'));
            ?>
            <?php echo form_input($attr); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Mata Kuliah</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control', 'input_namamatkul', 'nm_matkul', 'length', '3-50', 'Nama Mata Kuliah harus berisi 3-12 karakter'));
            ?>
            <?php echo form_input($attr); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputSks" class="col-lg-2 control-label">SKS</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control', 'input_sks', 'sks', 'length', '1-3', 'SKS harus berisi 1-3 karakter'));
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