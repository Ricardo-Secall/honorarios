<div class="container">
  <div class="row login-wrapper" autofocus>
    <div class="col-md-4 col-xs-8 col-md-offset-4 col-xs-offset-2">

      <div class=" ">
        <div class="panel-body card card-4 " tab="0">  
          <img src="<?php echo base_url(); ?>assets/img/cmmm-logo.png" style="width:100%">
          <br><br><br>
          <?php $error = $this->session->flashdata("error"); ?>
          <?php if($error){ ?>       
          <div class="alert alert-<?php echo $error ? 'warning' : 'info' ?> alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $error ? $error : 'Introduce Nombre y Password' ?>
          </div>
          <?php } ?>
          <?php echo form_open(); ?>  
          <?php $error = form_error("username", "<p class='text-danger'>", '</p>'); ?>              
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">

            <div class="mui-textfield mui-textfield--float-label">
              <input  type="text" name="username" value="<?php echo set_value("username") ?>" id="username" class="form-control">
              <label for="username" class="">Usuario</label>
            </div>  
            <?php echo $error; ?>
          </div>
          <?php $error = form_error("password", "<p class='text-danger'>", '</p>'); ?>
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">

            <div class=" mui-textfield mui-textfield--float-label">
              <input type="password" name="password" autocomplete="off" id="password" class="form-control">
              <label for="password" >Password</label>
            </div> 
            <?php echo $error; ?>
          </div>
          <br>
          <div class="row">
            <div class="col-xs-12">            
            <input type="submit" value="Login" class="btn btn-block btn-primary">
            <a style="display:none"> Olvidaste tu clave? </a></div>
            <?php echo form_close(); ?>
             <br> <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>