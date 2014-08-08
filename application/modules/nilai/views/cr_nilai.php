<table class="table table-hover table-responsive table-bordered">
    <thead>
     TRANSKRIP NILAI
    </thead>
    <tbody>
                <?php
            $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
            echo form_open('', $attributes);
            ?>
        <tr>
            <td>
                INPUT NIM:
            </td>
            <td>
             <?php
            $attr = attr(array('form-control', 'input_kdkls', 'nim', 'length', '3-50', 'nim masih kosong'));
            ?>
            <?php echo form_input($attr); ?>
            </td>
            <td>
                        <div class="form-group">
       
                                <?php
                                $data = array(
                                    "value" => 'Transkrip',
                                    "class" => 'btn btn-primary',
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
    
</table>


    <?php echo form_close(); ?>
    
   
    <script>
        $.validate({
            form: '#myForm',
            modules: 'security',
        });
    </script>