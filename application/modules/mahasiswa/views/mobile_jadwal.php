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
            <h4>Jadwal</h4>
        </div>     
    <div data-role="main" class="ui-content">
          <?php if ($jadwal): ?>
        <?php
            $i = 1;
            foreach ($jadwal as $jad) :
                ?>
        
                    <div data-role="collapsible">
                   <h4><?php echo $jad->nm_matkul; ?></h4>
                   <ul data-role="listview">
                       <li  class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-user">
                           <h6 align="center">Dosen&nbsp;&nbsp;&nbsp;:&nbsp; <?php echo $jad->nama; ?></h6></li>
                       <li class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-calendar">
                           <h6 align="center">Hari  &nbsp;&nbsp;&nbsp; :&nbsp;  <?php echo $jad->hari; ?></h6></li>
                       <li class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-clock">
                           <h6 align="center">waktu  &nbsp;&nbsp;&nbsp;:&nbsp; <?php echo $jad->mulai; ?> - <?php echo $jad->selesai; ?></h6></li>
                       <li class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-location">
                           <h6 align="center">Ruang Kelas &nbsp;:&nbsp; <?php echo $jad->ruang; ?></h6></li>
                   </ul>
                    </div>
         <?php
                $i++;
            endforeach;
            ?>
         <?php else: ?>
           <div data-role="collapsible">
          <h4>Belum Ada Jadwal</h4>
           </div>
        <?php endif; ?>
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