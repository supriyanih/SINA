<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
           <legend><i class="glyphicon glyphicon-user"></i>Mahasiswa</legend>
            <div class="col-sm-2 col-md-4">
                <img src="<?php echo base_url() . 'assets/img/thumbnails/' . $mhs->foto; ?>" class="img-rounded img-responsive" />

            </div>
            <div class="col-sm-4 col-md-8">
                <blockquote>
                    <p><?php echo $mhs->nama; ?></p> 
                    <small><cite title="Source Title"><?php echo $mhs->alamat; ?><i class="glyphicon glyphicon-map-marker"></i></cite></small>
                </blockquote>
                <p> <i class="glyphicon glyphicon-envelope"></i> <?php echo $mhs->nim; ?>
                    <br
                        /> <i class="glyphicon glyphicon-globe"></i> <?php echo $mhs->tmpt_lahir; ?>
                    <br /> <i class="glyphicon glyphicon-gift"></i> <?php echo tgl_indo($mhs->tgl_lahir); ?></p>
                <p>
                    <?php echo btn_edit('mahasiswa/edit/' . $mhs->nim); ?>
                    
                </p>
            </div>
            
        </div>
        
    </div>
</div>