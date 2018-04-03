<html>

<body>
  <?php
/*
  require_once 'dompdf/autoload.inc.php';
*/
  use Dompdf\Dompdf;
  use Dompdf\Options;

  ob_start();
  ?>

  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  

    <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>

    <script
    src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
    integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
    crossorigin="anonymous"></script>





    <style> 
    /* CSS used here will be applied after bootstrap.css */
    #box {
      position: relative;
      top: 0;
      left: 0;
      width: 4cm;
      height: 0.5cm;
      background: green;
      cursor: move;
      opacity: 0.4;
    }

    #results {
      text-align: center;
    }

    .factura {
      xbackground: url(dompdf/img/avante-fact.jpg);
      position: relative;
      Xbackground-size: contain;
      Xbackground-size: 8.5in 5.5in; 
      background-repeat: no-repeat;
      width: 8.5in;
      height: 5.5in;
      Xbox-sizing: border-box;
      margin:0px;
    }
    .nro-control{
     position: absolute;
     font-size: 24px;
     color: red;
     font-family: sans-serif;
     top:0.6cm; 
     left:15.7cm
   }

   .label{
     position: absolute;
     font-size: 12px;
     font-weight: bold;
     color: gray;
     font-family: sans-serif;
   }

   .campo{
     position: absolute;
     font-size: 12px;
     font-weight: normal;
     color: gray;
     font-family: sans-serif;
   }
   body{
    margin:0px;
    padding:0px;
    background-color: white;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  }
  .linea-horizontal{
   position: absolute;
   border-top: 1px solid lightgray;
 }
 html { margin-top:1in;margin-left:0in;margin-right:1in};
