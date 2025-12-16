<?php

include_once('Usuario.php');
include_once('AccesoDatos.php');

function accionBorrar ($login){    
    $db = AccesoDatos::getModelo();
    $tuser = $db->borrarUsuario($login);
}

function accionTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
    header("Refresh:0 url='./index.php'");
}
 
function accionAlta(){
    $usser = new Usuario();
    $usser->nombre  = "";
    $usser->login   = "";
    $usser->password   = "";
    $usser->comentario = "";
    $orden= "Nuevo";
    include_once "layout/formulario.php";
}

function accionModificar($email){
    $db = AccesoDatos::getModelo();
    $usser = $db->getUsuarioAdm($email);
    $orden="Modificar";
    include_once "layout/formulario.php";
}

function accionPostAlta(){
    $usser = new Usuario();
    $usser->nombre  = $_POST['nombre'];
    $usser->login   = $_POST['login'];
    $usser->password   = $_POST['clave'];
    $usser->comentario = $_POST['comentario'];
    $db = AccesoDatos::getModelo();
    $db->addUsuario($usser);
}

function accionPostModificar(){
    $user = new Usuario();
    $user->nombre  = $_POST['nombre'];
    $user->login   = $_POST['login'];
    $user->password  = $_POST['clave'];
    $user->comentario = $_POST['comentario'];
    $db = AccesoDatos::getModelo();
    $db->modUsuario($user);
}
?>