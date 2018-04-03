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
        <div class="col-sm-4 color-2 col-sm-offset-4 text-center" style="font-size: 1.5em">
            Mes de Participación
            <hr>  
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2  col-sm-offset-4">
            <div class="fodrm-group">
                <label class="control-label" for="selectbasic">Año</label>
                <select id="anio" name="anio" class="form-control">
                    <option value="2018">2018</option>
                </select>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="fodrm-group">
                <label class="control-label" for="s_mes">Mes</label>
                <select id="mes" name="mes" class="form-control">
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

    <?php echo form_open_multipart('upload_file','id="form1"');?>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 ">
            <div class="fileUpload btn btn-block btn-primary">
                <span>Subir Planilla de Honorarios</span>
                <input id="input_subir" type="file" class="upload"  onchange="upload_file();" name="userfile" />
            </div>

            <!--
            <div class=" myalert alert alert-danger text-center" style="display:none;margin-top:10px">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <span id="error-upload"></span>
          </div>
      -->

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
          <li style="font-size:1.5em" ><i class="subiendo fa-li fa  "></i>Subir Archivo</li>
          <li style="font-size:1.5em" ><i class="validando fa-li fa  "></i>Validar Estructura </li>
          <li style="font-size:1.5em" ><i class="cargando fa-li fa  "></i>Carga de Data</li>
          <li class="hidden"><i class="fa-li fa fa-close " style=""></i>List icons</li>
      </ul>
  </div>
</div>

<div class="row myspin" style="display:none; " >
    <div class="col-sm-4 text-center col-sm-offset-4">
        <i style="color:orange" class="fa-4x fa fa-spinner fa-spin"></i>
    </div> <!-- spiinner -->
</div>

</div>


<div class="seccion_body container " style="display:none">
    <hr>
    <form id="form2" method="post" accept-charset="utf-8" action="genera_cartola">

        <div class="row hiddsen">
            <div class="col-sm-4 mdui-textfield col-sm-offset-4 ">
                <input type="hidden" id="s_anio" name="s_anio" value="<?php echo($anio); ?>" />
                <input type="hidden" id="s_mes" name="s_mes" value="<?php echo($mes); ?>" />
                <span class="color-1 btn-block text-center" >Archivo</span>
                <div>
                    <input class="color-2 btn-block text-center" style=";font-size:1.5em;border-width:0px" readonly="true" id="archivo_base" type="text" name="archivo_base" value="" /></div>

                    <textarea name="observaciones" rows="2" maxlength="400" class="btn-block" placeholder="Observaciones"></textarea> 

                </div>
            </div>

            <div class="row">   
                <div class="col-sm-2 col-sm-offset-4"> <button id="btn_genera" type="button" class="btn btn-md btn-block btn-primary">Generar Cartolas</button> </div>
                <div class="col-sm-2">  <button id="btn_" type="button" class="btn btn-md btn-block btn-primary">Omitir Planilla</button> </div>
            </div>
        </form>
        <br>
        <div class="row   ">
            <div class="col-sm-12 mui-panel">
                <input type="text" id="cole-search" value="" style="display:none;">
                <?php echo $crud->output; ?>     
            </div>
        </div>
    </div>

    <script type="text/javascript">
    /* Procesos
    1. upload_file (ajax)
    2. valida_estructura save_temporary
    3. carga_crud
    4. Epera Confirmación
    5.  GRaba (opcional Opservaciones)


    */

    $(document).ready( function() { //Listenner

        $("#anio").val($("#s_anio").val());
        $("#mes").val($("#s_mes").val());

        $(".fileUpload").click(function(){
           // alert("kj");
           $("#input_subir").val(""); // Importante para que reonozco un error 2 veces seguidads
           $('.seccion_body').hide();
       });

        $("#btn_genera").click(function(){
           // alert("kj");
           $("#input_subir").val(""); // Importante para que reonozco un error 2 veces seguidads
           $('.seccion_body').hide();
           $("#s_anio").val($("#anio").val());
           $("#s_mes").val($("#mes").val());
            $("#form2").submit(); // Paso 1
        });


    })


    function carga_crud(filename){

     $('.gc-refresh').trigger('click');
     $('.seccion_body').fadeIn("slow");
     $(".myspin").hide(); // Carga Crud
     $('.archivo_subido').text(filename);
     $("#archivo_base").val(filename);
     //$(".myspin").hide();

 }

 function valida_estructura(filename){
       // show_checklist_2("subiendo",2);show_checklist_2("validando",1);show_checklist_2("cargando",0);
       $.ajax({
        url: 'cargas_planillas/valida_estructura/'+filename,
        type: 'POST',
        data: '',
        async: false,
        cache: false,
        dataType:"json",
        success: function (response) {
            if(response.success==1){

                  //show_checklist_2("subiendo",2);show_checklist_2("validando",2);show_checklist_2("cargando",2);

                    carga_crud(filename); // Paso 3

                }else{
                    //$(".myalert").show();//investicar porq el hide lo elimina
                    coleAlert("",response.data1);
                    $(".fileUpload").show();
                    //$("#chk-proceso").hide();
                };
            }
        });
   }

   function upload_file(){
        //alert("Listo PAra subir");
        // $("#chk-proceso").show();   
        
        $(".myspin").show();
        $("#form1").submit(); // Paso 1
        //$(".myspin").hide();
    }

    $("#form1").submit(function(evt){  
       // show_checklist_2("subiendo",1);show_checklist_2("validando",0);show_checklist_2("cargando",0);
        //$(".fileUpload").hide();//.fadeOut(1000);
        evt.preventDefault();

        var formData = new FormData($(this)[0]);//kB
        $.ajax({
            url: 'cargas_planillas/upload_file',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            dataType:"json",
            success: function (response) {
                if(response.success==1){
                    valida_estructura(response.data1); // Paso 2
                }else{
                    //$("#error-upload").empty().append(response.data1);
                    //$(".myalert").show();//.hide(2000);//.fadeOut(2000);

                    if(response.data1){
                        coleAlert("",response.data1);
                    }else{
                        coleAlert("",response);  
                    }
                    $(".fileUpload").show();

                };
            }
        });
        return false;
    });


    function  show_checklist_2(opcion,status){
        $("#chk-proceso").show();
        //valores=array(0=>" fa-close",1=>" fa-spinner fa-pulse",3=>" fa-check-square");
        var valores=[];
        valores[0]=" fa-li fa fa-square";
        valores[1]=" fa-li fa fa-spinner fa-pulse";
        valores[2]=" fa-li fa fa-check-square";
        valores[3]=" fa-li fa fa-close";
        $("."+opcion).removeClass("fa-li fa fa-square fa-spinner fa-pulse fa-close");
        $("."+opcion).addClass(valores[status]);
        return;

    }




</script>
