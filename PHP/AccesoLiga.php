<?php

include_once('config.php');
include_once('Liga.php');

class AccesoLiga {

    private static $modelo = null;
    private $dbh = null;

    public static function getModelo() {
        if (self::$modelo == null) {
            self::$modelo == new AccesoLiga();
        }
        return self::$modelo;
    }

    public static function closeModelo() {
        if (self::$modelo != null) {
            $obj = self::$modelo;
            $obj->dbh = null;
            self::$modelo = null;
        }
    }

    public function __construct() {
        try {
            $dns = 'mysql:host='.SERVER_DB.';dbname='.DATABASE_LIGA;
            $this->dbh = new PDO($dns, DB_USER, '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión con la base de datos: ".$e->getMessage();
            exit();
        }
    }
    
}


?>