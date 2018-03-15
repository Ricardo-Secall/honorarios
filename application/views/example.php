<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
/* foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; 
*/
?>

    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/helper_cole.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker/bootstrap-datepicker.min.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker/bootstrap-datepicker.es.min.js"></script>


    

      

        <?php 
        $crud = new stdClass();
        $crud->css_files=$css_files;
        $crud->js_files=$js_files;
         if(isset($crud)){ ?>
    <?php 
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

</head>
<body>
	<input type="text" id="cole-search" value="" class="mui--is-empty mui--is-untouched mui--is-pristine">
	<div>
		<a href='<?php echo site_url('examples/customers_management')?>'>Customers</a> |
		<a href='<?php echo site_url('examples/orders_management')?>'>Orders</a> |
		<a href='<?php echo site_url('examples/products_management')?>'>Products</a> |
		<a href='<?php echo site_url('examples/offices_management')?>'>Offices</a> | 
		<a href='<?php echo site_url('examples/employees_management')?>'>Employees</a> |		 
		<a href='<?php echo site_url('examples/film_management')?>'>Films</a> |
		<a href='<?php echo site_url('examples/multigrids')?>'>Multigrid [BETA]</a>
		
	</div>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</body>
</html>
