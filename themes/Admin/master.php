<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="<?php echo base_url() ?>" />
    <title><?php echo config('App')->name ?? 'CI4 easydev starter' ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>    
    <link rel="stylesheet" href="<?php echo base_url('assets/coreui/css/coreui.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/coreui/icons/css/all.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/css/all.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('vendor/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css')?>">
    
    <?php echo $this->renderSection('styles') ?>
</head>

<body>
    <?php echo $this->include('layouts/sidebar') ?>
    <?php echo $this->include('layouts/main') ?>

    <script src="<?php echo base_url('assets/coreui/js/coreui.bundle.min.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('vendor/select2/js/select2.full.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/easyapp.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/index.js') ?>"></script>
    <?php echo $this->renderSection('scripts') ?>
    
</body>
</html>