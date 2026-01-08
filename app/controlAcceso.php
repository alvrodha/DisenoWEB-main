<?php
include_once '../dat/AccesoDatos.php';
include_once '../dat/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['action'];
    if ($accion === 'login') {
        $email = trim($_POST['email'] ?? '');
        $passwd = trim($_POST['password'] ?? '');

        if (empty($email) || empty($passwd)) {
            echo "Por favor, complete todos los campos.";
            exit();
        }

        $ac = AccesoDatos::getModelo();
        $usr = $ac->getUsuario($email, $passwd);
        if ($usr) {
            if ($usr->email === 'root@gmail.com') {
                header("location: ../layouts/admin/administrador.php");
                echo "El Acceso es correcto, bienvenido a la página! (administrador)";
            } else {
                header("Location: ../layouts/home.php");
                echo "El Acceso es correcto, bienvenido a la página!";
            }
        } else {
            echo "Usuario no encontrado o contraseña incorrecta.";
        }
    } elseif ($accion === 'register') {

        $usser = trim($_POST['usser'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $passwd = trim($_POST['password'] ?? '');

        if (empty($usser) || empty($email) || empty($passwd)) {
            echo "Por favor, complete todos los campos.";
            exit();
        }

        $db = AccesoDatos::getModelo();
        $db->addUsuario((object)['usser' => $usser, 'email' => $email, 'passwd' => $passwd]);
        header("Location: ../layouts/home.php");
    }
}
?>