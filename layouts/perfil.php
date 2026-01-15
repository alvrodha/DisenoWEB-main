<?php
session_start();
include_once ('../dat/AccesoDatos.php');
include_once ('../app/funciones.php');
//control de sesion
controlInteraccion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../web/IMG/favicon.png">
    <title>TetuScores</title>
    <link rel="stylesheet" href="../web/CSS/default.css"/>
    <link rel="stylesheet" href="../web/CSS/home.css"/>
</head>
<script src="../web/JS/background.js" defer></script>
<body>
    <canvas id="background"></canvas>
    <div id="nav">
        <div id="logo">
            <a href="../home.php"><img src="../web/IMG/Logo1.png" alt="Logo" width="200px"></a>
        </div>
        <ul id="nav-list">
            <li><a href="calendario.php" class="active">CALENDARIO</a></li>
            <li><a href="equipos.php">EQUIPOS</a></li>
            <li><a href="clasificacion.php">CLASIFICACIÓN</a></li>
            <li><a href="perfil.php">PERFIL</a></li>
        </ul>
    </div>
    <div class="ticker-s24">
        <div class="ticker__wrap">
            <ul class="ticker__list">
                <li class="ticker__item">Últimos resultados actualizados</li>
                <li class="ticker__item">Nuevos partidos añadidos a Tetuscores</li>
                <li class="ticker__item">Estadísticas en tiempo real disponibles</li>
                <li class="ticker__item">Consulta rankings y clasificaciones</li>
                <li class="ticker__item">Notificaciones de goles al instante</li>
                <li class="ticker__item">Sigue tus equipos favoritos</li>
                <li class="ticker__item">Tetuscores – Datos precisos y al momento</li>
                <li class="ticker__item">Nuevas funciones disponibles en la app</li>
                <li class="ticker__item">Calendario de próximos partidos</li>
                <li class="ticker__item">Estadísticas de jugadores actualizadas</li>
            </ul>
            <ul class="ticker__list">
                <li class="ticker__item">   </li>
                <li class="ticker__item">Nuevos partidos añadidos a Tetuscores</li>
                <li class="ticker__item">Estadísticas en tiempo real disponibles</li>
                <li class="ticker__item">Consulta rankings y clasificaciones</li>
                <li class="ticker__item">Notificaciones de goles al instante</li>
                <li class="ticker__item">Sigue tus equipos favoritos</li>
                <li class="ticker__item">Tetuscores – Datos precisos y al momento</li>
                <li class="ticker__item">Nuevas funciones disponibles en la app</li>
                <li class="ticker__item">Calendario de próximos partidos</li>
                <li class="ticker__item">Estadísticas de jugadores actualizadas</li>
            </ul>
        </div>
    </div>
    <div id="navWindow">
        <div id="navWindowPath">
            <a href="../index.php">Home</a>
        </div>
        <div id="navWindowUser">
            <div id="navWindowUserButton">
                <img src="../web/IMG/user.png">
                <a href="../app/logout.php">Cerrar la sesion</a>
            </div> 
        </div>
    </div>
</div>
<div id="content">
    <h1>Perfil de jugador:</h1>
    <?php echo verPerfil(); ?>
  BOTON DE CAMBIAR PERFIL AQUI
</div>
<div id="footer">
    <div class="footer-content">
        <p>Contacto: <a href="mailto:jorgeparron2@gmail.com">jorgeparron2@gmail.com</a></p>
        <p>Teléfono: <a href="tel:+34644736788">+34 644 73 67 88</a></p>
        <p>Dirección: Calle Vía Límite, 14, 28029 Madrid, España</p>
    </div>
    <div class="footer-copy">
        <p>© 2025 TetuScores. Todos los derechos reservados.</p>
    </div>
</div>
</body>
</html>
<style>
/* Estilo general de la tabla */
.table-users {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    border-radius: 8px;
    overflow: hidden;
}

/* Cabecera */
.table-users thead {
    background-color: #4CAF50;
    color: white;
    text-align: left;
}

/* Filas de la cabecera */
.table-users thead th {
    padding: 12px 15px;
}

/* Cuerpo de la tabla */
.table-users tbody tr {
    background-color: #f9f9f9;
    transition: background 0.3s;
}

/* Filas impares */
.table-users tbody tr:nth-child(odd) {
    background-color: #eaf2f8;
}

/* Hover sobre la fila */
.table-users tbody tr:hover {
    background-color: #d1e7dd;
}

/* Celdas */
.table-users tbody td {
    padding: 12px 15px;
    border-bottom: 1px solid #ddd;
}

/* Links de acciones */
.table-users tbody td a {
    text-decoration: none;
    color: #4CAF50;
    font-weight: bold;
    margin-right: 10px;
    transition: color 0.3s;
}

.table-users tbody td a:hover {
    color: #2e7d32;
}

/* Responsivo */
@media screen and (max-width: 600px) {
    .table-users {
        width: 100%;
        font-size: 14px;
    }

    .table-users thead {
        display: none;
    }

    .table-users tbody td {
        display: block;
        text-align: right;
        padding-left: 50%;
        position: relative;
    }

    .table-users tbody td::before {
        content: attr(data-label);
        position: absolute;
        left: 15px;
        font-weight: bold;
        text-transform: uppercase;
    }
}
</style>