<?php 
include_once(__DIR__ . '/../dat/AccesoDatos.php');


function mostrarUsusarios() {
    $titulos = ["Usuario", "Email", "Contraseña", "Acciones"];
    $msg = "<table id='tablaUsuarios' class='table-users'>\n";
        
    // Cabecera con thead
    $msg .= "<thead><tr>";
    foreach ($titulos as $titulo) {
        $msg .= "<th>$titulo</th>";
    }
    $msg .= "</tr></thead>";

    $msg .= "<tbody>"; // Inicio de cuerpo
    $db = AccesoDatos::getModelo();
    $usuarios = $db->getUsuarios();
    foreach ($usuarios as $usuario) {
        $msg .= "<tr>";
        $msg .= "<td>{$usuario->usser}</td>";
        $msg .= "<td>{$usuario->email}</td>";
        $msg .= "<td>{$usuario->passwd}</td>";
        // ... resto del código de los botones ...
        $msg .= "<td>
        <!--
            <form method=\"post\">
                <input type=\"hidden\" name=\"usuarioTabla\" value=\"{$usuario->usser}\">
                <input type=\"hidden\" name=\"emailTabla\" value=\"{$usuario->email}\">
                <input type=\"hidden\" name=\"passwdTabla\" value=\"{$usuario->passwd}\">
                <button type=\"submit\" class=\"modal-btn-edit\">
                    <i class='bx bx-pencil'></i>
                </button>
            </form>
        -->
            <form method=\"post\" class=\"form-del-tabla\">
                <input type=\"hidden\" name=\"usuarioTabla\" value=\"{$usuario->usser}\">
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
    $titulos = [ "Título","Fecha","Autor","Contenido", "Visibilidad", "Gestionar"];
    $msg = '<table id="tablaNoticias">'."\n";
     // Identificador de la tabla
    $msg .= "<tr>";
    for ($j=0; $j < count($titulos); $j++){
        $msg .= "<th>$titulos[$j]</th>";
    }  
    $msg .= "</tr>";
    $db = AccesoDatos::getModelo();
    $tnoticias = $db->getNoticias();
    foreach ($tnoticias as $noticia) {
        $msg .= "<tr>";
        $msg .= "<td> $noticia->titulo </td>";
        $msg .= "<td> $noticia->fecha </td>";
        $msg .= "<td> $noticia->autor </td>";
        $msg .= "<td> $noticia->contenido </td>";
        if ($noticia->visible = true) {
            $msg .= "<td>Visible</td>";
        } else {
            $msg .= "<td>Oculto</td>";
        }
        $msg .= "<td><a href>Detalles</a></td>\n";
        $msg .= "</tr>\n";
    }
    $msg .= "</table>\n";

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
    /*
    if ($newUsuario->passwd !== $newUsuario->passwdRep) {
        return false;
    }

    if (strlen($newUsuario->passwd) < 8) {
        return false;
    }

    if ($db->checkEmail($newUsuario->email)) {
        return false;
    }

    if ($db->checkUser($newUsuario->usser)) {
        return false;
    }
    */
    if ($newUsuario->passwd != $newUsuario->passwdRep) {
        return false;
    }
    $newUsuario->passwd = password_hash($newUsuario->passwd, PASSWORD_DEFAULT);
    $db->addUsuario($newUsuario);
    return true;
}


// Función para validar la eliminación de un usuario
/*
function validarDelUser($usuario): bool {
    $db = AccesoDatos::getModelo();

    if ($db->checkUser($usuario->usser)) {
        // Usuario existe → borramos
        return $db->borrarUsuario($usuario->usser);
    } else {
        return false;
    }
    // Usuario no existe → fallo  
}*/
function validarDelUser($usuario): bool {
    $db = AccesoDatos::getModelo();
    return $db->borrarUsuario($usuario->usser);
}



// Función para validar la edición de un usuario
/*
function validarEditUser($usuario, $NewUsuario):bool {
    $db = AccesoDatos::getModelo();


    return true;
}
*/

//Función de detección de interaccion con la pagina web
Function controlInteraccion(){
    $timeout = 600; 
    if(!isset ($_SESSION['ultimaAccion'])){
         header("Location: /php/DisenoWEB-main/index.php");
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