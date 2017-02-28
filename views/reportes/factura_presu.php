<?php
require('../../includes/dompdf/dompdf_config.inc.php');
require_once '../../includes/config.php';
require_once '../../model/presupuestosModel.php';
$cod_presu = $_GET["cod_presu"];
$a = new presupuesto();
$b = new presupuesto();
$det_presupuesto = $a->detalle_presupuesto($cod_presu);
$presupuesto = $b->obtener_presupuesto($cod_presu);
session_start();
$codigo='<html>
<head>
  <link rel="stylesheet" href="../../public/src/css/facturas/facturapresupuesto.css" type="text/css" />
</head>
<body>
  <header>
      <div id="me">
      <h4 style="text-align:left;border:solid 0px;margin-left:70px;width:50%;">Sector Los Meregotos, Cagua</h4>
      <h4 style="text-align:left;border:solid 0px;margin-left:70px;width:50%;">Manzana 6, casa Nro. 33</h4>
      <h4 style="text-align:left;border:solid 0px;margin-left:70px;width:50%;">Edo Aragua. ZP 2122</h4>
      <h4 style="text-align:left;border:solid 0px;margin-left:70px;width:50%;">Telf.:(0244)396.4520</h4>          
    </div>

    <img src="/AppServ/www/componente/public/img/logo.png" class="img-responsive" style="float:right;" alt="Image"/>

  </header>
  <hr>
  <div id="linea">
    <h3>Presupuesto</h3>
  </div>';
  $codigo.='<table class="encabezado " style="width:100%;">';
foreach ($presupuesto as $k => $det_p) {
  $fecha = date_create($det_p['fecha']);//funcion para voltear la fecha
  $code = str_pad($det_p[codigo], 6, "0", STR_PAD_LEFT);
  $codigo.='
  <tr>
    <td style="text-align:left;">N° de orden: '.$code.'</td>
    <br>
    <td></td>   
    <td></td>         
    <td style="text-align:left;">N° de orden: '.$code.'</td>    
  </tr>
  <tr>
      <td></td>   
    <td></td>   
    <td></td>   
    <td></td>   

  </tr>
  <tr>
    <td style="text-align:left;" >Rif: '.$det_p['rif'].'</td>
    <td style="text-align:left;" >Cliente: '. $det_p['razon_social'].'</td>
    <td style="text-align:left;" >Telefono: '.$det_p['telefono'].'</td>
    <td style="text-align:left;">Fecha: '.date_format($fecha, 'd-m-Y').'</td>    
  </tr>
  <tr>
    <td style="text-align:left;">Válido por: '. $det_p['fecha_vencimiento'].'</td>
    <td style="text-align:left;" >Domicilio: '.$det_p['direccion'].'</td>    
  </tr>
  </table>
  <table class="encabezado" style="margin-top:0px;width:100%;">
  <tr>
  </tr>

    ';
  }
    $codigo.='</table>';
    $codigo.='<br/><table class="collapse">';
    $codigo.='<thead>
    <tr>
    <th style="width:100px;text-align:center;">Codigo</th>
    <th style="width:400px;text-align:center;">Productos</th>
    <th style="width:100px;text-align:center;">Cantidad</th>
    <th style="width:100px;text-align:center;">Precio</th>
    </tr>
    </thead>';
    $cont = count($det_presupuesto);
    $filas = 1 - $cont;
foreach ($det_presupuesto as $k => $detalle) {
  $codigo.='<tr>
    <td style="width:100px;text-align:left;">'. $detalle['codigo'].'</td>
    <td style="width:400px;text-align:left;">'. $detalle['descripcion'].'</td>
    <td style="width:100px;text-align:left;">'. $detalle['cantidad'].'</td>
    <td style="width:100px;text-align:left;">'. $detalle['precio'].'</td>
    </tr>';
}
for ($i=1; $i < $filas; $i++) {
      $codigo.='<tr>
      <td style="width:100px; height:1.1em;text-align:left;"> </td>
      <td style="width:400px;text-align:left;"> </td>
      <td style="width:100px;text-align:left;"> </td>
      <td style="width:100px;text-align:left;"> </td>';
    }
   $codigo.='</tr>';
  $codigo.='</table>';
  $codigo.='<table class="collapse" style="margin-left:389px;margin-top:350px">';

  foreach ($presupuesto as $k => $totales) {
  $codigo.='<tr>
    <td style="width:100px;text-align:left;">Subtotal</td>
    <td style="width:100px;text-align:left;">'. $totales['subtot'].'</td>
  </tr>
  <tr>
    <td style="width:100px;text-align:left;">Descuento</td>
    <td style="width:100px;text-align:left;">'. $totales['descuento'].'</td>
  </tr>
  <tr>
    <td style="width:100px;text-align:left;">Iva 12%</td>
    <td style="width:100px;text-align:left;">'. $totales['impuesto'].'</td>
  </tr>
  <tr>
    <td style="width:100px;text-align:left;">Total</td>
    <td style="width:100px;text-align:left;">'. $totales['tot'].'</td>';
}
$codigo.='</tr>';
$codigo.='</table>';
$codigo.='</body></html>';
$codigo=utf8_decode($codigo);
$dompdf= new DOMPDF();
$dompdf->load_html($codigo);
ini_set("memory_limit","100M");
$dompdf->set_paper("A4","portrait");
$dompdf->render();

   $dompdf->stream('factura_presupuesto.pdf',array('Attachment'=>0));

?>
