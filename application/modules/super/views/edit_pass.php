<div class="page-header">
    <h1>Ganti Password</h1>
</div>
<div class="col-md-12">
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open('', $attributes);
    ?>
    <?php echo form_hidden('userid', set_value('userid', $staff->userid)); ?>
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