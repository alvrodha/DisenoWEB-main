<?php 
include_once(__DIR__ . '/../dat/AccesoDatos.php');


function mostrarUsusarios() {

    $titulos = ["Usuario", "Email", "Contraseña", "Acciones"];
    $msg = "<table>\n";
    // Cabecera
    $msg .= "<tr>";
    foreach ($titulos as $titulo) {
        $msg .= "<th>$titulo</th>";
    }
    $msg .= "</tr>";

    // Obtener usuarios
    $db = AccesoDatos::getModelo();
    $usuarios = $db->getUsuarios();
    foreach ($usuarios as $usuario) {
        $msg .= "<tr>";

        // Datos visibles
        $msg .= "<td>{$usuario->usser}</td>";
        $msg .= "<td>{$usuario->email}</td>";
        $msg .= "<td>{$usuario->passwd}</td>";

        // Acciones
        $msg .= "<td>
        <!--
            <a href='#'
                class='modal-btn-edit'
                data-usuario=\"" . htmlspecialchars($usuario->usser, ENT_QUOTES) . "\"
                data-email=\"" . htmlspecialchars($usuario->email, ENT_QUOTES) . "\"
                data-passwd=\"" . htmlspecialchars($usuario->passwd, ENT_QUOTES) . "\">
                <i class='bx bx-pencil'></i>
            </a>
        -->
            <a href='#'
                class='modal-btn-del'
                data-usuario=\"" . htmlspecialchars($usuario->usser, ENT_QUOTES) . "\">
                <i class='bx bx-trash'></i>
            </a>
        </td>";

    }
    $msg .= "</table>\n";
    $msg .= "<a id='modal-btn-add'>Añadir</a>";
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
function validarAddUser($newUsuario):bool {
    $db = AccesoDatos::getModelo();
    
    if ($db->checkEmail($newUsuario->email)) {
        return false;
    } elseif ($db->checkUser($newUsuario->usser)) {
        return false;
    } elseif ($newUsuario->passwd != $newUsuario->passwdRep) {
        return false;
    } elseif (!count_chars($newUsuario->passwd) < 10) {
        return false;
    } else {
        $db->addUsuario($newUsuario);
        return true;
    }
}

// Función para validar la eliminación de un usuario
function validarDelUser($usuario): bool {
    $db = AccesoDatos::getModelo();

    if ($db->checkUser($usuario->usser)) {
        // Usuario existe → borramos
        return $db->borrarUsuario($usuario->usser);
    } else {
        return false;
    }
    // Usuario no existe → fallo  
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