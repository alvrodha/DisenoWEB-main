<?php
include_once ('../../app/funciones.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'];
    switch ($accion) {
        case "añadir":
            $usuario = definirNewUsr();
            if (validarAddUser($usuario)) {
                
            }
            break;
        case "eliminar":
            $usuario = definirUsr();
            if (validarDelUser($usuario)) {

            }
            break;
        case "editar":
            $usuario = definirUsr();
            $NewUsuario = definirNewUsr();
            if (!validarEditUser($usuario, $NewUsuario)) {
                $msg = '';
            }
            break;
    }
}

// Definir usuario, a partir de la tabla generada
function definirUsr() {
    $usuario = new Usuario();
    $usuario->usser = '';
    $usuario->passwd = '';
    $usuario->email = '';
    return $usuario;

}

// Definir usuario, a partir de los datos introducidos
function definirNewUsr() {
        $usuario = new Usuario();
        $usuario->usser = $_POST['usuario'];
        $usuario->passwd = $_POST['contraseña'];
        $usuario->passwdRep = $_POST['contraseñaRep'] ?? '';
        $usuario->email = $_POST['email'];
        return $usuario;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../web/IMG/favicon.png">
    <title>TetuScores</title>
    <link rel="stylesheet" href="../../web/CSS/default.css"/>
    <link rel="stylesheet" href="../../web/CSS/adm/usuarios.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div id="nav">
        <div id="logo">
            <a href="administrador.html"><img src="../../web/IMG/Logo1.png" alt="Logo" width="200px"></a>
        </div>
        <ul id="nav-list">
            <li><a href="admLiga.html">Liga</a></li>
            <li><a href="admNoticias.php">Noticias</a></li>
            <li><a href="admUsuarios.php">Usuarios</a></li>
        </ul>
    </div>

<!-- Contenedor principal de todo el contenido de la página -->
    <div id="content">
        <div id="content-table">
            <div id="content-header">
                <h1>Panel de Administrador de usuarios</h1>
                <div id="inputs-header">
                    <input type="search" class="search-bar" value="Search">
                    <ul class="menu-order">
                        <li class="menu-order menu-order-dropdown">
                            <a href="#" class="menu-link">
                                <span>Ordenar</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="#" class="sub-menu-item">Por fecha</a></li>
                                <li><a href="#" class="sub-menu-item">Por nombre</a></li>
                                <li><a href="#" class="sub-menu-item">Por id</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- MODAL AÑADIR -->
                    <div id="modal-add" class="modal" hidden>
                        <div class="modal-content">
                            <h2>Añadir usuario</h2>
                            <form class="modal-form" method="post">
                                <input type="hidden" name="accion" value="añadir">
                                <input type="text" name="usuario" value="Usuario">
                                <input type="email" name="email" value="Email">
                                <input type="text" name="contraseña" value="Contraseña">
                                <input type="text" name="contraseñaRep" value="Contraseña">
                                <div class="modal-actions">
                                    <input type="reset" class="close-modal" value="Cancelar"></button>
                                    <input type="submit" class="confirm" value="Añadir">
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- MODAL ELIMINAR -->
                    <div id="modal-del" class="modal" hidden>
                        <div class="modal-content">
                            <h2>Eliminar usuario</h2>
                            <p>¿Estás seguro de que quieres eliminar este usuario?</p>
                            <form class="modal-form" method="post">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="hidden" name="usuario" value="Usuario">
                                <input type="hidden" name="email" value="Email">
                                <input type="hidden" name="contraseña" value="Contraseña">
                                <div class="modal-actions">
                                    <input type="reset" class="close-modal" value="Cancelar">
                                    <input type="submit" class="confirm" value="Eliminar">
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- MODAL EDITAR -->
                    <div id="modal-edit" class="modal" hidden>
                        <div class="modal-content">
                            <h2>Editar usuario</h2>
                            <form class="modal-form" method="post">
                                <input type="hidden" name="accion" value="editar">
                                <input type="text" name="Newnombre" value="Nombre">
                                <input type="email" name="Newemail" value="Email">
                                <input type="text" name="NewContraseña" value="Contraseña">
                                <input type="text" name="NewRepContraseña" value="Confirmar Contraseña">
                                <div class="modal-actions">
                                    <input type="reset" class="close-modal" value="Cancelar"></input>
                                    <input type="submit" class="confirm" value="Guardar Cambios"></input>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- MODAL ÉXITO EN LA TRANSACCiÓN -->
                    <div id="modal-succes" class="modal" hidden>
                        <h2>Éxito en la transacción</h2>
                    </div>

                    <!-- MODAL ERROR EN LA TRANSACCiÓN -->
                    <div id="modal-fail" class="modal" hidden>
                        <h2>Error en la transacción</h2>
                    </div>
                </div>
            </div>
            <?= mostrarUsusarios() ?>   
        </div> 
    </div>
    <script src="../../web/JS/admin.js" defer></script>
</body>
</html>