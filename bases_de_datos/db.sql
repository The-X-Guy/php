create database vehiculos;
use vehiculos;

create table color (
    codcolor int(6) primary key,
    tipocolor char(10)
);

create table marcas (
    codmarca int(6) primary key,
    nommarca char(15)
);

create table piezas (
    codpie int(6) primary key,
    nombrepie char(15) not null,
    unidades int(6)
);

create table taller (
    codtall int(6) primary key,
    nombretall char(15) not null,
    direcctal char(20)
);

create table vehiculo (
    codvehi int(6) primary key,
    nomveh char(15) not null,
    codmarca int(6) references marcas,
    codcolor int(6) references color,
    unidades int(7),
    precio int(7)
);

create table clientes (
    codcli int(7) primary key,
    nombre char(15) not null,
    apellidos char(25) not null,
    direccion char(20),
    cp int(5)
);

create table aprendiz (
    codapre int(7) primary key,
    nombre char(15) not null,
    apellidos char(25) not null,
    direccion char(20),
    cp int(5)
);

create table alquiler (
    numalq int(7) primary key,
    codvehi int(7) references coches,
    codcli int(7) references clientes,
    fecha date,
    cantidad int(7)
);

create table lineapiezas (
    codlinepie int(6) primary key,
    codtall int(6) references taller on delete cascade on update cascade,
    codpie int(6) references pieza on delete cascade on update cascade,
    cantpedido int(7),
    fecha date
);