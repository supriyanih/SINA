<div class="col-md-12">
    <div class="row">
        <div class="col-md-12 col-md-5">
            <legend><i class="glyphicon glyphicon-globe"></i>Buat Jadwal</legend>
            <?php
            $attributes = array('class' => 'form', 'id' => 'myForm', 'role' => 'form');
            echo form_open_multipart('', $attributes);
            ?>
             <label for="">Kode Jadwal</label>
            <?php
            $data = array(
                'class' => 'form-control',
                'id' => 'inputjdwl',
                'placeholder' => '',
                'name' => 'kd_jadwal',
                'data-validation' => 'length',
                'data-validation-length' => 'min2',
                'data-validation-error-msg' => 'kode jadwal minimal 2 karakter'
            );
            ?>
            <?php echo form_input($data); ?>
             
              <label for="">Kelas</label>
             <?php echo form_dropdown('id_kelas', $kelas, '', 'class="form-control"'); ?>
              
              <label for="">Mata Kuliah</label>
             <?php echo form_dropdown('id_matkul', $matkul, '', 'class="form-control"'); ?>
              
              <label for="">Semester</label>
             <?php echo form_dropdown('id_smtr', $smstr, '', 'class="form-control"'); ?>
              
              <label for="">Dosen</label>
             <?php echo form_dropdown('nip_dosen', $dosen, '', 'class="form-control"'); ?>
              
              <label for="">Tahun Akademik</label>
            <?php
            $data = array(
                'class' => 'form-control',
                'id' => 'inputthn',
                'placeholder' => '',
                'name' => 'thn_akademik',
                'data-validation' => 'length',
                'data-validation-length' => 'min2',
                'data-validation-error-msg' => 'tahun harus di sini karakter'
            );
            ?>
             <?php echo form_input($data); ?>
            
        <label for="">Semester Tempuh</label>
            <?php
            $data = array(
                'class' => 'form-control',
                'id' => 'inputthn',
                'placeholder' => '',
                'name' => 'smtr_tmp',
                'data-validation' => 'length',
                'data-validation-length' => 'min2',
                'data-validation-error-msg' => 'tahun harus di sini karakter'
            );
            ?>
             <?php echo form_input($data); ?>
        
        </div>
        
        
        
    <div class="col-sm-2 col-md-6"> 
        <legend><i class="glyphicon glyphicon-time"></i>Waktu</legend>
            <label for="">Hari</label>
             <?php echo form_dropdown('hari', $hari, '', 'class="form-control"'); ?>  
        
        
            <label for="">Jam Mulai :</label>
            <?php
            $data = array(
                'class' => 'form-control',
                'id' => 'inputthn',
                'placeholder' => '',
                'name' => 'mulai',
                'data-validation' => 'length',
                'data-validation-length' => 'min2',
                'data-validation-error-msg' => 'tahun harus di sini karakter'
            );
            ?>
             <?php echo form_input($data); ?>
        
        <label for="">Jam selesai :</label>
            <?php
            $data = array(
                'class' => 'form-control',
                'id' => 'selesai',
                'placeholder' => '',
                'name' => 'selesai',
                'data-validation' => 'length',
                'data-validation-length' => 'min2',
                'data-validation-error-msg' => 'tahun harus di sini karakter'
            );
            ?>
             <?php echo form_input($data); ?>
        
        <label for="">Ruangan</label>
            <?php
            $data = array(
                'class' => 'form-control',
                'id' => 'ruang',
                'placeholder' => '',
                'name' => 'ruang',
                'data-validation' => 'length',
                'data-validation-length' => 'min2',
                'data-validation-error-msg' => 'tahun harus di sini karakter'
            );
            ?>
             <?php echo form_input($data); ?>
            
            <?php echo form_hidden('status' , set_value('status', '0')); ?>
        
        
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
    
</div>

<script>
   
</script>
