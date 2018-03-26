<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li class="avante-titulo" href="#">Liquidación de Honorarios</li>
                <li class="avante-subtitulo active " href="#">Carga de Planillas</li>
            </ol>
        </div>
    </div>
    <br>    
    <div class="row">

        <div class="col-sm-2  col-sm-offset-4">
            <div class="fodrm-group">
                <label class="control-label" for="selectbasic">Año</label>

                <select id="selectbasic" name="selectbasic" class="form-control">
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                </select>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="fodrm-group">
                <label class="control-label" for="s_mes">Mes</label>
                <select id="s_mes" name="s_mes" class="form-control">
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>
        </div>

        <div class="col-sm-1"  style="a-top:2em;display:none"> 
            <div class="label label-warning ">versión 2</div>
        </div>
    </div>
    <?php echo form_open_multipart('cargas_planillas/upload','id="form1"');?>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 ">

            <div class="fileUpload btn btn-block btn-primary">
                <span>Subir Planilla de Honorarios</span>
                <input id="input_subir" type="file" class="upload" onchange="ready_to_upload();" name="userfile" />
            </div>


            <div class=" myalert alert alert-danger text-center" style="display:none;margin-top:10px">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <span id="error-upload"></span>
          </div>

      </div>
  </div>

</form>
<div class="row hidden">
    <div class="col-sm-4 col-sm-offset-4">
        <div class="progress" style="height:10px">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
            </div>
        </div>
    </div>
</div>
<div class="row hidden">
    <div class="col-sm-4 col-sm-offset-4">
        <div class="text-center" >
            Enero.xls
        </div>
    </div>
</div>
<br>




<div class="row status " id="chk-proceso" style="display:none; " > <!-- Ckecklist -->
    <div class=" col-sm-4 col-sm-offset-5">
        <ul class="fa-ul color-2 f" style="font-size: 1.5">
          <li><i class="subiendo fa-li fa  xfa-check-square"></i>Subiendo Archivo</li>
          <li><i class="validando fa-li fa  xfa-spinner xfa-pulse"></i>Validando Estructura </li>
          <li><i class="cargando fa-li fa  xfa-square"></i>Cargando Data</li>
          <li class="hidden"><i class="fa-li fa fa-close " style=""></i>List icons</li>
      </ul>
  </div>
</div>

<div class="row hidden">
    <div class="col-sm-4 col-sm-offset-4">
        <i style="color:orasnge" class="fa-4x fa fa-spinner fa-spin"></i>
    </div>
</div>

</div>

<div class=" container ">
    <hr>
    <div class="row hiddsen">
        <div class="col-sm-4 mdui-textfield col-sm-offset-4">
            <div style="font-size: 2em; text-align: center"><span class="color-1">Archivo:</span><span class="color-2 " style="margin-left: 4px">honoarios.xls</span></div>

            <textarea rows="2" class="btn-block" placeholder="Observaciones"></textarea> 

        </div>
    </div>

    <div class="row">   
        <div class="col-sm-2 col-sm-offset-4"> <button type="button" class="btn btn-md btn-block btn-primary">Generar Cartolas</button> </div>
        <div class="col-sm-2">  <button type="button" class="btn btn-md btn-block btn-primary">Omitir Planilla</button> </div>
    </div>

    <br>
    <div class="row   ">
        <div class="col-sm-12 mui-panel">
            <input type="text" id="cole-search" value="" style="display:none;">
            <?php echo $crud->output; ?>     
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready( function() {


    })

    $("#form1").submit(function(evt){  
        show_checklist("subiendo",1);
        $(".fileUpload").hide();//.fadeOut(1000);
        $("#input_subir").disabled=true;
        evt.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: 'cargas_planillas/upload_ajax',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function (response) {
                if(response==1){
                   show_checklist("validando",1);
               }else{
                    //$(".fileUpload").show();//.fadeOut(1000);
                    $("#error-upload").empty().append(response);
                    $(".myalert").show();//.fadeOut(2000);
                    $(".fileUpload").show();
                    $("#input_subir").disabled=false;
                    //$(".fileUpload").show();
                };
            }
        });
        return false;
    });


    function file_checking(){
        $.ajax({
            url: 'cargas_planillas/file_checking',
            type: 'POST',
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function (response) {
                if(response==1){

                }else{

                };
            }
        });
        return false;
    }

    function data_loading(){

    }

    function  show_checklist(opcion,status){
        $("#chk-proceso").show();
        if(status==0){
            $(".subiendo").removeClass();
            $(".validando").removeClass();
            $(".cargando").removeClass();

            $(".subiendo").addClass("subiendo fa-li fa fa-square");
            $(".validando").addClass("validando fa-li fa fa-square");
            $(".cargando").addClass("cargando fa-li fa fa-square");
            return;
        }
        
        if(status==2){
            $(".subiendo").removeClass();
            $(".validando").removeClass();
            $(".cargando").removeClass();

            $(".subiendo").addClass("subiendo fa-li fa fa-check-square");
            $(".validando").addClass("validando fa-li fa fa-check-square");
            $(".cargando").addClass("cargando fa-li fa fa-check-square");  
            return;   
        }
        
        switch(opcion){
            case "subiendo":
            $(".subiendo").removeClass("fa-square")
            $(".subiendo").addClass("fa-spinner fa-pulse")

            $(".validando").removeClass("fa-spinner fa-pulse")
            $(".validando").addClass("fa-square")

            $(".cargando").removeClass("fa-spinner fa-pulse")
            $(".cargando").addClass("fa-square")

            break;
            case "validando":
            $(".subiendo").removeClass("fa-spinner fa-pulse")
            $(".subiendo").addClass("fa-check-square")

            $(".validando").removeClass("fa-square")
            $(".validando").addClass("fa-spinner fa-pulse")


            $(".cargando").removeClass("fa-spinner fa-pulse")
            $(".cargando").addClass("fa-square")

            break;
            case "cargando":
            $(".subiendo").removeClass("fa-spinner fa-pulse")
            $(".subiendo").addClass("fa-check-square")

            $(".validando").removeClass("fa-square")
            $(".validando").addClass("fa-check-square")

            $(".cargando").removeClass("fa-square")
            $(".cargando").addClass("fa-spinner fa-pulse")
        }

    }

    function ready_to_upload(){
        //alert("Listo PAra subir");
        $("#form1").submit();
    }


</script>
