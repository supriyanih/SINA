<table class="table table-hover table-bordered"><small>
    <thead>
     Kartu Hasil Studi (KHS)
    </thead>
    <tbody>
                <?php
            $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
            echo form_open('', $attributes);
            ?>
        <tr>
            <td>
                INPUT NIM:<br>
                <br>
                <br>
                SEMESTER :
            </td>
            <td>
             <?php
            $attr = attr(array('form-control', 'input_kdkls', 'nim', 'length', '3-50', 'nim masih kosong'));
            ?>
            <?php echo form_input($attr); ?>
                <?php echo form_dropdown('smtr', $semester,'', 'class="form-control"'); ?>
            </td>
            <td>
                        <div class="form-group">
       
                                <?php
                                $data = array(
                                    "value" => 'KHS',
                                    "class" => 'btn btn-info',
                                    "id" => 'x',
                                    "name" => 'submit'
                                );
                                ?>
                                <?php echo form_submit($data); ?>
            
                            </div>
    </div>
            </td>
        </tr>
    </tbody>
    
    </small></table>


    <?php echo form_close(); ?>
    
   
    <script>
        $.validate({
            form: '#myForm',
            modules: 'security',
        });
    </script>
