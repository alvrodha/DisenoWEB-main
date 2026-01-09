<?php 
include_once('../dat/AccesoDatos.php');

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
        $msg .= "<td>$usser->nombre</td>";
        $msg .= "<td>$usser->email</td>";
        $msg .= "<td>$usser->passwd</td>";
        $msg .= "<td><a class=\"\" href=\"#\" onclick=\"accionEditar('$usser->usser');\" ><i class='bx bx-pencil modal-btn-edit'></a></td>\n";
        $msg .= "<td><a class=\"\" href=\"#\" onclick=\"accionEliminar('$usser->usser');\" ><i class='bx bx-trash modal-btn-del'></i></td>";
        $msg .="</tr>\n";
    }
    $msg .= "</table>\n";
    $msg .="<a id=\"modal-btn-add\" href=\"#\" onclick=\"accionAlta('$usser->login');\" >Añadir</a>";
   
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
function validarAddUser($usser, $passwd, $passwdRep, $email) {
    $db = AccesoDatos::getModelo();
    if (!$db->checkEmail($email)) {
        return false;
    }
    if (!$db->checkUser($usser)) {
        return false;
    }
    if ($passwd != $passwdRep) {
        return false;
    }
    if (count_chars($passwd) < 10) {
        return false;
    }
    if (!contieneNoAlfa($passwd)) {
        return false;
    }
    $db = AccesoDatos::getModelo();
    $usuario = new Usuario();
    $usuario->$email;
    $usuario->$usser;
    $usuario->$passwd;
    $db -> addUsuario($usuario);
    return true;
}
?>