<?php 
include_once(__DIR__ . '/../dat/AccesoDatos.php');
function mostrarUsusarios() {
    $titulos = ["Usuario", "Rol", "Email", "Contraseña", "Acciones"];
    $msg = "<table id='tablaUsuarios' class='table-datos'>\n";
    $msg .= "<thead><tr>";
    foreach ($titulos as $titulo) {
        $msg .= "<th>$titulo</th>";
    }
    $msg .= "</tr></thead>";
    $msg .= "<tbody>";

    $db = AccesoDatos::getModelo();
    $usuarios = $db->getUsuarios();
    foreach ($usuarios as $usuario) {
        $msg .= "<tr>";
        $msg .= "<td>{$usuario->usser}</td>";
        $msg .= "<td>{$usuario->rol}</td>";
        $msg .= "<td>{$usuario->email}</td>";
        $msg .= "<td>{$usuario->passwd}</td>";
        $msg .= "<td>
            <form method=\"post\" class=\"form-edit-tabla\">
                <input type=\"hidden\" name=\"idTabla\" value=\"{$usuario->id_usuario}\">
                <input type=\"hidden\" name=\"usuarioTabla\" value=\"{$usuario->usser}\">
                <input type=\"hidden\" name=\"emailTabla\" value=\"{$usuario->email}\">
                <input type=\"hidden\" name=\"passwdTabla\" value=\"{$usuario->passwd}\">
                <input type=\"hidden\" name=\"partidosTabla\" value=\"{$usuario->partidos}\">
                <input type=\"hidden\" name=\"golesTabla\" value=\"{$usuario->goles}\">
                <input type=\"hidden\" name=\"asistenciasTabla\" value=\"{$usuario->asistencias}\">
                <input type=\"hidden\" name=\"faltasTabla\" value=\"{$usuario->faltas}\">
                <input type=\"hidden\" name=\"edadTabla\" value=\"{$usuario->edad}\">
                <input type=\"hidden\" name=\"nombreTabla\" value=\"{$usuario->nombre}\">
                <input type=\"hidden\" name=\"ape1Tabla\" value=\"{$usuario->ape1}\">
                <input type=\"hidden\" name=\"ape2Tabla\" value=\"{$usuario->ape2}\">
                <button type=\"button\" class=\"modal-btn-edit\">
                    <i class='bx bx-pencil'></i>
                </button>
            </form>
            <form method=\"post\" class=\"form-del-tabla\">
                <input type=\"hidden\" name=\"usuarioTabla\" value=\"{$usuario->id_usuario}\">
                <button type=\"button\" class=\"modal-btn-del\">
                    <i class=\"bx bx-trash\"></i>
                </button>
            </form>
        </td>";
        $msg .= "</tr>";
    }
    $msg .= "</tbody></table>\n";
    return $msg;
}

function mostrarNoticias() {
    $msg = "";
    $estado = true;
    $db = AccesoDatos::getModelo();
    $tnoticias = $db->getNoticias();
    foreach ($tnoticias as $noticia) {
        if ($noticia->visible == true) {
            if ($estado) {
                $msg .= '<p clase="active">';
                $estado == false;
            } else {
                $msg .= "<p>";
            }
            $msg .= "$noticia->fecha" . ":" . "$noticia->contenido";
            $msg .= "</p>\n";
        }
    }
    return $msg;
}

function mostrarNoticiasAdmin(){
    $titulos = ["ID", "Título","Fecha","Autor","Contenido", "Visibilidad", "Gestionar"];
    $msg = "<table id='tablaNoticias' class='table-datos'>\n";
     // Identificador de la tabla
    $msg .= "<thead><tr>";
    foreach ($titulos as $titulo) {
        $msg .= "<th>$titulo</th>";
    }
    $msg .= "</tr></thead>";
    $msg .= "<tbody>";
    $db = AccesoDatos::getModelo();
    $tnoticias = $db->getNoticias();
    foreach ($tnoticias as $noticia) {
        $msg .= "<tr>";
        $msg .= "<td> $noticia->id </td>";
        $msg .= "<td> $noticia->titulo </td>";
        $msg .= "<td> $noticia->fecha </td>";
        $msg .= "<td> $noticia->autor </td>";
        $msg .= "<td> $noticia->contenido </td>";
        if ($noticia->visible = true) {
            $msg .= "<td>Visible</td>";
        } else {
            $msg .= "<td>Oculto</td>";
        }
        $msg .= "<td>
        <!--
            <form method=\"post\">
                <input type=\"hidden\" name=\"id\" value=\"{$noticia->id}\">
                <input type=\"hidden\" name=\"tituloTabla\" value=\"{$noticia->titulo}\">
                <input type=\"hidden\" name=\"fechaTabla\" value=\"{$noticia->fecha}\">
                <input type=\"hidden\" name=\"autorTabla\" value=\"{$noticia->autor}\">
                <input type=\"hidden\" name=\"contenidoTabla\" value=\"{$noticia->contenido}\">
                <input type=\"hidden\" name=\"VisibilidadTabla\" value=\"{$noticia->visisble}\">
                <button type=\"submit\" class=\"modal-btn-edit\">
                    <i class='bx bx-pencil'></i>
                </button>
            </form>
        -->
            <form method=\"post\" class=\"form-del-tabla\">
                <input type=\"hidden\" name=\"noticiaTabla\" value=\"{$noticia->id}\">
                <button type=\"button\" class=\"modal-btn-del\">
                    <i class=\"bx bx-trash\"></i>
                </button>
            </form>
        </td></tr>";
    }
    $msg .= "</tbody></table>\n";
    return $msg;
}


