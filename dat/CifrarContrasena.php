<?php
require '../app/config.php';
require 'AccesoDatos.php';

$db = AccesoDatos::getModelo();
$db->migrarContrasenas();

?>
