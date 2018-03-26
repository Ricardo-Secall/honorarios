<div class="container">
    <form class=" mui-form">
        <fiedldset>
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="avante-titulo" href="#">Liquidación de Honorarios</li>
                        <li class="avante-subtitulo active " href="#">Consultas</li>

                    </ol>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-2  cosl-sm-offset-4">
                    <div class="form-group">
                        <label class="control-label" for="selectbasic">Año</label>

                        <select id="selectbasic" name="selectbasic" class="form-control">
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
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
                <div class="col-sm-1"  style="margin-top:2em"> 
                    <div class="label label-warning ">versión 2</div>
                </div>
            </div>


        </fieldset>
    </form>


</div>
<div class=" container ">
    <div class="row   ">
        <div class="col-sm-12 mui-panel">
          <input type="text" id="cole-search" value="" style="display:none;">
        <?php echo $crud->output; ?>     
        </div>
    </div>

</div>
