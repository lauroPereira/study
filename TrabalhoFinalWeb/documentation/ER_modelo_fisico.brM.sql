-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.

CREATE TABLE PRODUTO (
id_produto int PRIMARY KEY AUTO_INCREMENT NOT NULL,
ds_produto varchar(200) NOT NULL,
preco double NOT NULL,
id_tipo int NOT NULL,
link_image varchar(100) not null,
fl_destaque char(1) not null
);

CREATE TABLE USUARIO (
id_usuario int PRIMARY KEY AUTO_INCREMENT NOT NULL,
senha varchar(250) NOT NULL,
nome_completo varchar(250) NOT NULL,
login varchar(100) NOT NULL,
id_perfil int NOT NULL
);

CREATE TABLE TIPO (
id_tipo int PRIMARY KEY AUTO_INCREMENT NOT NULL,
ds_tipo varchar(100) NOT NULL
);

CREATE TABLE PERFIL (
id_perfil int PRIMARY KEY AUTO_INCREMENT NOT NULL,
ds_perfil varchar(100) NOT NULL
);

CREATE TABLE VENDA (
id_venda int PRIMARY KEY AUTO_INCREMENT NOT NULL,
dt_conclusao_venda datetime NULL,
id_usuario int NOT NULL,
FOREIGN KEY(id_usuario) REFERENCES USUARIO (id_usuario)
);

CREATE TABLE VENDA_ITEM (
id_venda_item int PRIMARY KEY AUTO_INCREMENT NOT NULL,
preco_corrente double NOT NULL,
dt_inclusao_item datetime NOT NULL,
id_produto int NOT NULL,
id_venda int NOT NULL,
FOREIGN KEY(id_produto) REFERENCES PRODUTO (id_produto)
);

ALTER TABLE PRODUTO ADD FOREIGN KEY(id_tipo) REFERENCES TIPO (id_tipo);
ALTER TABLE USUARIO ADD FOREIGN KEY(id_perfil) REFERENCES PERFIL (id_perfil);