function limpiarEntrada(string $entrada):string{
    $salida = trim($entrada); // Elimina espacios antes y después de los datos
    $salida = strip_tags($salida); // Elimina marcas
    return $salida;
}

// Función para limpiar todos elementos de un array
function limpiarArrayEntrada(array &$entrada){
 
    foreach ($entrada as $key => $value ) {
        $entrada[$key] = limpiarEntrada($value);
    }
}

// Función para validar la inserción de un usuario para evitar duplicaciones
function validarAddUser($newUsuario): bool {
    $db = AccesoDatos::getModelo();
    if (strlen($newUsuario->passwd) < 8) {
        return false;
    }

    if ($db->checkEmail($newUsuario->email)) {
        return false;
    }

    if ($db->checkUser($newUsuario->usser)) {
        return false;
    }
    $newUsuario->passwd = password_hash($newUsuario->passwd, PASSWORD_DEFAULT);
    $db->addUsuario($newUsuario);
    return true;
}

// Función para validar la inserción de una noticia
function validarAddNot($noticia):bool {
    $db = AccesoDatos::getModelo();
    $db->addNoticia($noticia);
    return true;
}


// Función para validar la eliminación de un usuario
function validarDelUser($usuario): bool {
    $db = AccesoDatos::getModelo();
    return $db->borrarUsuario($usuario->id_usuario);
}

// Fución para validar la eliminación de noticias
function validarDelNot($noticia):bool {
    $db = AccesoDatos::getModelo();
    return $db->borrarNoticia($noticia->id);
}

// Función para editar los usuarios
function validarEditUser($id_usuario, $newUsuario):bool {
    $db = AccesoDatos::getModelo();

    return $db->modificarPerfil($id_usuario, $newUsuario);
}
function verPerfil() {
    if (!isset($_SESSION['email'])) {
        return "<p>Error: sesión no válida</p>";
    }

    $db = AccesoDatos::getModelo();
    $email = $_SESSION['email'];

    // Devuelve un objeto Usuario
    $u = $db->getUsuario($email);

    if (!$u) {
        return "<p>No se pudo cargar el perfil.</p>";
    }

    // Evitar NULLs
    $u->partidos    ??= 0;
    $u->goles       ??= 0;
    $u->asistencias ??= 0;
    $u->faltas      ??= 0;
    $u->intentos    ??= 0;

    $estado = $u->bloqueado 
        ? "<span class='estado bloqueado'>Bloqueado</span>" 
        : "<span class='estado activo'>Activo</span>";

    return "
    <div class='perfil-card'>
        <div class='perfil-header'>
            <img src='../web/IMG/FotoPerfildefault.jpg' class='perfil-avatar'>
            <div>
                <h2>{$u->nombre} {$u->ape1} {$u->ape2}</h2>
                <p>@{$u->usser}</p>
                <p>Email: {$u->email}</p>
                <p>Edad: {$u->edad}</p>
                <p>Estado: $estado</p>
            </div>
        </div>

        <h3>Estadísticas</h3>
        <div class='stats-grid'>
            <div>🏟 Partidos<br><strong>{$u->partidos}</strong></div>
            <div>⚽ Goles<br><strong>{$u->goles}</strong></div>
            <div>🎯 Asistencias<br><strong>{$u->asistencias}</strong></div>
            <div>🚫 Faltas<br><strong>{$u->faltas}</strong></div>
        </div>

        <div class='perfil-actions'>
            <a href='editarPerfil.php' class='btn'>Editar perfil</a>
        </div>
    </div>";
}


//Función de detección de interaccion con la pagina web
Function controlInteraccion(){
    $timeout = 600; 
    if(!isset ($_SESSION['ultimaAccion'])){
         header("Location: /php/DisenoWEB-main/index.php");
         exit();
    }
    if (isset($_SESSION['ultimaAccion']) && (time() - $_SESSION['ultimaAccion']) > $timeout) {
        session_unset();
        session_destroy();
        header("Location: /php/DisenoWEB-main/index.php");
        exit();
    }

    $_SESSION['ultimaAccion'] = time();
}
?>

