<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head>
<body >
<div data-role="header"  data-theme ="b">
             <a href="<?php echo base_url('mahasiswa/mobile' .'/'. $this->session->userdata('userid'));?>" data-icon="back" class="ui-btn-left"></a>
            <h4>Ganti Password</h4>
        </div>  


<div class="col-md-12">
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open('', $attributes);
    ?>
    <?php echo form_hidden('userid', set_value('userid', $mhs->userid)); ?>
    <div class="form-group">
        <label for="inputNIP" class="col-lg-2 control-label">Password Lama</label>
        <div class="col-lg-3">
            <?php $data = array('class' => 'form-control', 'id' => 'inputID', 'name' => 'paswd_lama'); ?>
            <?php echo form_input($data); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Password Baru</label>
        <div class="col-lg-7">
            <?php $data = array('class' => 'form-control', 'id' => 'nama', 'name' => 'passid'); ?>
            <?php echo form_input($data); ?>
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

    <div data-role="footer"data-theme ="b" data-position="fixed" >
      
      <p align="center"><small>Universitas 
          <strong >Muhammadiyah</strong>  
          Tangerang <br>
          &copy; 2014
          </small>
        
      <p>
               
     
  </div>
</div> 
 
</body>
</html>