</style>
</head>
<body>
  <div class="factura"  >
    <div style="width: 6in; margin: 0 auto;">
      <h3 style="text-align: center;"><strong>CARTOLA DE LIQUIDACI&Oacute;N HONORARIOS</strong></h3>
      <div style="font-size:1.5em;text-align:center;color: #999999;"><strong>Marzo 2018</strong></div>
      <br><br>
      <hr>
      <table border="0" style="text-alig: center; border-collapse: collapse; width: 100%;" height="163">
        <tbody>
          <tr style="height: 21px;">
            <td style="width: 38.272%; height: 21px;"><strong>RUT</strong></td>
            <td width="205" style="width: 61.5256%; height: 21px;">9616258-8</td>
          </tr>
          <tr style="height: 21px;">
            <td style="width: 38.272%; height: 21px;"><strong>Beneficiario (Pago)</strong></td>
            <td width="205" style="width: 61.5256%; height: 21px;"><?php echo $nombre ?>&nbsp;</td>
          </tr>
          <tr style="height: 21px;">
            <td style="width: 38.272%; height: 21px;"><strong>Especialidad</strong></td>
            <td style="width: 61.5256%; height: 21px;">PEDIATRIA&nbsp;</td>
          </tr>
          <tr style="height: 21px;">
            <td style="width: 38.272%; height: 21px;"><strong>Fecha Producci&oacute;n</strong></td>
            <td style="width: 61.5256%; height: 21px;">01 al 28 de febrero 2018&nbsp;</td>
          </tr>
          <tr style="height: 21px;">
            <td style="width: 38.272%; height: 21px;"><strong>Fecha env&iacute;o boleta</strong></td>
            <td style="width: 61.5256%; height: 21px;">10 de marzo de 2018</td>
          </tr>
          <tr style="height: 21px;">
            <td style="width: 38.272%; height: 21px;"><strong>Fecha Pago</strong></td>
            <td style="width: 61.5256%; height: 21px;">1 de abril de 2018</td>
          </tr>
          <tr style="height: 21px;">
            <td style="width: 38.272%; height: 21px;"><strong>N&uacute;mero de pacientes</strong></td>
            <td style="width: 61.5256%; height: 21px;">99</td>
          </tr>
          <tr style="height: 21px;">
            <td style="width: 38.272%; height: 21px;"><strong>N&uacute;mero de procedimientos</strong></td>
            <td style="width: 61.5256%; height: 21px;">0</td>
          </tr>
        </tbody>
      </table>
      <br />
      <h4 style="text-align: center;"><span style="font-size:1.2em;color: #999999;"><strong>Honorarios Centro M&eacute;dico Producci&oacute;n Honorario Bruto </strong></span><strong></strong></h4>
       <hr>
      <table border="0" style="text-alig: center; border-collapse: collapse; width: 100%;" height="163">
        <tbody>
          <tr style="height: 21px;">
            <td style="width: 23.8235%; height: 10px; text-align: left;"><strong>Concepto</strong></td>
            <td style="width: 25.7331%; height: 10px; text-align: right;"><strong>Total&nbsp;</strong></td>
            <td style="width: 24.1657%; height: 10px; text-align: right;"><strong>Participaci&oacute;n</strong></td>
            <td width="205" style="width: 26.0753%; height: 10px; text-align: right;"><strong>Boleta</strong></td>
          </tr>
          <tr style="height: 21px;">
            <td width="143" style="width: 23.8235%; height: 10px;">Consulta General</td>
            <td style="width: 25.7331%; height: 10px; text-align: right;">&nbsp;$1.954.998</td>
            <td style="width: 24.1657%; height: 10px; text-align: right;">$1.954.998</td>
            <td style="width: 26.0753%; height: 10px; text-align: right;">$1.954.998</td>
          </tr> <!--
          <tr style="height: 10px;">
            <td style="width: 23.8235%; height: 10px;">Procedimientos</td>
            <td style="width: 25.7331%; height: 10px; text-align: right;">&nbsp;0</td>
            <td style="width: 24.1657%; height: 10px; text-align: right;">$1.954.998</td>
            <td style="width: 26.0753%; height: 10px; text-align: right;">$1.954.998</td>
          </tr>
         
          <tr style="height: 21px;">
            <td style="width: 23.8235%; height: 21px; text-align: left;"><strong>Totales</strong></td>
            <td style="width: 25.7331%; height: 21px; text-align: right;"><strong>$1.954.998&nbsp;</strong></td>
            <td style="width: 24.1657%; height: 21px; text-align: right;"><strong>$1.954.998</strong></td>
            <td width="205" style="width: 26.0753%; height: 21px; text-align: right;"><strong>$1.954.998</strong></td>
          </tr> -->
        </tbody>
      </table>
      <hr>
      <span style="font-size: 0.8em;text-align: center;color: #808080;"><strong>NOTA: </strong></span>
      <span style="font-size: 0.8em;text-align: center;color: #808080;">Se sugiere el uso de boleta electr&oacute;nica, la cual debe ser reenviada a myriam.aravena@cmmm.cl </span>
    </div>
    <div>
    </body>
    </html>

    <?php
//ob_end_flush();die();
# Instanciamos un objeto de la clase DOMPDF.
    $mipdf = new DOMPDF();

# Definimos el tamaño y orientación del papel que queremos.
# O por defecto cogerá el que está en el fichero de configuración.
    $paper_size = array(0,0,612,400);
//$mipdf->set_paper($paper_size);
    $mipdf ->set_paper("letter", "portrait");


    $html = ob_get_contents();ob_end_clean();
# Cargamos el contenido HTML.
    $mipdf ->load_html(html_entity_decode($html));

//$mipdf ->loadHtmlFile("test_dom.php");

# Renderizamos el documento PDF.
    $mipdf ->render();
    $output = $mipdf->output();
    $mipdf ->stream('FicheroEjemplo.pdf',array( 'compress' => 1,'Attachment' => 0));
    if(!is_dir('uploads/honorarios/2018')) mkdir('uploads/honorarios/2018');
    if(!is_dir('uploads/honorarios/2018/4')) mkdir('uploads/honorarios/2018/4');

    file_put_contents("uploads/honorarios/2018/4/201806_13213654.pdf", $output);
  echo file_exists("uploads/honorarios/2018/4/201804_13213654.pdf");
    //echo $result;die();
//$mipdf ->output();
# Enviamos el fichero PDF al navegador.
    
    ?>
