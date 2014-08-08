<div class="col-md-12">
    <div class="row">
 <div class="col-md-12 col-md-5">       
 <legend><i class="glyphicon glyphicon-globe"></i>Edit Mahasiswa</legend>

    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open_multipart('', $attributes);
    ?>
    <div class="form-group">
        <label for="">NIM</label>
       
            <?php $data = array('class' => 'form-control', 'id' => 'inputID', 'name' => 'nim'); ?>
            <?php echo form_input($data, set_value('nim', $mhs->nim)); ?>
        
    </div>
    <div class="form-group">
        <label for="">Full Name</label>
        
<?php $data = array('class' => 'form-control', 'id' => 'nama', 'name' => 'nama'); ?>
<?php echo form_input($data, set_value('nama', $mhs->nama)); ?>
        
    </div>
    <div class="form-group">
        <label for="">Tempat Lahir</label>
        
<?php $data = array('class' => 'form-control', 'id' => 'inputTmptLahir', 'name' => 'tmpt_lahir'); ?>
<?php echo form_input($data, set_value('tmpt_lahir', $mhs->tmpt_lahir)); ?>
        
    </div>
    <div class="form-group">
        <label for = "">Tgl Lahir</label>
       
            <?php $data = array('class' => 'datepicker form-control', 'id' => 'inputTglLahir', 'name' => 'tgl_lahir');
            ?>
<?php echo form_input($data, set_value('tgl_lahir', tgl_indo($mhs->tgl_lahir))); ?>
        
    </div>
    <div class="form-group">
        <label for="">Jenis Kelamin</label>
       
        <?php
        $disabled = array(
            'name' => 'jenkel',
            'id' => 'disabled',
            'value' => 'P',
            'checked' => $mhs->jenkel == 'P' ? 'checked' : ''
        );

        $enabled = array(
            'name' => 'jenkel',
            'id' => 'enabled',
            'value' => 'L',
            'checked' => $mhs->jenkel == 'L' ? 'checked' : ''
        );
        ?>
        
            <label class="radio-inline">
<?php echo form_radio($disabled); ?>
                Perempuan
            </label>
            <label class="radio-inline">
<?php echo form_radio($enabled); ?>
                Laki-laki
            </label>
       
    
    </div>
    
    <div class="form-group">
        
        <label for = "">Alamat</label>
       
            <?php $data = array('class' => 'form-control', 'id' => 'inputAlamat', 'name' => 'alamat');
            ?>
<?php echo form_textarea($data, set_value('alamat', $mhs->alamat)); ?>
       
    </div>

 </div>

        
<div class="col-sm-2 col-md-6">
<legend><i class="glyphicon glyphicon-globe"></i>Akademik</legend>

     <div class="form-group">
         <label for="">Program Studi</label>  
           
<?php echo form_dropdown('id_prodi', $prodi, $mhs->id_prodi, 'class="form-control"'); ?>
 </div>
    
<div class="form-group">
 <label for="">Data Kelas</label>
<?php echo form_dropdown('id_kelas', $kelas, $mhs->id_kelas, 'class="form-control"'); ?>
 </div>
     

     <div class="form-group">
 <label for="">Email</label>
<?php $data = array('class' => 'form-control', 'id' => 'email', 'name' => 'email'); ?>
<?php echo form_input($data, set_value('email', $mhs->email)); ?>
</div>

     <div class="form-group">
 <label for="">Telpon</label>
<?php $data = array('class' => 'form-control', 'id' => 'telpon', 'name' => 'telpon'); ?>
<?php echo form_input($data, set_value('telpon', $mhs->telpon)); ?>
</div>
    
    
    <div class="form-group">
        
        
            <label for="">Foto</label>
            <img src="<?php echo base_url() . 'assets/img/thumbnails/' . $mhs->foto  ; ?>" />
        
    </div>
    <div class="form-group">
      
        <label for="">Ganti Foto</label>
    
<?php echo form_upload('foto'); ?>
    </div>
    
    <div class="form-group">
         
        
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
    
<?php echo form_close(); ?>

    </div>
        <script>
            $(function() {
                $('.datepicker').datepicker({dateFormat: "yy-mm-dd"});
            });
        </script>
        </div>
</div>