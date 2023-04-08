CREATE DATABASE controle;

USE controle;

CREATE TABLE usuario (
  idusuario int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  senha varchar(32) NOT NULL,
  email varchar(100) NOT NULL,
  ativo tinyint(4) NOT NULL,
  imagem varchar(255) DEFAULT NULL,
  admin tinyint(4) NOT NULL DEFAULT 0
);
