DROP DATABASE IF EXISTS CARDAPIO;
CREATE DATABASE IF NOT EXISTS cardapio;
USE cardapio;

CREATE TABLE administrador(
	id_admin INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    email VARCHAR(100),
    senha VARCHAR(32),
    foto VARCHAR(100)
);

CREATE TABLE curso(
    idcurso INT NOT NULL AUTO_INCREMENT,
    curso VARCHAR(45),
    CONSTRAINT pkcurso PRIMARY KEY (idcurso));
    
CREATE TABLE aluno(
	idaluno INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100),
    email VARCHAR(100),
    senha VARCHAR(32),
    foto VARCHAR(100),
    adm TINYINT DEFAULT 0,
    apelido VARCHAR(45),
    curso_idcurso INT NOT NULL,
    CONSTRAINT pkaluno PRIMARY KEY (idaluno),
    CONSTRAINT fkalunocurso FOREIGN KEY (curso_idcurso) REFERENCES curso(idcurso));
    
CREATE TABLE cardapio(
	idcardapio INT NOT NULL AUTO_INCREMENT,
    data DATE,
    diasemana VARCHAR(45),
    cardapio VARCHAR(500),
    observacao VARCHAR(255),
	totalcurtida INT,
    CONSTRAINT pkcardapio PRIMARY KEY (idcardapio));
    
CREATE TABLE curtida(
	idcurtida INT NOT NULL AUTO_INCREMENT,
    cardapio_idcardapio INT NOT NULL,
    aluno_idaluno INT NOT NULL,
    CONSTRAINT pkcurtida PRIMARY KEY (idcurtida),
    CONSTRAINT fkcurtidacardapio FOREIGN KEY (cardapio_idcardapio) REFERENCES cardapio(idcardapio),
    CONSTRAINT fkcurtidaaluno FOREIGN KEY (aluno_idaluno) REFERENCES aluno(idaluno));
    
CREATE TABLE comentario(
	idcomentario INT NOT NULL AUTO_INCREMENT,
    cardapio_idcardapio INT NOT NULL,
    aluno_idaluno INT NOT NULL,
    comentario VARCHAR(100),
    CONSTRAINT pkcomentario PRIMARY KEY (idcomentario),
    CONSTRAINT fkcomentariocardapio FOREIGN KEY (cardapio_idcardapio) REFERENCES cardapio(idcardapio),
    CONSTRAINT fkcomentarioaluno FOREIGN KEY (aluno_idaluno) REFERENCES aluno(idaluno));