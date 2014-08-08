<legend><i class="glyphicon glyphicon-floppy-save"></i>Input Nilai</legend>

<div class="col-md-12">
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open('', $attributes);
    ?>
    <div class="form-group ">
        <label for="inputMatkul" class="col-lg-2 control-label">NIM</label>
        <div class="col-lg-3">
            <?php
            $attr = attr(array('form-control input-sm', 'input_kdsmstr', 'nim', 'length', '1-12', 'Kode  harus berisi 2-12 karakter'));
            ?>
            <?php echo form_input($attr , set_value('nim', $nilai->nim)); ?>
            <?php echo form_hidden('id' , set_value('id', $nilai->id)); ?>
            <?php echo form_hidden('id_jadwal' , set_value('id_jadwal', $nilai->id_jadwal)); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">NAMA</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control input-sm', 'input_namasmstr', 'nama', 'length', '1-50', 'nilai berisi 1-12 karakter'));
            ?>
            <?php echo form_input($attr , set_value('nama', $nilai->nama)); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">ABSEN</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control input-sm', 'input_namasmstr', 'absen', 'length', '1-2', 'absen berisi 1-2 angka'));
            ?>
            <?php echo form_input($attr , set_value('absen', $nilai->absen)); ?>
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">TUGAS</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control input-sm', 'input_namasmstr', 'tugas', 'length', '1-2', 'nilai tugas harus berisi 1-2 angka'));
            ?>
            <?php echo form_input($attr , set_value('tugas', $nilai->tugas)); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">UTS</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control input-sm', 'input_namasmstr', 'uts', 'length', '1-2', 'nilai UTS berisi 1-2 angka'));
            ?>
            <?php echo form_input($attr , set_value('uts', $nilai->uts)); ?>
        </div>
    </div>
    <div class="form-group ">
        <label for="inputName" class="col-lg-2 control-label">UAS</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control input-sm', 'input_namasmstr', 'uas', 'length', '1-2', 'nilai berisi 1-2 angka'));
            ?>
            <?php echo form_input($attr , set_value('uas', $nilai->uas)); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Grade</label>
        <div class="col-lg-7">
                        <?php
            $attr = attr(array('form-control input-sm', 'input_namasmstr', 'grade', 'length', '0-1', 'nilai berisi 1 karakter atau kosongkan'));
            ?>
            <?php echo form_input($attr , set_value('grade', $nilai->grade)); ?>
        </div>
    </div>
    
     
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php
            $data = array(
                "value" => 'simpan',
                "class" => 'btn btn-primary',
                "id" => 'x',
                "name" => 'submit'
            );
            ?>
            <?php echo form_submit($data); ?>
            
        </div>
    </div>
    <?php echo form_close(); ?>
    
    
    <script>
        $.validate({
            form: '#myForm',
            modules: 'security',
        });
    </script>
