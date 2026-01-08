<?php
include_once('../../app/AccesoNoticias.php');
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
        <div id="content-user">
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
                            <input type="text" placeholder="Nombre">
                            <input type="email" placeholder="Email">
                            <select>
                                <option>Administrador</option>
                                <option>Usuario</option>
                            </select>
                            <div class="modal-actions">
                                <button class="close-modal">Cancelar</button>
                                <button class="confirm">Guardar</button>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL ELIMINAR -->
                    <div id="modal-del" class="modal" hidden>
                        <div class="modal-content">
                            <h2>Eliminar usuario</h2>
                            <p>¿Estás seguro de que quieres eliminar este usuario?</p>
                            <div class="modal-actions">
                                <button class="close-modal">Cancelar</button>
                                <button class="confirm danger">Eliminar</button>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL EDITAR -->
                    <div id="modal-edit" class="modal" hidden>
                        <div class="modal-content">
                            <h2>Editar usuario</h2>
                            <input type="text" placeholder="Nombre">
                            <input type="email" placeholder="Email">
                            <select>
                                <option>Administrador</option>
                                <option>Usuario</option>
                            </select>
                            <div class="modal-actions">
                                <button class="close-modal">Cancelar</button>
                                <button class="confirm">Guardar cambios</button>
                            </div>
                        </div>
                    </div>

<input type="button" id="modal-btn-add" value="Añadir usuario">

            </div>
            <!-- La funcion tiene que devolver la tabla con los usuarios según la query -->
            <table id="content-table">
                <tr>
                    <th>ID Usuario</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>usuarioEjemplo</td>
                    <td>usuarioEjemplo@example.com</td>
                    <td>Administrador</td>
                    <td><i class='bx  bx-pencil modal-btn-edit'></i></td>
                    <td><i class='bx  bx-trash modal-btn-del'></i></td>
                </tr>
            </table>
            
        </div>
    </div>
    <script src="../../web/JS/admin.js" defer></script>
</body>
</html>