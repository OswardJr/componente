<?php
require_once 'includes/minificador/minificador.class.php';
class MinificarController{
    
    private $model;
    private $min = null;
    
    public function __CONSTRUCT()
    {
        $this->min = new Minificador(array(
            'css' => array(
                // 'css/archivo.css',
            ),
            'js' => array(
                // 'js/archivo.js',
            )
        ));    
    }
    
    public function Style()
    {
        echo $this->min->Comprimir('css');
    }
    
    public function Javascript(){
        echo $this->min->Comprimir('js');
    }
}