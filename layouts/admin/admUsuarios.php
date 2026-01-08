<?php
include_once('../../dat/AccesoDatos.php');
include_once('../../app/funciones.php');
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
        <div id="content-user">
            <div id="content-header">
                <h1>Panel de Administrador de usuarios</h1>
                <input  type="button" id="modal-btn" name="addDato" value="añadir usuario">
                <div class="modal" ></div>
            </div>
            <!-- La funcion tiene que devolver la tabla con los usuarios según la query -->
            <table id="content-table">
                <tr>
                    <th>ID Usuario</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th colspan="2">Acciones</th>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>usuarioEjemplo</td>
                    <td>usuarioEjemplo@example.com</td>
                    <td>Administrador</td>
                    <td><button>Editar</button></td>
                    <td><button>Eliminar</button></td>
                </tr>
            </table>
            <!-- <?= mostrarUsusarios() ?> -->
        </div>
    </div>
    <script src="../../web/JS/admin.js"></script>
</body>
</html>