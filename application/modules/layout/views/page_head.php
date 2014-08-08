<div class="container noPrint">
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                    class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav"> 
               
                     <?php if ($this->session->userdata('level_user') == 1) : ?>
                    <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-home"></span>AKADEMIK<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('prodi/'); ?>">PRODI</a></li>
                            <li><a href="<?php echo base_url('matkul/'); ?>">MATA KULIAH</a></li>
                            <li><a href="<?php echo base_url('semester/'); ?>">SEMESTER</a></li>
                            <li><a href="<?php echo base_url('kelas/'); ?>">KELAS</a></li>
                        </ul>
                    </li>
                     <li><a href="<?php echo base_url('/dosen/'); ?>"><span class="glyphicon glyphicon-user"></span>DOSEN</a></li>
                    <li><a href="<?php echo base_url('/mahasiswa/'); ?>"><span class="glyphicon glyphicon-user"></span>MAHASISWA</a></li>       
                   
                    <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown"><span
                                class="glyphicon glyphicon-dashboard"></span>PERKULIAHAN<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            
                            <li><a href="<?php echo base_url('jadwal/tambah'); ?>" >BUAT JADWAL</a></li>
                            <li><a href="<?php echo base_url('jadwal'); ?>">JADWAL AKTIF</a></li>
                            <li><a href="<?php echo base_url('jadwal/selesai'); ?>">JADWAL SELESAI</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown"><span
                                class="glyphicon glyphicon-dashboard"></span>NILAI<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('nilai/cari_nilai/'); ?>">TRANSKRIP</a></li>
                            <li><a href="<?php echo base_url('nilai/cari_khs/'); ?>" >KHS</a></li>
                           
                        </ul>
                    </li>
                    
                     
                     <li><a href="<?php echo base_url('/info/'); ?>"><span class="glyphicon glyphicon-info-sign"></span>INFO KAMPUS</a></li>
                     
                      <?php elseif($this->session->userdata('level_user') == 3): ?>
                    <li><a href="<?php echo base_url('/dosen/'); ?>"><span class="glyphicon glyphicon-user"></span>Dosen</a></li>
                    <li><a href="<?php echo base_url('/admin/'); ?>"><span class="glyphicon glyphicon-user"></span>Admin</a></li>
                    <li><a href="<?php echo base_url('/staff/'); ?>"><span class="glyphicon glyphicon-user"></span>Staff</a></li>
                    <?php else: ?>
                    <li><a href="<?php echo base_url('/dosen/detail/'. $this->session->userdata('userid')); ?>"><span class="glyphicon glyphicon-time"></span>JADWAL</a></li>
                     <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                            class="glyphicon glyphicon-user"></span><?php  echo $this->session->userdata('userid');?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('staff/detail/' . $this->session->userdata('userid')); ?>"><span class="glyphicon glyphicon-cog"></span>Profile</a></li>
                        <li><a href="<?php echo base_url('login/logout'); ?>"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                        
                    </ul>
                </li>
            </ul>
        </div> 
       
    </nav>
</div>
