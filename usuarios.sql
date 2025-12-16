CREATE DATABASE IF NOT EXISTS `tetuan_usuarios`;
USE `tetuan_usuarios`;

create table if not exists 'usuarios' (
    'id' integer primary key auto_increment,
    'email' varchar(100) not null,
    'user' varchar(50) not null,
    'password' varchar(50) not null
)

INSERT INTO `usuarios` (`email`, `user`, `password`) VALUES ('root@gmail.com', 'root', 'root');