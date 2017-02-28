<?php


class Conectar
{
    public $dbh;


    public function __construct()
    {
         require_once("controller/utilidadesController.php");
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=componente', 'root', '12345678');
            $this->dbh->exec("SET CHARACTER SET utf8");

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }

    public static function ruta()
    {
        return "http://localhost/componente/";
    }


	/* public static function url()
	 {
	     $pageURL = 'http';
	     if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	     $pageURL .= "://";
	     if ($_SERVER["SERVER_PORT"] != "80") {
	        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	     } else {
	        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	     }
	     return $pageURL;
	 }*/
    }

    error_reporting(E_ALL);
    ini_set('display_errors', false);


    ?>
