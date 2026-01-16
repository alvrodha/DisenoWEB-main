|--------------------------------|
|            AUTORES             |
|--------------------------------|
Álvaro Redondo Rubio
Jorge Parrondo
Mario Andrés


|--------------------------------|
|            MEJORAS             |
|--------------------------------|

|----Obligatorias----|
Mecanismo de control de acceso mediante usuario y contraseña verificados en la BBSS
Cierre automático de sesion por inactividad durante 10 min
Cierrre de sesion accesible en cualquier momento
Vista personalizada adecuada a los datos de cada usuario
Contenido visible unicamente para usuarios con la sesión iniciada

|----Optativas----|
Sistema de registro de nuevos usuarios tanto por parte del propio usuario como por parte del administrador desde la ventana de gestión de usuarios
Formulario de modificación de datos tanto por parte del administrador como por parte del usuario
Vista de invitado limitada

|----Optativas-Personalizadas----|
Hasheo automático de contraseñas al registrar usuarios y al insertar los usuarios de prueba
Sistema gestor de noticias (añadir, eliminar, editar y visualizar)
Sistema de modales (ventanas emergentes) en ambos paneles de administración para confirmar cambios, inserciones y eliminaciones


|--------------------------------|
|         BASE DE DATOS          |
|--------------------------------|

|----Conexión----|
Configurable en "/app/config.php"
database_name = tetuan_league
database_user = root
database_password = 
server_db = localhost
Consultas en "/app/AccesoDatos.php"

|----Creación----|
Script de creación e inserción en "/dat/basededatos.sql"
Las contraseña se insertan hasheadas automaticamente, no es necessario un script adicional


|--------------------------------|
|        FUNCIONALIDADES         |
|--------------------------------|

|----Control-de-Acceso----|
Todo el flujo controlador de acceso se encuentra en "/app/controlAcceso.php"

|----funciones----|
Las funciones que se han podido refactorizar han sido organizadas en "/app/funciones.php"