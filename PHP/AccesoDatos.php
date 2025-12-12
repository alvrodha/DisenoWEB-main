<?php

include_once "Usuario.php";
include_once 'config.php';

class AccesoDatos {

    private static $modelo = null;
    private $dbh = null;

    public static function getModelo(){
        // Si no existe lo crea el acceso de a la BD
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }

    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;
            $obj->dbh = null;     // Cierro la conexión
            self::$modelo = null; // Borro el objeto.
        }
    }

    public function __construct() {
        try {
            $dns = 'mysql:host='.SERVER_DB.';dbname='.DATABASE;
            $this->dbh = new PDO($dns, DB_USER, '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión con la base de datos: ".$e->getMessage();
            exit();
        }
    }

    public function getUsuario (String $email, String $password) {
        $usr = false;
        $stmt_usuario = $this->dbh->prepare("select * from usuarios where email =? and password =?");
        $stmt_usuario->setFetchMode(PDO::FETCH_CLASS, 'usuario');
        $stmt_usuario->bindParam(1, $email);
        $stmt_usuario->bindParam(2, $password);
        if ($stmt_usuario->execute()) {
            if ($obj = $stmt_usuario->fetch()) {
                $usr = $obj;
            }
        }
        return $usr;
    }

    public function addUsuario($usuario): bool {
    try {
        $stmt = $this->dbh->prepare(
            "INSERT INTO usuarios (`email`, `usser`, `passwd`) VALUES (?, ?, ?)"
        );
        $stmt->execute([$usuario->email, $usuario->user, $usuario->passwd]);

        return $stmt->rowCount() === 1;

    } catch (PDOException $e) {
        error_log("Error al insertar usuario: " . $e->getMessage());
        return false;
    }
}

}

?>