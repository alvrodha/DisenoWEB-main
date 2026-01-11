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
        $usr = $ac->getUsuario($email);
       if (!$usr) {
           echo "Usuario no encontrado";
           exit();
        }
       if (($usr->email === "root@gmail.com") && password_verify($passwd, $usr->passwd)) {    
           session_start();
           $_SESSION['ultimaAccion'] = time();
           header("Location: ../layouts/admin/administrador.php");
       }else if(password_verify($passwd, $usr->passwd)){  
           session_start();
           $_SESSION['ultimaAccion'] = time();
           header("Location: ../layouts/home.php");
       } else {
           header("Location: ../index.php");
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