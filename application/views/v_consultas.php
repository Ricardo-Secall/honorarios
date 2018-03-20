<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h1 class="avante-subtitulo">Consulta de Listados</h1>
        </div>
        <form class="form-horizontal mui-form">
            <fieldset>
                <div class="col-sm-2  scol-sm-offset-2">
                    <div class="form-group">
                        <label class="control-label" for="selectbasic">Año</label>

                        <select id="selectbasic" name="selectbasic" class="form-control">
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-1"></div>
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
            </fieldset>
        </form>
        

    </div>
    <div class="row">
<input type="text" id="cole-search" value="" style="display:none;">
<?php echo $crud->output; ?>
    

        
    </div>
</div>