drop database if exists jopi;
create database jopi;
use jopi;

drop table if exists n_usuario;
create table G_Usuario(
id_usuario int primary key AUTO_INCREMENT,
nombreUsu varchar(30) not null,
apellidoUsu varchar(30)  not null,
correoUsu varchar (25),
usuario varchar(20) not null,
clave varchar(32) not null,
cargo varchar(20)default 'Usuario'not null 
);
drop table if exists usuarios;
create table usuarios(
id_usuario int primary key AUTO_INCREMENT,
nombre varchar(50) not null,
email varchar(50)  not null,
contraseña varchar (255) not null 
);

-- login
drop procedure if exists SP_Login;
DELIMITER $$
create PROCEDURE SP_Login(in
_usuario varchar(20),
_clave varchar(32)
)
BEGIN
	DECLARE res INT;
    select count(*) into res from G_Usuario where usuario like _usuario;
	IF res = 0 THEN
		select -1;
	ELSE
		select count(*) into res from G_Usuario where clave like _clave;
		IF res = 0 THEN
			select -2;
		ELSE
			select * from G_Usuario
			where usuario like _usuario and clave like _clave;
		END IF;
	END IF;
End$$
DELIMITER ;