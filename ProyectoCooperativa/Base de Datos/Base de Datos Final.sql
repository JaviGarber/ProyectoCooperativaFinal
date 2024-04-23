-- Silvia Ureña Aparicio 2ºBach A

-- Tablas de Socio, Entrega, Venta y Producto.

DROP DATABASE IF EXISTS Base_Cooperativa;
CREATE DATABASE Base_Cooperativa;
use Base_Cooperativa;

CREATE TABLE SOCIO (
  NIF VARCHAR(9),
  Nombre VARCHAR(60) NOT NULL,
  Apellido_1 VARCHAR (60) NOT NULL,
  Apellido_2 VARCHAR (60),
  Direccion VARCHAR(60) NOT NULL,
  C_postal VARCHAR (5),
  Municipio VARCHAR (50),
  Provincia VARCHAR (40),
  Teléfono VARCHAR (9) NOT NULL,
  Correo_electrónico VARCHAR (50) NOT NULL,

  CONSTRAINT SOCIO_pk PRIMARY KEY(NIF)

);

CREATE TABLE  VENTAS (
  N_Ventas integer AUTO_INCREMENT,
  Fecha_y_hora timestamp NOT NULL,
  NIF VARCHAR(9) NOT NULL,

  CONSTRAINT VENTAS_pk PRIMARY KEY(N_Ventas),
  CONSTRAINT VENTAS_socio_fk FOREIGN KEY (NIF)
                            REFERENCES SOCIO(NIF)
                            ON UPDATE CASCADE
                            ON DELETE CASCADE

);


CREATE TABLE ENTREGA (
  N_Entrega int auto_increment,
  Fecha_y_hora timestamp NOT NULL,
  Cantidad int NOT NULL,
  Tipo_aceituna ENUM('Árbol','Suelo') NOT NULL,
  Parcela_SIGPAC int NOT NULL,
  Recinto_SIGPAC int NOT NULL,
   NIF VARCHAR(9) NOT NULL,
  
  CONSTRAINT ENTREGA_pk PRIMARY KEY(N_Entrega),
  CONSTRAINT Entrega_Cant_ck CHECK (Cantidad>0),
  CONSTRAINT Entrega_socio_fk FOREIGN KEY (NIF)
                              REFERENCES SOCIO(NIF)
                              ON UPDATE CASCADE
                              ON DELETE CASCADE
);

CREATE TABLE  PRODUCTO (
  Código_aceite VARCHAR(5),
  Denominación VARCHAR(30) NOT NULL,
  Precio float NOT NULL,

  CONSTRAINT VENTAS_pk PRIMARY KEY(Código_aceite),
  CONSTRAINT PRODUCTO_Precio_ck CHECK (Precio>0)
);

-- Tablas intermedias de Venta y Producto.


CREATE TABLE VENTAS_PRODUCTO (
  N_Ventas int NOT NULL,
  Código_aceite VARCHAR(5) NOT NULL,
  Cantidad float NOT NULL,
  
  CONSTRAINT VENTAS_PRODUCTO_PRODUCTO_pk PRIMARY KEY(N_Ventas,Código_aceite),
  CONSTRAINT VENTAS_PRODUCTO_Cantidad_ck CHECK (Cantidad>0),

  CONSTRAINT VENTAS_PRODUCTO_N_Ventas_fk 
    FOREIGN KEY(N_Ventas) 
    REFERENCES VENTAS (N_Ventas),

  CONSTRAINT VENTAS_PRODUCTO_Código_aceite_fk
    FOREIGN KEY(Código_aceite)
    REFERENCES PRODUCTO (Código_aceite)
);


-- Datos para insertar en las diferentes tablas. 

INSERT INTO SOCIO VALUE('48769421F', 'Pepe', 'García', 'Pérez', 'C/ Almenas', '23004', 'Jaén', 'Jaén', '*********', '***********@gmail.com');
INSERT INTO VENTAS VALUE(null, '2024-04-02 12:00','48769421F');
INSERT INTO ENTREGA VALUE(null, '2024-04-02 12:00','12', 'Árbol','26','34','48769421F' );
INSERT INTO PRODUCTO VALUE('A87VE','Virgen extra','5.8');
INSERT INTO VENTAS_PRODUCTO VALUE("1", 'A87VE','4');

-- Visualizador de la Base de Datos.

SELECT * FROM SOCIO;
SELECT * FROM VENTAS;
SELECT * FROM ENTREGA;
SELECT * FROM PRODUCTO;
SELECT * FROM VENTAS_PRODUCTO;
