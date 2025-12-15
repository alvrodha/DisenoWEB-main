<?php
include_once 'AccesoDatos.php';
include_once 'Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['action'];
    if ($accion === 'login') {
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($email) || empty($password)) {
            echo "Por favor, complete todos los campos.";
            exit();
        }

        $ac = AccesoDatos::getModelo();
        $usr = $ac->getUsuario($email, $password);
        if ($usr) {
            if ($usr->usser === 'admin') {
                header("location: ../HTML/administrador.html");
            } else {
                header("Location: ../index.html");
            }
        } else {
            echo "Usuario no encontrado o contraseña incorrecta.";
        }
    } elseif ($accion === 'register') {

        $usser = trim($_POST['usser'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($usser) || empty($email) || empty($password)) {
            echo "Por favor, complete todos los campos.";
            exit();
        }

        $db = AccesoDatos::getModelo();
        $db->addUsuario((object)['usser' => $usser, 'email' => $email, 'passwd' => $password]);
        header("Location: ../index.html");
    }
}
?>