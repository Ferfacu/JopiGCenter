-- Eliminar la base de datos si existe y crear una nueva
DROP DATABASE IF EXISTS jopi;
CREATE DATABASE jopi;
USE jopi;

-- Crear la tabla G_Usuario
DROP TABLE IF EXISTS G_Usuario;
CREATE TABLE G_Usuario(
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nombreUsu VARCHAR(30) NOT NULL,
    apellidoUsu VARCHAR(30) NOT NULL,
    correoUsu VARCHAR(25),
    usuario VARCHAR(20) NOT NULL,
    clave VARCHAR(32) NOT NULL,
    cargo VARCHAR(20) DEFAULT 'Usuario' NOT NULL 
);

-- Crear la tabla usuarios
DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios(
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    contraseña VARCHAR(255) NOT NULL 
);

-- Crear la tabla productos
DROP TABLE IF EXISTS productos;
CREATE TABLE productos(
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    imagen VARCHAR(255)
);

-- Crear la tabla pedidos
DROP TABLE IF EXISTS pedidos;
CREATE TABLE pedidos (
    id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

-- Insertar datos de ejemplo en la tabla productos
INSERT INTO productos (descripcion, precio, imagen) VALUES
('Acetazolamida 250mg Tableta cjax100 AC farma', 80.00, 'img/productos/acetazolamida.jpg'),
('Aci-Tip 800mg-60mg/10ml Suspensión – Frasco 200 ML', 80.00, 'img/productos/acitip.jpg'),
('Amiodarona 200mg Tableta Recubierta cjax100 AC Farma', 80.00, 'img/productos/amiodarona.jpg'),
('Anaflex Mujer NF 200mg Cápsula Blanda', 80.00, 'img/productos/anaflex.jpg'),
('ANTIAF 2.5 MG CAJA X 100 TAB RECUB', 80.00, 'img/productos/antiaf.jpg'),
('Banes Forte 200Mg/5Ml Suspensión Oral', 80.00, 'img/productos/banes.jpg'),
('Bedoyecta Tri Solución Inyectable', 80.00, 'img/productos/bedoyecta.jpg'),
('Bisacodilo 5mg Tabletas Cjax100 AC Farma', 80.00, 'img/productos/bisacodilo.jpg'),
('Bismutol 87.33mg /5ml Suspensión Oral Sin Azúcar – Frasco 340 ML', 80.00, 'img/productos/bismutol.jpg'),
('Bonazol 20 Mg – Caja 30 UN', 80.00, 'img/productos/bonazol.jpg'),
('Castatina 500mg (Citicolina) Tableta – Cajax 10und', 80.00, 'img/productos/castatina.jpg'),
('Cetirizina IQ 10mg Tableta Recubierta', 80.00, 'img/productos/cetirizina.jpg');

-- Procedimiento almacenado para login
DROP PROCEDURE IF EXISTS SP_Login;
DELIMITER $$
CREATE PROCEDURE SP_Login(
    IN _usuario VARCHAR(20),
    IN _clave VARCHAR(32)
)
BEGIN
    DECLARE res INT;
    SELECT COUNT(*) INTO res FROM G_Usuario WHERE usuario LIKE _usuario;
    IF res = 0 THEN
        SELECT -1;
    ELSE
        SELECT COUNT(*) INTO res FROM G_Usuario WHERE clave LIKE _clave;
        IF res = 0 THEN
            SELECT -2;
        ELSE
            SELECT * FROM G_Usuario WHERE usuario LIKE _usuario AND clave LIKE _clave;
        END IF;
    END IF;
END$$
DELIMITER ;
