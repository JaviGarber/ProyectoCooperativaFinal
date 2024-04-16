
-- create Tabla Socio
CREATE TABLE SOCIO (
  NIF VARCHAR(9),
  Nombre VARCHAR(60) NOT NULL,
  Apellido_1 VARCHAR (60) NOT NULL,
  Apellido_2 VARCHAR (60),
  Direccion VARCHAR(60) NOT NULL,
  C_postal VARCHAR (5),
  Municipio VARCHAR (50),
  Provincia VARCHAR (40),
  Teléfono VARCHAR (9),
  Correo_electrónico VARCHAR (50) NOT NULL,
  
  CONSTRAINT SOCIO_pk PRIMARY KEY(NIF)
);

CREATE TABLE  VENTAS (
  N_Ventas integer AUTO_INCREMENT,
  Fecha_y_hora timestamp NOT NULL,

  CONSTRAINT VENTAS_pk PRIMARY KEY(N_Ventas)
);


CREATE TABLE ENTREGA (
  N_entrega int auto_increment,
  Fecha_y_hora timestamp NOT NULL,
  Cantidad int NOT NULL,
  Tipo_aceituna varchar(40) NOT NULL,
  Parcela_SIGPAC int NOT NULL,
  Recinto_SIGPAC int NOT NULL,
  CONSTRAINT ENTREGA_pk PRIMARY KEY(N_entrega)
);



CREATE TABLE SOCIO_VENTAS (
  NIF VARCHAR(9) NOT NULL,
  N_Ventas int NOT NULL,
  
  CONSTRAINT SOCIO_VENTAS_NIF_fk 
    FOREIGN KEY(NIF) 
    REFERENCES SOCIO (NIF),
  
  CONSTRAINT SOCIO_VENTAS_N_Ventas_fk
    FOREIGN KEY(N_Ventas)
    REFERENCES VENTAS(N_Ventas)
);

-- insert
INSERT INTO SOCIO VALUE('487694F', 'Pepe', 'García', 'Perez', 'C/ Almenas', '23004', 'Jaén', 'Jaén', '*********', '***********@gmail.com');
INSERT INTO VENTAS VALUE(null, '2024-04-02 12:00');
INSERT INTO SOCIO_VENTAS VALUE('487694F', '1');
INSERT INTO SOCIO_VENTAS VALUE('487694F', '1');

-- fetch 
SELECT * FROM SOCIO;
SELECT * FROM VENTAS;
SELECT * FROM SOCIO_VENTAS;
