<!-- ACCESODATOS DE NOTICIAS Y USUARIOS CON SUS RESPECTIVAS FUNCIONES CON SQL -->
 <?php
 
 include_once __DIR__ . '/../app/config.php';
 include_once __DIR__ . '/Usuario.php';
 include_once __DIR__ . '/Noticia.php';
 
 class AccesoDatos{
    //Modelo de Patrón singleton
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
    //Configuración de la base de datos
     public function __construct() {
        try {
            $dns = 'mysql:host='.SERVER_DB.';dbname='.DATABASE_NAME;
            $this->dbh = new PDO($dns, DB_USER, '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión con la base de datos: ".$e->getMessage();
            exit();
        }
    }

    //-------------------------------------------------------------
    //FUNCIONES DE BBDD de noticias
    //-------------------------------------------------------------

    //getNoticias-->SELECT de las noticias con un FETCH en un bucle while para guardarlas en una tabla $tnoticias
    public function getNoticias() {
        $tnoticias = [];
        $stmt_noticias = $this->dbh->prepare("SELECT * FROM noticias ORDER BY fecha DESC");
        $stmt_noticias->setFetchMode(PDO::FETCH_CLASS, 'Noticia');
        if ($stmt_noticias->execute()) {
            while ($obj = $stmt_noticias->fetch()) {
                $tnoticias[] = $obj;
            }
        }
        return $tnoticias;
    }
    //addNoticia--> Funcion INSERT en la base de datos para los objetos noticia.
    public function addNoticia (Noticia $noticia) {
        $stmt_noticia = $this->dbh->prepare("INSERT INTO noticias (titulo, contenido, autor, fecha, visible) VALUES (?, ?, ?, ?, ?)");
        $stmt_noticia->bindParam(1, $noticia->titulo);
        $stmt_noticia->bindParam(2, $noticia->contenido);
        $stmt_noticia->bindParam(3, $noticia->autor);
        $stmt_noticia->bindParam(4, $noticia->fecha);
        $stmt_noticia->bindParam(5, $noticia->visible);
        return $stmt_noticia->execute();
    }

    //-------------------------------------------------------------
    //FUNCIONES BBDD de usuarios
    //-------------------------------------------------------------

    //getUsuario--> Funcion SELECT para el control de acceso MVC, recibe un email y lo guarda en usr
    public function getUsuario (String $email){
        $stmt = $this->dbh->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
        $usr = $stmt->fetch();
        return $usr;
    }
    
    //Funcion de admin (no de acceso MVC) select para recoger una tabla que luego devolvera a ADMIN para ver
    public function getUsuarios(): array {
        $tusser = [];
        $stmt = $this->dbh->prepare("SELECT * FROM usuarios");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
        if ($stmt->execute()) {
            while ($obj = $stmt->fetch()) {
                $tusser[] = $obj;
            }
        }
        return $tusser;
    }
    //addUsuario--> funcion insert para añadir usuarios 
    public function addUsuario($usuario): bool {
        try {
            $stmt = $this->dbh->prepare("INSERT INTO usuarios (`email`, `user`, `passwd`) VALUES (?, ?, ?)");
            $stmt->execute([$usuario->email, $usuario->usser, $usuario->passwd]);
            return $stmt->rowCount() === 1;
        } catch (PDOException $e) {
            error_log("Error al registrar usuario: " . $e->getMessage());
            return false;
        }
    }
    //borrarUsuario --> Funcion DELETE para borrar usuarios, borrando por el codigo de usuario o login
    public function borrarUsuario($usser): bool {
        try {
            $stmt = $this->dbh->prepare("DELETE FROM usuarios WHERE usser = ?");
            $stmt->bindValue(1, $usser);
            $stmt->execute();
            return $stmt->rowCount() === 1;
        } catch (PDOException $e) {
            error_log("Error al borrar usuario: " . $e->getMessage());
            return false;
        }
    }

    //checkEmail --> Funcion check para evitar validar usuarios con correos ya existentes
    public function checkEmail($email): bool {
        try {
            $stmt = $this->dbh->prepare("SELECT EXISTS (SELECT 1 FROM usuarios WHERE email = ?)");
            $stmt->bindParam(1, $email);
            $stmt->execute();
            return (bool) $stmt->fetchColumn();
        } catch (PDOException $e) {
            return false;
        }
    }

    //checkUser --> Funcion check para evitar validar usuarios con correos ya existentes
    public function checkUser($usuario): bool {
        try {
            $stmt = $this->dbh->prepare("SELECT EXISTS(SELECT 1 FROM usuarios WHERE usser = ?)");
            $stmt->bindParam(1, $usuario);
            $stmt->execute();
            return (bool) $stmt->fetchColumn();
        } catch (PDOException $e) {
            return false;
        }
    }


    //evitar clonar objetos(PATRON SINGLETON)
     public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
    public function migrarContrasenas() {
    $stmtSelect = $this->dbh->prepare("SELECT email, passwd FROM usuarios");
    $stmtSelect->execute();
    $usuarios = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

    $stmtUpdate = $this->dbh->prepare("UPDATE usuarios SET passwd = :passwd WHERE email = :email");

    foreach ($usuarios as $row) {
        if (!password_get_info($row['passwd'])['algo']) {
            $hash = password_hash($row['passwd'], PASSWORD_DEFAULT);
            $stmtUpdate->execute([
                ':passwd' => $hash,
                ':email'     => $row['email']
            ]);
        }
    }
    echo "Contraseñas migradas correctamente";
}

 }
 
 ?>