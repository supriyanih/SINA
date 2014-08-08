<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>CI Pegawai</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-responsive.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/datepicker.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
        <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css">
        <script src="<?php echo base_url('assets/js/jquery.js'); ?>" ></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.27/jquery.form-validator.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <style>
            @media print {
                input.noPrint { display: none; }
                a.noPrint { display: none; }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php if (!empty($content)): ?>
                <?php $this->load->view($content); ?>
            <?php else: ?>
                <?php echo 'Halaman tidak ada'; ?>
            <?php endif; ?>
        </div>
    </body>
</html>