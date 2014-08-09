
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head>
<body >

<div data-role="page" id="home"   >
  <div data-role="header"  data-theme ="b" data-position="fixed" >
      <h6><small> <?php echo $dosen->nama; ?></small> </h6>
     
<div data-role="navbar"  data-inset="true" >
      <ul>
          <li><a href="<?php echo base_url();?>" data-icon="clock" ><small>jadwal</small></a></li>
        <li><a href="<?php echo base_url();?>" data-icon="edit"><small>nilai</small></a></li>
        <li><a href="<?php echo base_url();?>" data-icon="info"><small>info</small></a></li>
        <li><a href="<?php echo base_url();?>" data-icon="power"><small>log-out</small></a></li>
      </ul>
    </div>
  </div>

  <div data-role="main" class="ui-content" >
   
      
          <ul data-role="listview"  data-inset="true">
              
                    <li>
                   
                    <br>
                    
                     
                             
                            
                    </li> 
                    <a href="<?php echo base_url('mahasiswa/edit_pass' .'/'. $this->session->userdata('userid'));?>" 
                       data-role="button" data-mini="true">Ganti Password</a>
          </ul>
     
  </div>

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
