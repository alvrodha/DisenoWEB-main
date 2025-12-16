<?php 

function mostrarUsusarios() {
        $titulos = [ "Usuario","Email","Contraseña","Nombre"];
    $msg = "<table>\n";
     // Identificador de la tabla
    $msg .= "<tr>";
    for ($j=0; $j < count($titulos); $j++){
        $msg .= "<th>$titulos[$j]</th>";
    }  
    $msg .= "</tr>";
    $auto = $_SERVER['PHP_SELF'];
    $db = AccesoDatos::getModelo();
    $tussers = $db->getUsuarios();
    foreach ($tussers as $usser) {
        $msg .= "<tr>";
        $msg .= "<td>$usser->usser</td>";
        $msg .= "<td>$usser->email</td>";
        $msg .= "<td>$usser->password</td>";
        $msg .= "<td>$usser->nombre</td>";
        $msg .="<td><a href=\"#\" onclick=\"accionBorrar('$usser->nombre','$usser->login');\" >Borrar</a></td>\n";
        $msg .="<td><a href=\"#\" onclick=\"accionModificar('$usser->email');\" >Modificar</a></td>\n";
        $msg .="<td><a href=\"#\" onclick=\"accionAlta('$usser->login');\" >Añadir</a></td>\n";
        $msg .="</tr>\n";
    }
    $msg .= "</table>";
   
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
?>