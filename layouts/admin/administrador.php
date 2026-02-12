<?php
session_start();
if(!isset($_SESSION['administrador'])){
    session_unset();
    session_destroy();
    header("Location: /php/DisenoWEB-main/index.php");
    exit();
}
include_once ('../../app/funciones.php');
controlInteraccion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../web/IMG/favicon.png">
    <title>TetuScores - Admin</title>
    <link rel="stylesheet" href="../../web/CSS/default.css"/>
    <link rel="stylesheet" href="../../web/CSS/adm/admin_usuarios.css"/> 
</head>
<script src="../../web/JS/background.js" defer></script>
<body>
    <canvas id="background"></canvas>

    <div id="nav">
        <div id="logo">
            <a href="administrador.php"><img src="../../web/IMG/Logo1.png" alt="Logo" width="200px"></a>
        </div>
        <ul id="nav-list">
            <li><a href="administrador.php" class="active">Liga</a></li>
            <li><a href="admNoticias.php">Noticias</a></li>
            <li><a href="admUsuarios.php">Usuarios</a></li>
        </ul>
    </div>

    <div id="content">
        <div id="content-header">
            <h1>Panel de Administrador</h1>
            <a href="../../app/logout.php" class="btn-volver" style="text-decoration: none; font-size: 0.8rem;">Cerrar Sesión</a>
        </div>

        <p style="margin-bottom: 20px; color: #415f7e;">Bienvenido. Aquí tienes el resumen actual de la liga:</p>

        <div class="contenido">
            <h2 style="margin-bottom: 15px; color: #1c1d3d;">CLASIFICACIÓN ACTUAL</h2>
            <table class="tabla-jugadores">
                <thead>
                    <tr>
                        <th>Pos</th>
                        <th>Equipo</th>
                        <th>Pts</th>
                        <th>PJ</th>
                        <th>PG</th>
                        <th>PE</th>
                        <th>PP</th>
                        <th>GF</th>
                        <th>GC</th>
                        <th>DG</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td><strong>1ºDAM</strong></td><td>30</td><td>15</td><td>10</td><td>0</td><td>5</td><td>25</td><td>15</td><td>+10</td></tr>
                    <tr><td>2</td><td>1ºB AF DUAL</td><td>28</td><td>15</td><td>9</td><td>1</td><td>5</td><td>22</td><td>14</td><td>+8</td></tr>
                    <tr><td>3</td><td>1ºB SMR</td><td>26</td><td>15</td><td>8</td><td>2</td><td>5</td><td>21</td><td>16</td><td>+5</td></tr>
                    <tr><td>4</td><td>1ºDAW</td><td>24</td><td>15</td><td>7</td><td>3</td><td>5</td><td>20</td><td>18</td><td>+2</td></tr>
                    <tr><td>5</td><td>FPB</td><td>22</td><td>15</td><td>6</td><td>4</td><td>5</td><td>18</td><td>17</td><td>+1</td></tr>
                    <tr><td>6</td><td>2ºDAW</td><td>20</td><td>15</td><td>6</td><td>2</td><td>7</td><td>17</td><td>19</td><td>-2</td></tr>
                    <tr><td>7</td><td>2ºASIR</td><td>18</td><td>15</td><td>5</td><td>3</td><td>7</td><td>16</td><td>21</td><td>-5</td></tr>
                    <tr><td>8</td><td>1ºASIR</td><td>15</td><td>15</td><td>4</td><td>3</td><td>8</td><td>14</td><td>22</td><td>-8</td></tr>
                    <tr><td>9</td><td>2ºDAM</td><td>12</td><td>15</td><td>3</td><td>3</td><td>9</td><td>12</td><td>25</td><td>-13</td></tr>
                    <tr><td>10</td><td>2º SMR</td><td>10</td><td>15</td><td>2</td><td>4</td><td>9</td><td>11</td><td>24</td><td>-13</td></tr>
                </tbody>
            </table>
        </div>
    </div>

    
    </div>
</body>
</html>