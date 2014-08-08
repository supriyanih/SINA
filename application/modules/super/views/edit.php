<legend><i class="glyphicon glyphicon-user"></i>Edit Super Admin</legend>
<div class="col-md-8">
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open_multipart('', $attributes);
    ?>
    <div class="form-group">
        <label for="inputNIP" class="col-lg-2 control-label">NIP</label>
        <div class="col-lg-3">
            <?php $data = array('class' => 'form-control', 'id' => 'inputID', 'name' => 'nip'); ?>
            <?php echo form_input($data, set_value('nip', $staff->nip)); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Full Name</label>
        <div class="col-lg-7">
<?php $data = array('class' => 'form-control', 'id' => 'nama', 'name' => 'nama'); ?>
<?php echo form_input($data, set_value('nama', $staff->nama)); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputTmptLahir" class="col-lg-2 control-label">Tempat Lahir</label>
        <div class="col-lg-7">
<?php $data = array('class' => 'form-control', 'id' => 'inputTmptLahir', 'name' => 'tmpt_lahir'); ?>
<?php echo form_input($data, set_value('tmpt_lahir', $staff->tmpt_lahir)); ?>
        </div>
    </div>
    <div class="form-group">
        <label for = "inputTmptLahir" class = "col-lg-2 control-label">Tgl Lahir</label>
        <div class = "col-lg-2">
            <?php $data = array('class' => 'datepicker form-control', 'id' => 'inputTglLahir', 'name' => 'tgl_lahir');
            ?>
<?php echo form_input($data, set_value('tgl_lahir', tgl_indo($staff->tgl_lahir))); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputJabatan" class="col-lg-2 control-label">Jenis Kelamin</label>
        <?php
        $disabled = array(
            'name' => 'jenkel',
            'id' => 'disabled',
            'value' => 'P',
            'checked' => $staff->jenkel == 'P' ? 'checked' : ''
        );

        $enabled = array(
            'name' => 'jenkel',
            'id' => 'enabled',
            'value' => 'L',
            'checked' => $staff->jenkel == 'L' ? 'checked' : ''
        );
        ?>
        <div class = "col-lg-5">
            <label class="radio-inline">
<?php echo form_radio($disabled); ?>
                Perempuan
            </label>
            <label class="radio-inline">
<?php echo form_radio($enabled); ?>
                Laki-laki
            </label>
        </div>
    </div>
    <div class="form-group">
        <label for = "inputAlamat" class = "col-lg-2 control-label">Alamat</label>
        <div class = "col-lg-7">
            <?php $data = array('class' => 'form-control', 'id' => 'inputAlamat', 'name' => 'alamat');
            ?>
<?php echo form_textarea($data, set_value('alamat', $staff->alamat)); ?>
        </div>
    </div>
     <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-7">
<?php $data = array('class' => 'form-control', 'id' => 'email', 'name' => 'email'); ?>
<?php echo form_input($data, set_value('email', $staff->email)); ?>
        </div>
    </div>
     <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Telpon</label>
        <div class="col-lg-7">
<?php $data = array('class' => 'form-control', 'id' => 'telpon', 'name' => 'telpon'); ?>
<?php echo form_input($data, set_value('telpon', $staff->telpon)); ?>
             <?php echo form_hidden('id_jab' , set_value('id_jab', $staff->id_jab)); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName1" class="col-lg-2 control-label">Foto</label>
        <div class="col-lg-2">
            <img src="<?php echo base_url() . 'assets/img/thumbnails/' . $staff->foto  ; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="inputName1" class="col-lg-2 control-label">Ganti Foto</label>
        <div class="col-lg-2">
<?php echo form_upload('foto'); ?>
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
            $(function() {
                $('.datepicker').datepicker({dateFormat: "yy-mm-dd"});
            });
        </script>