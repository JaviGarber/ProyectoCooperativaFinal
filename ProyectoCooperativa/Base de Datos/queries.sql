
-- create
CREATE TABLE ENTREGA (
  N_entrega int auto_increment,
  Fecha_y_hora timestamp NOT NULL, 
  Cantidad int NOT NULL,
  Tipo_aceituna varchar(40) NOT NULL,
  Parcela_SIGPAC int NOT NULL,
  Recinto_SIGPAC int NOT NULL,
  CONSTRAINT ENTREGA_pk PRIMARY KEY(N_entrega) 
);
