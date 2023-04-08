SET lc_time_names=pt_BR;

INSERT INTO ADMINISTRADOR(NOME, EMAIL, SENHA) VALUES
('Gustavo Teixeira', 'adm@adm.com', 'adm');

INSERT INTO CARDAPIO(DATA, DIASEMANA, CARDAPIO, OBSERVACAO) VALUES
('2022-09-30', 'Sexta-Feira', 'Arroz, feijao, batata e salada', 'Opçoes veganas disponiveis!');

INSERT INTO CURSO(CURSO) VALUES
('AGROECOLOGIA'),
('ELETROTECNICA'),
('INFORMATICA'),
('MECANICA'),
('MEIO AMBIENTE');

INSERT INTO ALUNO(NOME, EMAIL, SENHA, APELIDO, CURSO_IDCURSO) VALUES
('Gustavo', 'gugu@hotmail.com', '12345678', 'Gugu', 1);
