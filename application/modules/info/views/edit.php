<legend><i class="glyphicon glyphicon-edit"></i>EDIT INFO KAMPUS</legend>
<div class="col-md-12">
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open('', $attributes);
    ?>
    <div class="form-group">
        <label for="inputMatkul" class="col-lg-2 control-label">JUDUL INFO</label>
        <div class="col-lg-3">
            <?php
            $attr = attr(array('form-control', 'input_kdmatkul', 'judul', 'length', '2-100', 'karakter 2-100'));
            ?>
            <?php echo form_input($attr , set_value('judul', $info->judul)); ?>
            <?php echo form_hidden('id' , set_value('id', $info->id)); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">INFO</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control', 'input_namamatkul', 'info', 'length', '4-250', 'karakter 4-250'));
            ?>
            <?php echo form_input($attr , set_value('info', $info->info)); ?>
        </div>
    </div>
     <div class="form-group">
        <label for="inputSks" class="col-lg-2 control-label">Tanggal Buat</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control', 'input_sks', 'tgl_post', 'length', '1-50', 'masih kosong'));
            ?>
            <?php echo form_input($attr , set_value('tgl_post', $info->tgl_post)); ?>
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