<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head>
<body >
    <div data-role="page" id="menu">
        <div data-role="header"  data-theme ="b">
             <a href="<?php echo base_url('mahasiswa/mobile' .'/'. $this->session->userdata('userid'));?>" data-icon="back" class="ui-btn-left"></a>
            <h4>INFO KAMPUS</h4>
        </div>     
    <div data-role="main" class="ui-content">
        
        <?php
            $i = 1;
            foreach ($info as $inf) :
                ?>
                
                  <ul data-role="listview" data-inset="true">
                            <li data-role="list-divider" ><?php echo $inf->tgl_post;?> </li>
                            
                            <small><strong><?php echo $inf->judul; ?></strong></small><br>
                           <small> <?php echo $inf->info; ?></small>
                 </ul>
          
                       
                    
        
         <?php
                $i++;
            endforeach;
            ?>
     
        </div>
    <div data-role="footer"data-theme ="b" data-position="fixed">
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