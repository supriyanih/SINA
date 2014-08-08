<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
           <legend><i class="glyphicon glyphicon-user"></i>Profil Staff</legend>
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
                    <?php echo btn_edit('staff/edit/' . $pegawai->nip); ?>
                    <a href="<?php echo base_url('staff/edit_pass/' . $pegawai->nip); ?>" class="btn btn-default btn-xs btn-info" ><span class="glyphicon glyphicon-pencil"></span>Edit Password</a>
                </p>
            </div>

        </div>
                    <div class="col-sm-2 col-md-6">
                <legend><i class="glyphicon glyphicon-globe"></i>Pendidikan</legend>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Detail Pendidikan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pendidikan as $pdk): ?>
                            <tr>
                                <td><?php echo $pdk->t_pdk; ?></td>
                                <td>
                                    <p><?php echo $pdk->d_pdk; ?></p>
                                    <p>
                                        <?php echo btn_edit('pegawai/edit_pdk/' . $pdk->idp); ?>
                                        <?php echo btn_delete('pegawai/del_pdk/' . $pdk->idp . '/' . $pdk->pdk_nip); ?>
                                    </p>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3"> <a href="<?php echo base_url('' . $pegawai->nip); ?>" class="btn btn-default btn-xs btn-info" ><span class="glyphicon glyphicon-pencil"></span>Tambah Data</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
</div>