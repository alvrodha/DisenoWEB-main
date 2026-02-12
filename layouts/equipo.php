<?php
session_start();
include_once ('../dat/AccesoDatos.php');
include_once ('../app/funciones.php');
controlInteraccion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../web/IMG/favicon.png">
    <title>TetuScores - Detalle de Equipo</title>
    <link rel="stylesheet" href="../web/CSS/default.css" />
    <link rel="stylesheet" href="../web/CSS/equipo.css">
</head>
<script src="../web/JS/background.js" defer></script>
<body>
    <canvas id="background"></canvas>
    
    <div id="nav">
        <div id="logo">
            <a href="home.php"><img src="../web/IMG/Logo1.png" alt="Logo" width="200px"></a>
        </div>
        <ul id="nav-list">
            <li><a href="calendario.php">CALENDARIO</a></li>
            <li><a href="equipos.php" class="active">EQUIPOS</a></li>
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
            <!-- Copia automática para el loop -->
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
            <a href="./home.php">Home</a> > <a href="equipos.php">Equipos</a> > <a href="equipos.php">Equipos</a>
        </div>
        <div id="navWindowUser">
            <div id="navWindowUserButton">
                <img src="../web/IMG/user.png">
                <a href="../app/logout.php">Cerrar la sesión</a>
            </div>
            </div>
    </div>

    <div id="content">
    <div class="main-layout">
        <div class="canvas-side">
            <canvas id="campoFutbol" width="300" height="450"></canvas>
        </div>

        <div class="info-side">
            <div class="container-equipo">
                <div class="header-ficha">
                    <img src="../web/IMG/ESCUDOS/EQ-1ºDAW.png" width="100px">
                    <div>
                        <h2>EQUIPO DEMO</h2>
                        <p>Fútbol 5 - Torneo Tetuán</p>
                    </div>
                </div>

                <div class="grid-stats">
                    <div class="stat-box"><span>10</span>PJ</div>
                    <div class="stat-box"><span>7</span>PG</div>
                    <div class="stat-box"><span>1</span>PE</div>
                    <div class="stat-box"><span>2</span>PP</div>
                </div>

                <table class="tabla-jugadores">
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Jugador</th>
                            <th>Posición</th>
                            <th>Goles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>García, Carlos</td><td>Portero</td><td>0</td></tr>
                        <tr><td>4</td><td>Rodríguez, Luis</td><td>Cierre</td><td>2</td></tr>
                        <tr><td>7</td><td>Martínez, Ana</td><td>Ala</td><td>5</td></tr>
                        <tr><td>10</td><td>López, Javier</td><td>Pívot</td><td>12</td></tr>
                    </tbody>
                </table>

                <div style="text-align: center;">
                    <button class="btn-volver" onclick="location.href='equipos.php'">VOLVER A EQUIPOS</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../web/JS/campo.js"></script>

    <div id="footer">
    <div class="footer-content">
        <p>Contacto: <a href="mailto:jorgeparron2@gmail.com">jorgeparron2@gmail.com</a></p>
        <p>Teléfono: <a href="tel:+34644736788">+34 644 73 67 88</a></p>
        <p>Dirección: Calle Vía Límite, 14, 28029 Madrid, España</p>
    </div>
    <div class="footer-copy">
        <p>© 2025 TetuScores. Todos los derechos reservados.</p>
    </div></div>
</body>
</html>