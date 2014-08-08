<legend><i class="glyphicon glyphicon-edit"></i>Data Program Studi</legend> 
<div class="col-md-12">
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open('', $attributes);
    ?>
    <div class="form-group">
        <label for="inputProdi" class="col-lg-2 control-label">Kode Program studi</label>
        <div class="col-lg-3">
            <?php
            $attr = attr(array('form-control', 'input_kdprodi', 'kd_prodi', 'length', '3-20', 'Kode jurusan harus berisi 3-12 karakter'));
            ?>
            <?php echo form_input($attr , set_value('kd_prodi', $prodi->kd_prodi)); ?>
            <?php echo form_hidden('id_prodi' , set_value('id_prodi', $prodi->id_prodi)); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Nama Jabatan</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control', 'input_namaprodi', 'nm_prodi', 'length', '3-50', 'Nama Jurusan harus berisi 3-12 karakter'));
            ?>
            <?php echo form_input($attr , set_value('nm_prodi', $prodi->nm_prodi)); ?>
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