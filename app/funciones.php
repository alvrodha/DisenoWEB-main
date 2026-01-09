<?php 
include_once(__DIR__ . '/../dat/AccesoDatos.php');


function mostrarUsusarios() {
    $titulos = [ "Usuario","Email","Contraseña"];
    $msg = "<table>\n";
     // Identificador de la tabla
    $msg .= "<tr>";
    for ($j=0; $j < count($titulos); $j++){
        $msg .= "<th>$titulos[$j]</th>";
    }  
    $msg .= "</tr>";
    $db = AccesoDatos::getModelo();
    $tussers = $db->getUsuarios();
    foreach ($tussers as $usser) {
        $msg .= "<tr>";
        $msg .= "<td>$usser->usser</td>";
        $msg .= "<td>$usser->email</td>";
        $msg .= "<td>$usser->passwd</td>";
        $msg .= "<td><a class=\"modal-btn-edit\"><i class='bx bx-pencil modal-btn-edit'></a></td>\n";
        $msg .= "<td><a class=\"modal-btn-del\"><i class='bx bx-trash modal-btn-del'></i></td>";
        $msg .="</tr>\n";
    }
    $msg .= "</table>\n";
    $msg .="<a id=\"modal-btn-add\">Añadir</a>";
   
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
function validarAddUser($usuario):bool {
    $db = AccesoDatos::getModelo();
    if (!$db->checkEmail($usuario->email)) {
        return false;
    }
    if (!$db->checkUser($usuario->usser)) {
        return false;
    }
    if ($usuario->passwd != $usuario->passwdRep) {
        return false;
    }
    if (!count_chars($usuario->passwd) < 10) {
        return false;
    }
    $db->addUsuario($usuario);
    return true;
}

// Función para validar la eliminación de un usuario
function validarDelUser($usuario):bool {
    $db = AccesoDatos::getModelo();
    if (!$db->borrarUsuario($usuario)) {
        return false;
    }
    return true;
}

// Función para validar la edición de un usuario
function validarEditUser($usuario, $NewUsuario):bool {
    $db = AccesoDatos::getModelo();

    return true;
}
?>