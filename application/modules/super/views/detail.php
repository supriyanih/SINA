
<div class="col-md-12">
    <div class="row">
        <div class="col-md-5" >
          <legend><i class="glyphicon glyphicon-user"></i>Profile Admin</legend>
            <div class="col-sm-2 col-md-4">
                <img src="<?php echo base_url() . 'assets/img/thumbnails/' . $pegawai->foto; ?>" class="img-rounded img-responsive" />

            </div>
            <div class="col-sm-4 col-md-8">
               <blockquote>
                    <p><?php echo $pegawai->nama; ?></p> <small><cite title="Source Title"><?php echo $pegawai->alamat; ?><i class="glyphicon glyphicon-map-marker"></i></cite></small>
                </blockquote>
                <p> <i class="glyphicon glyphicon-envelope"></i> <?php echo $pegawai->nip; ?>
                    <br
                        /> <i class="glyphicon glyphicon-globe"></i> <?php echo $pegawai->tmpt_lahir; ?>
                    <br /> <i class="glyphicon glyphicon-gift"></i> <?php echo tgl_indo($pegawai->tgl_lahir); ?></p>
                <p>
                    <?php echo btn_edit('dosen/edit/' . $pegawai->nip); ?>
                    <a href="<?php echo base_url('dosen/edit_pass/' . $pegawai->nip); ?>" class="btn btn-default btn-xs btn-info" ><span class="glyphicon glyphicon-pencil"></span>Edit Password</a>
                </p>
            </div>
            
        </div>
       

       
        
    </div>
</div>
  