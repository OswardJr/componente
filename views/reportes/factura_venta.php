<?php
require('../../includes/dompdf/dompdf_config.inc.php');
require_once '../../includes/config.php';
require_once '../../model/ventaModel.php';
$cod_venta = $_GET["cod_venta"];
$m = new venta();
$n = new venta();
$det_venta = $m->detalle_venta($cod_venta);
$venta = $n->obtener_venta($cod_venta);
session_start();
$codigo='<html>
<head>
  <link rel="stylesheet" href="../../public/src/css/facturas/facturacompra.css" type="text/css" />
</head>
<body>
<header>
      <div id="me">
      <h4 style="text-align:left;border:solid 0px;margin-left:70px;width:50%;">Sector Los Meregotos, Cagua</h4>
      <h4 style="text-align:left;border:solid 0px;margin-left:70px;width:50%;">Manzana 6, casa Nro. 33</h4>
      <h4 style="text-align:left;border:solid 0px;margin-left:70px;width:50%;">Edo Aragua. ZP 2122</h4>
      <h4 style="text-align:left;border:solid 0px;margin-left:70px;width:50%;">Telf.:(0244)396.4520</h4>          
    </div>

    <img src="/AppServ/www/componente/public/img/logo.png" class="img-responsive" style="float:left;" alt="Image"/>

  </header>
  <hr>
  <div id="linea">
    <h3>Orden de Venta</h3>
  </div>';
  $codigo.='<table class="encabezado " style="width:100%;">';
foreach ($venta as  $det_v) {
  $fecha = date_create($det_v['fecha']);//funcion para voltear la fecha
  $code = str_pad($det_v[codigo], 6, "0", STR_PAD_LEFT);

  $codigo.='
  <tr>
    <td style="text-align:left;">Número de Orden: '.$code.'</td>        
    <td></td>
    <td></td>
    <td style="text-align:left;">Número de Orden: '.$code.'</td>        
  </tr>
  <tr>
    <td style="text-align:left;" >Rif: '.$det_v['rif'].'</td>
    <td style="text-align:left;" >Razon social: '. $det_v['razon_social'].'</td>
    <td style="text-align:left;" >Telefono: '.$det_v['telefono'].'</td>
    <td style="text-align:left;">Fecha: '.date_format($fecha, 'd-m-Y').'</td>
  </tr>
  </table>
  <table class="encabezado" style="margin-top:0px;width:100%;">
  <tr>
    <td style="text-align:left;" >Domicilio: '.$det_v['direccion'].'</td>
    <td style="text-align:left;" >Banco: '.$det_v['banco'].'</td>
    <td style="text-align:left;" >Forma de Pago: '.$det_v['forma_pago'].'</td>    
    <td style="text-align:left;" >Número de Comprobante : '.$det_v['nro_comprobante'].'</td>
  </tr>

    ';
  }
    $codigo.='</table>';
    $codigo.='<br/><table class="collapse">';
    $codigo.='<thead>
    <tr>
    <th style="width:100px;text-align:center;">Codigo</th>
    <th style="width:400px;text-align:center;">Descripción</th>
    <th style="width:100px;text-align:center;">Cantidad</th>
    <th style="width:100px;text-align:center;">Precio</th>
    </tr>
    </thead>';
    $cont = count($det_venta);
    $filas = $cont + 1;
foreach ($det_venta as $k => $detalle) {
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

  foreach ($venta as $k => $totales) {
  $codigo.='<tr>
    <td style="width:100px;text-align:left;">Subtotal</td>
    <td style="width:100px;text-align:left;">'. $totales['subtot'].'</td>
  </tr>
  <tr>
    <td style="width:100px;text-align:left;">Iva 12%</td>
    <td style="width:100px;text-align:left;">'. $totales['impuesto'].'</td>
  </tr>
  <tr>
    <td style="width:100px;text-align:left;">Descuento</td>
    <td style="width:100px;text-align:left;">'. $totales['descuento'].'</td>
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
    //$dompdf->stream("reporteRegistro.pdf");
  $dompdf->stream('factura_venta.pdf',array('Attachment'=>0));

  ?>
