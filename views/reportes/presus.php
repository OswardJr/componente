<?php
require('../../includes/dompdf/dompdf_config.inc.php');
require_once '../../includes/config.php';
require_once '../../model/presupuestosModel.php';
$dc = new presupuesto();
$presupuestos = $dc->get_presupuestos();
session_start();
$codigo='<html>
<head>
  <link rel="stylesheet" href="../../public/src/css/facturas/facturapresupuesto.css" type="text/css" />
</head>
<body>
  <header>
    <img src="../../images/logo_empresa.jpg" />
    <div id="me">
      <h4 style="text-align:right;border:solid 0px;width:100%;">Urb. La fundación. Cagua</h4>
      <h4 style="text-align:right;border:solid 0px;width:100%;">Manzana 6, casa Nro. 33</h4>
      <h4 style="text-align:right;border:solid 0px;width:100%;">Edo Aragua. ZP 2122</h4>
      <h4 style="text-align:right;border:solid 0px;width:100%;">Telf.:(0244)396.4520</h4>
    </div>
  </header>
  <hr>
  <div id="linea">
    <h3>Listado de presupuestos</h3>
  </div>';
  $codigo.='<table class="collapse">';
  $codigo.='<thead>
  <tr>
    <th style="width:100px;text-align:center;">Codigo</th>
    <th style="width:400px;text-align:center;">Proveedor</th>
    <th style="width:100px;text-align:center;">Fecha</th>
    <th style="width:100px;text-align:center;">Monto</th>
  </tr>
</thead>';
foreach ($presupuestos as  $detalle) {
  $codigo.='<tr>
  <td style="width:100px;text-align:left;">'. $detalle['codigo'].'</td>
  <td style="width:400px;text-align:left;">'. $detalle['proveedor'].'</td>
  <td style="width:100px;text-align:left;">'. $detalle['fecha'].'</td>
  <td style="width:100px;text-align:left;">'. $detalle['monto'].'</td>
</tr>';
}
$cont = count($presupuestos);
$filas = 24 - $cont;
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

$dompdf->stream('factura_presupuesto.pdf');

?>
