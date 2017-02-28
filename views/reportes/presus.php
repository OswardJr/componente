<?php
require('../../includes/dompdf/dompdf_config.inc.php');
require_once '../../includes/config.php';
require_once '../../model/presupuestosModel.php';
$a = new presupuesto();
$presupuestos = $a->get_presupuestos();  
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
    <h3>Listado de Presupuestos</h3>
  </div>';
  $codigo.='<table class="collapse">';
  $codigo.='<thead>
  <tr>
    <th style="width:100px;text-align:center;">Código</th>
    <th style="width:400px;text-align:center;">Clientes</th>
    <th style="width:100px;text-align:center;">Fecha</th>
    <th style="width:100px;text-align:center;">Monto</th>
  </tr>
</thead>';
foreach ($presupuestos as  $detalle) {
  $codigo.='<tr>
  <td style="width:100px;text-align:left;">'. $detalle['codigo'].'</td>
  <td style="width:400px;text-align:left;">'. $detalle['cliente'].'</td>
  <td style="width:100px;text-align:left;">'. $detalle['fecha'].'</td>
  <td style="width:100px;text-align:left;">'. $detalle['monto'].'</td>
</tr>';
}
$cont = count($presupuestos);
$filas =  - $cont;
for ($i=1; $i < $filas; $i++) {
  $codigo.='<tr>
  <td style="width:100px; height:1.1em;text-align:left;"> </td>
  <td style="width:400px;text-align:left;"> </td>
  <td style="width:100px;text-align:left;"> </td>
  <td style="width:100px;text-align:left;"> </td>';
}
$codigo.='</tr>';
$codigo.='</table>';
$codigo.='<table class="collapse" style="margin-left:389px;">';

foreach ($presupuesto as $k => $totales) {
  $codigo.='<tr>
  <td style="width:100px;text-align:left;">Subtotal</td>
  <td style="width:100px;text-align:left;">'. $totales['subtot'].'</td>
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

$dompdf->stream('Presupuestos_Totales.pdf');

?>