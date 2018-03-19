<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Centro Médico Manuel Montt</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">   

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/helper_cole.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker/bootstrap-datepicker.min.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker/bootstrap-datepicker.es.min.js"></script>

    <?php 
    if(isset($crud)){ 
    foreach($crud->css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($crud->js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach;
}
?>

<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">    
<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet"> 
<link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">   
<link href="<?php echo base_url(); ?>assets/css/cole.css?v=<?=time();?>"  rel="stylesheet">      
<link href="<?php echo base_url(); ?>assets/css/cole-module-bar.css?v=<?=time();?>"  rel="stylesheet">  
<script src="<?php echo base_url(); ?>assets/js/mui-combined.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap3-typeahead.js"></script>


<title>COLE monitor</title>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
<script
src="https://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous">
</script>-->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
