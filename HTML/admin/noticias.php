<?php
include_once('../../PHP/AccesoNoticias.php');
include_once('../../PHP/funciones.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../SRC/favicon.png">
    <title>TetuScores</title>
    <link rel="stylesheet" href="../../CSS/default.css"/>
</head>
<body>
    <div id="nav">
        <div id="logo">
            <a href="../../index.html"><img src="../../SRC/Logo1.png" alt="Logo" width="200px"></a>
        </div>
        <ul id="nav-list">
            <li><a href="liga.php">Liga</a></li>
            <li><a href="noticias.php">Noticias</a></li>
            <li><a href="usuarios.php">Usuarios</a></li>
        </ul>
    </div>

<!-- Contenedor principal de todo el contenido de la página -->
    <div id="content">
        <h1>Panel de Administrador</h1>
        <p>Bienvenido al panel de administración. Aquí puedes gestionar usuarios, noticias y la liga.</p>
        <div id="tabla">
            <h1>Panel de Administrador de usuarios</h1>
            <?= mostrarNoticiasAdmin() ?>
        </div>
    </div>
</body>
</html>