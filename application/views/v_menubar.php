 <div style="margin-bottom:100px">
 <div id="custom-bootstrap-menu" class="navbar navbar-default navbar-fixed-top" style=";border-bottom: 1px solid lightgray;" role="navigation">
    <div class="container-fluid" style="margin-top: 10px;margin-bottom:10px">
        <div class="navbar-header"><a class="navbar-brand" href="#">Centro Médico Manuel Montt</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-right">
                <li <?php if($menu_opt=="1") echo "class='active'" ?>><a href="<?php echo base_url("") ?>">Consultas</a>
                </li>
                <li <?php if($menu_opt=="2") echo "class='active'" ?> ><a href="cargas_planillas">Carga de  Planillas</a>
                </li>
                <li ><a href="<?php echo base_url("auth/logout") ?>">Salir</a>
                </li>
            </ul>
        </div>
    </div>

</div>
</div>

