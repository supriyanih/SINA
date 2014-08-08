
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-certificate"></span> Login</div>
                <div class="panel-body">
                    <?php
                    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
                    echo form_open('users/login', $attributes);
                    ?>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">
                            NIP</label>
                        <div class="col-sm-9">
                            <input name="username" type="text" class="form-control" id="userid" placeholder="NIP" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="passid" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <?php
                            $data = array(
                                "value" => 'Submit',
                                "class" => 'btn btn-success btn-sm',
                                "id" => 'x',
                                "name" => 'submit'
                            );
                            ?>
                            <?php echo form_submit($data); ?>
                            <?php echo form_reset('reset', 'Reset', 'class="btn btn-default btn-sm"'); ?>
                        </div>
                    </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
