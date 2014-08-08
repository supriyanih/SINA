<legend><i class="glyphicon glyphicon-globe"></i>Edit Jadwal</legend>
<div class="col-md-12">
    <div class="row">
    <div class="col-md-12 col-md-5">
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open_multipart('', $attributes);
    ?>
    
        <div class="form-group">
                <label for="">Kode Jadwal</label>
                <?php $data = array('class' => 'form-control', 'id' => 'kd_jadwal', 'name' => 'kd_jadwal'); ?>
                <?php echo form_input($data, set_value('kd_jadwal', $jadwal->kd_jadwal)); ?>      
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
                <label for="">Semester Tempuh</label>
                <?php $data = array('class' => 'form-control', 'id' => 'inputID', 'name' => 'smtr_tmp'); ?>
                <?php echo form_input($data, set_value('smtr_tmp', $jadwal->smtr_tmp)); ?>      
        </div> 
    </div>
    
        
        
<div class="col-sm-2 col-md-6"> 
        
     <div class="form-group">
                <label for="">hari</label>            
                <?php echo form_dropdown('hari', $hari, $jadwal->hari, 'class="form-control"'); ?>
     </div>
    
     <div class="form-group">
                <label for="">Jam Mulai</label>
                <?php $data = array('class' => 'form-control', 'id' => 'inputID', 'name' => 'mulai'); ?>
                <?php echo form_input($data, set_value('mulai', $jadwal->mulai)); ?>      
     </div> 
    
     <div class="form-group">
                <label for="">Jam Selesai</label>
                <?php $data = array('class' => 'form-control', 'id' => 'inputID', 'name' => 'selesai'); ?>
                <?php echo form_input($data, set_value('selesai', $jadwal->selesai)); ?>      
        </div> 
    
     <div class="form-group">
                <label for="">Ruang Kelas</label>
                <?php $data = array('class' => 'form-control', 'id' => 'inputID', 'name' => 'ruang'); ?>
                <?php echo form_input($data, set_value('ruang', $jadwal->ruang)); ?>      
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
       
</div>
 
</div>    
    <?php echo form_close(); ?>   
    <script>
        $.validate({
            form: '#myForm',
            modules: 'security',
        });
    </script>