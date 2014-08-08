<legend><i class="glyphicon glyphicon-globe"></i>Edit Jadwal</legend>
<div class="col-md-6">
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open_multipart('', $attributes);
    ?>
    
    <div class="form-group">
        <label for="">Kode Jadwal</label>
       
            <?php $data = array('class' => 'form-control', 'id' => 'inputID', 'name' => 'kd_jadwal'); ?>
            <?php echo form_input($data, set_value('kd_jadwal', $jadwal->kd_jadwal)); ?>
            <?php echo form_hidden('id_jadwal' , set_value('id_jadwal', $jadwal->id_jadwal)); ?>
        
    </div> 
    

    
  <div class="form-group">
 <label for="">Kode Kelas</label>
<?php echo form_dropdown('id_kelas', $kelas, $jadwal->id_kelas, 'class="form-control"'); ?>
 </div>

<div class="form-group">
         <label for="">Mata Kuliah</label>  
           
<?php echo form_dropdown('id_matkul', $matkul, $jadwal->id_matkul, 'class="form-control"'); ?>
 </div>
    
   <div class="form-group">
         <label for="">Kode Semester</label>  
           
<?php echo form_dropdown('id_smtr', $smstr, $jadwal->id_smtr, 'class="form-control"'); ?>
 </div> 
    
    
    <div class="form-group">
         <label for="">Dosen</label>  
           
<?php echo form_dropdown('nip_dosen', $dosen, $jadwal->nip_dosen, 'class="form-control"'); ?>
    </div>
    
    
     <div class="form-group">
        <label for="">Tahun Ajaran</label>
       
            <?php $data = array('class' => 'form-control', 'id' => 'inputID', 'name' => 'thn_akademik'); ?>
            <?php echo form_input($data, set_value('thn_akademik', $jadwal->thn_akademik)); ?>
        
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
    
</div>
    <?php echo form_close(); ?>
    <script>
        $.validate({
            form: '#myForm',
            modules: 'security',
        });
    </script>