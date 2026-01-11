<?php
include_once('../../dat/AccesoDatos.php');
include_once('../../app/funciones.php');
//control de sesion
include_once __DIR__ . 'funciones.php';
controlInteraccion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../web/IMG/favicon.png">
    <title>TetuScores</title>
    <link rel="stylesheet" href="../../web/CSS/default.css"/>
    <link rel="stylesheet" href="../../web/CSS/adm/noticias.css">
</head>
<body>
    <div id="nav">
        <div id="logo">
            <a href="administrador.php"><img src="../../web/IMG/Logo1.png" alt="Logo" width="200px"></a>
        </div>
        <ul id="nav-list">
            <li><a href="admLiga.html">Liga</a></li>
            <li><a href="admNoticias.php">Noticias</a></li>
            <li><a href="admUsuarios.php">Usuarios</a></li>
        </ul>
    </div>

<!-- Contenedor principal de todo el contenido de la página -->
    <div id="content">
        <div id="tabla">
            <div id="controladorTabla">
                <h1>Panel de Administrador de noticias</h1>
                <input  type="button" id="modal-btn" name="addNoticia" value="añadir noticia">
                <div class="modal modal-add" hidden>

                </div>
                <div class="modal modal-del" hiden>

                </div>
                <div class="modal modal-edit" hiden>

                </div>
            </div>
            <!-- La funcion tiene que devolver la tabla con las noticias según la query -->
            <?= mostrarNoticiasAdmin() ?>
        </div>
    </div>
    <script src="../../web/JS/admin.js"></script>
</body>
</html>