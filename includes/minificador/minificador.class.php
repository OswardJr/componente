<?php

class Minificador{
    private $archivos = array();
    
    public function __CONSTRUCT($archivos)
    {
        $this->archivos = $archivos;
    }
    
    public function Comprimir($tipo)
    {
        $comprimido = '';
        
        foreach($this->archivos as $k => $adjuntos)
        {
            if(strtolower($k) == $tipo)
            {
                foreach($adjuntos as $archivo)
                {
                    $comprimido .= file_get_contents( $archivo );                        
                }
            }
        }
        
        if($tipo == 'css')
        {
                // Cabecera para CSS
            header("Content-type: text/css");
            
                // Remueve comentarios
            $comprimido = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $comprimido);

                // Remueve saltos de línea
            $comprimido = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $comprimido);
        }
        else 
        {
            require_once 'addons/jsmin.php';
            
                /* 
                    Esta clase fue bajada de internet, porque para comprimir javascript hay que considerar más criterios
                    y esta se adapta perfectamente.
                    
                    Web: http://wonko.com/post/a_faster_jsmin_library_for_php
                */
                    $comprimido = JSMin::minify($comprimido);
                    
                // Cabecera para Javascript
                    header("application/javascript");
                }
                
            // Imprimimos
                echo $comprimido;
            }
        }