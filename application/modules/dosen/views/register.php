<div class="col-md-12">
    <div class="row">
        <div class="col-md-12 col-md-5">
            <legend><i class="glyphicon glyphicon-plus-sign"></i>Tambah Dosen</legend>
            <?php
            $attributes = array('class' => 'form', 'id' => 'myForm', 'role' => 'form');
            echo form_open_multipart('', $attributes);
            ?>
            <?php
            $data = array(
                'class' => 'form-control',
                'id' => 'inputnip',
                'placeholder' => 'NIP',
                'name' => 'nip',
                'data-validation' => 'length alphanumeric',
                'data-validation-length' => 'min5',
                'data-validation-error-msg' => 'NIP minimal 5 huruf dan hanya boleh huruf dan angka'
            );
            ?>
            <?php
            echo form_input($data);
            ?>
            <?php
            $data = array(
                'class' => 'form-control',
                'type' => 'password',
                'id' => 'passid',
                'name' => 'passid',
                'placeholder' => 'Password',
                'data-validation' => 'length',
                'data-validation-length' => 'min5',
                'data-validation-error-msg' => 'Password min 5 karakter'
            );
            ?>
            <?php echo form_input($data); ?>
            <?php
            $data = array(
                'class' => 'form-control',
                'id' => 'nama',
                'placeholder' => 'Nama',
                'name' => 'nama',
                'data-validation' => 'length',
                'data-validation-length' => 'min3',
                'data-validation-error-msg' => 'Nama min 3 karakter'
            );
            ?>
            <?php echo form_input($data); ?>
            <label for="">Tempat Tgl Lahir</label>
            <div class="">
                <div class="row">
                    <div class="col-md-5">
                        <?php
                        $data = array(
                            'class' => 'form-control',
                            'id' => 'inputTmptLahir',
                            'name' => 'tmpt_lahir',
                            'placeholder' => 'Tempat Lahir',
                            'data-validation' => 'length',
                            'data-validation-length' => 'min3',
                            'data-validation-error-msg' => 'Tempat Lahir min 3 karakter'
                        );
                        ?>
                        <?php echo form_input($data); ?>
                    </div>
                    <div class="col-md-5">
                        <?php
                        $data = array(
                            'class' => 'datepicker form-control',
                            'id' => 'inputTglLahir',
                            'name' => 'tgl_lahir',
                            'data-validation' => 'date',
                            'data-validation-format' => 'yyyy-mm-dd',
                            'data-validation-help' => 'Format yyyy-mm-dd',
                            'data-validation-error-msg' => 'Salah memasukan tanggal lahir'
                        );
                        ?>
                        <?php echo form_input($data); ?>
                    </div>
                </div>
            </div>
            <label class="radio-inline">
                <input type="radio" name="jenkel" id="inlineCheckbox1" value="P" checked />
                Perempuan
            </label>
            <label class="radio-inline">
                <input type="radio" name="jenkel" id="inlineCheckbox2" value="L" />
                Laki - Laki
            </label><br /><br/>
            
            <?php
            $data = array(
                'class' => 'form-control',
                'id' => 'inputAlamat',
                'name' => 'alamat',
                'placeholder' => 'alamat',
                'data-validation' => 'length',
                'data-validation-length' => 'min5',
                'data-validation-error-msg' => 'Alamat min 5 karakter'
            );
            ?>
            <?php echo form_textarea($data); ?>
        </div>
 
     <div class="col-sm-2 col-md-6">
    <legend><i class="glyphicon glyphicon-envelope"></i></legend>
        
            <?php
            $data = array(
                'class' => 'form-control',
                'id' => 'email',
                'placeholder' => 'Email',
                'name' => 'email',
                'data-validation' => 'length',
                'data-validation-length' => 'min9',
                'data-validation-error-msg' => 'Email min 9 karakter'
            );
            ?>
            <?php echo form_input($data); ?>
            <?php
            $data = array(
                'class' => 'form-control',
                'id' => 'telpon',
                'placeholder' => 'Telpon',
                'name' => 'telpon',
                'data-validation' => 'length',
                'data-validation-length' => 'min11',
                'data-validation-error-msg' => 'Telpon min 11 karakter'
            );
            ?>
            <?php echo form_input($data); ?>
           
             <?php echo form_hidden('id_jab' , set_value('id_jab', '2')); ?>
    <label for=""><span class="glyphicon glyphicon-picture" ></span>  Foto </label>
            <?php echo form_upload('foto'); ?>
            <br />
            <br />
            <?php
            $data = array(
                "value" => 'Submit',
                "class" => 'btn btn-primary btn-sm',
                "id" => 'x',
                "name" => 'submit'
            );
            ?>
            <?php echo form_submit($data); ?>
            <?php echo form_reset('reset', 'Reset', 'class="btn btn-primary btn-sm"'); ?>
<?php echo form_close(); ?>
        </div>
    </div>
</div>
 
<script>
    $(function() {
        $('.datepicker').datepicker({dateFormat: "yy-mm-dd"});
    });</script>
<script>
    $.validate({
        form: '#myForm',
        modules: 'security,date',
        validateOnBlur: false, // disable validation when input looses focus
        errorMessagePosition: 'top', // Instead of 'element' which is default
        onError: function() {
            alert('Registrasi Gagal Coba cek lagi!');
        },
    });
</script>
</div>   