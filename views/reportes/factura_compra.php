<?php
require('../../includes/dompdf/dompdf_config.inc.php');
session_start();
    $codigo='<html> 
    <head> 
        <link rel="stylesheet" href="../../public/css/facturacompra.css" type="text/css" /> 
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
        <h3>Orden de compra</h3>
    </div>';
    
        $codigo.='<table class="encabezado " style="width:735px;">'; 
        $codigo.='
        <tr>
            <td style="text-align:left;">N°:</td>   
            <td style="text-align:left;">0000051</td>   
            <td style="text-align:left;">Fecha:</td>
            <td style="text-align:left;"></td>   
            <td style="text-align:left;">Empleado:</td>
            <td style="text-align:left;">'.$_SESSION['apellido'].' '.$_SESSION['nombre'].'</td>
        </tr>
        <tr>
            <td style="text-align:left;" colspan="1">Razon social</td>   
            <td style="text-align:left;"colspan="5">Distribuidora los colorados</td>   
        </tr> 
        <tr>
            <td style="text-align:left;" colspan="1">Domicilio:</td>   
            <td style="text-align:left;"colspan="5">Distribuidora los colorados</td>   
        </tr>   
        <tr>
        <td style="text-align:left;">Rif:</td>   
            <td style="text-align:left;"colspan="2"></td>   
            <td style="text-align:left;">Telefono:</td>   
            <td style="text-align:left;"colspan="2"></td>
        </tr>   
        <tr>
            <td style="text-align:left;" colspan=1>Forma de pago:</td>
            <td style="text-align:left;" colspan=5></td>';
        $codigo.='</tr>';                     
        $codigo.='</table>';
    $codigo.='<br/><table class="collapse"><tr>';  
    $codigo.='<td style="width:100px;text-align:center;">Cantidad</td>
    <td style="width:400px;text-align:center;">Descripción</td>   
    <td style="width:100px;text-align:center;">V. Unitario</td>   
    <td style="width:100px;text-align:center;">V. Total</td>';
        $codigo.='<tr>
        <td style="width:100px;text-align:left;">1</td>   
        <td style="width:400px;text-align:left;">1</td>   
        <td style="width:100px;text-align:left;">1</td>   
        <td style="width:100px;text-align:left;">1</td>   
        </tr>';
    
    $codigo.='</table></tr>';   
    $codigo.='<table class="collapse" style="margin-left:389px;">';
        $codigo.='
        <tr>
        <td style="width:100px;text-align:left;">Descuento</td>   
        <td style="width:100px;text-align:left;">192</td>
        </tr>   
        <tr>
        <td style="width:100px;text-align:left;">Tarifa 0</td>  
        <td style="width:100px;text-align:left;">456</td>
        </tr>   
        <tr>
        <td style="width:100px;text-align:left;">Tarifa 12</td>  
        <td style="width:100px;text-align:left;">456</td>
        </tr>
        <tr>
        <td style="width:100px;text-align:left;">Iva 12%</td>  
        <td style="width:100px;text-align:left;">456</td>
        </tr>   
        <tr>
        <td style="width:100px;text-align:left;">Total</td>  
        <td style="width:100px;text-align:left;">456</td>
        </tr>';
    
    $codigo.='</table>';  
    $codigo.='</body></html>';                           
    $codigo=utf8_decode($codigo);
    $dompdf= new DOMPDF();
    $dompdf->load_html($codigo);
    ini_set("memory_limit","100M");
    $dompdf->set_paper("A4","portrait");
    $dompdf->render();
    //$dompdf->stream("reporteRegistro.pdf");
    $dompdf->stream('factura_compra.pdf',array('Attachment'=>0));
    
?>