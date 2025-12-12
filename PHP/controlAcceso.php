<?php
include_once 'AccesoDatos.php';
include_once 'Usuario.php';

$email = $_POST['email'];
$password = $_POST['password'];

$ac = AccesoDatos::getModelo();
$usr = $ac->getUsuario($email, $password);
if ($usr) {
    echo 'ACCESO CORRECTO!! Bienvenido: ' . $usr->email;//CAMBIAR
} else {
    echo "Usuario no encontrado o contraseña incorrecta.";
}
?>