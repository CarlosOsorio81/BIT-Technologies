DROP DATABASE IF EXISTS  Tiendas_Comics;
CREATE DATABASE Tiendas_Comics;
USE DATABASE Tiendas_Comics;

CREATE TABLE Sucursales(
    id_Sucursal bigint auto_increment,
    sNombre VARCHAR(40),
    sDireccion VARCHAR(100),
    iTelefono BIGINT,
    id_Usuario BIGINT,

    PRIMARY KEY (id_Sucursal)
);
/*INSERT INTO Sucursales(sNombre, sDireccion, iTelefono, id_Usuario) VALUES ('Super Metepec', 'Por mi casa a la vuelta de la esquina', '7228568966', 8);*/

CREATE TABLE Usuarios(
    id_Usuarios BIGINT auto_increment,
    sNombre VARCHAR(40),
    sEmail VARCHAR(25),
    sPassword VARCHAR(16),
    iType INT,

    PRIMARY KEY(id_Usuarios)
);

CREATE TABLE Inventario(
    id_Comic BIGINT,
    iCantidad INT,
    id_Sucursal BIGINT
);