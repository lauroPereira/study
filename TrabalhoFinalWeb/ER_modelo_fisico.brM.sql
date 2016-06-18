-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE PRODUTO (
id_produto int not null AUTO_INCREMENT,
ds_produto varchar(200) not null,
preco double not null,
id_tipo int not null,
PRIMARY KEY (id_produto)
);

CREATE TABLE USUARIO (
id_usuario int not null AUTO_INCREMENT,
senha varchar(250) not null,
nome_completo varchar(250) not null,
login varchar(100) not null,
id_perfil int not null,
PRIMARY KEY (id_usuario)
);

CREATE TABLE TIPO (
id_tipo int not null AUTO_INCREMENT,
ds_tipo varchar(100) not null,
PRIMARY KEY (id_tipo)
);

CREATE TABLE PERFIL (
id_perfil int not null AUTO_INCREMENT,
ds_perfil varchar(100) not null,
PRIMARY KEY (id_perfil)
);

CREATE TABLE VENDA (
id_venda int not null AUTO_INCREMENT,
preco_corrente double not null,
dt_venda datetime null,
id_usuario int not null,
id_produto int not null,
FOREIGN KEY(id_usuario) REFERENCES USUARIO (id_usuario),
FOREIGN KEY(id_produto) REFERENCES PRODUTO (id_produto),
PRIMARY KEY (id_venda)
);

ALTER TABLE PRODUTO ADD FOREIGN KEY(id_tipo) REFERENCES TIPO (id_tipo);
ALTER TABLE USUARIO ADD FOREIGN KEY(id_perfil) REFERENCES PERFIL (id_perfil);
