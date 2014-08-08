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
            <h4>Nilai</h4>
        </div>     
    <div data-role="main" class="ui-content">
       <ul data-role="listview" data-filter="true" data-filter-reveal="true" data-filter-placeholder="cari matakuliah" data-inset="true">   
        <?php
            $i = 1;
            foreach ($nilai as $nil) :
                ?>
                    
           <li><b><?php echo $nil->kd_smstr; ?></b><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nil->nm_matkul; ?><span class="ui-li-count"><?php  echo $nil->grade; ?></span></small></li>
                       
                    
        
         <?php
                $i++;
            endforeach;
            ?>
        </ul> 
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