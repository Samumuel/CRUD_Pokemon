CREATE TABLE pokemon (
  id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  nome varchar(15) NOT NULL,
  descricao varchar(1000) NOT NULL,
  link varchar(500) NOT NULL,
  tipo1 varchar (20) NOT NULL,
  tipo2 varchar(20),
  evolucao int(1) NOT NULL,
  geracao_id int NOT NULL
);

CREATE TABLE geracao ( 
  id int PRIMARY KEY AUTO_INCREMENT NOT NULL, 
  numero int NOT NULL,
  ano int NOT NULL,
  jogo varchar(50) NOT NULL,
  jogo2 varchar(50) NOT NULL,
  anime varchar(30) NOT NULL,
  cidade varchar(30) NOT NULL
);

CREATE TABLE habilidade(
  id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  tipo varchar(20) NOT NULL,
  vantagem varchar(20) NOT NULL,
  desvantagem varchar(20) NOT NULL
);

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, cidade) 
VALUES ('1', '1996', 'Pokémon Red', 'Pokémon Blue', 'Saga Kanto', 'Kanto');

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, cidade) 
VALUES ('2', '1999', 'Pokémon Gold', 'Pokémon Silver', 'Saga Johto', 'Johto');

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, cidade) 
VALUES ('3', '2002', 'Pokémon Ruby', 'Pokémon Sapphire', 'Saga Hoenn', 'Hoenn');

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, cidade) 
VALUES ('4', '2006', 'Pokémon Diamond', 'Pokémon Pearl', 'Saga Sinnoh', 'Sinnoh');

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, cidade) 
VALUES ('5', '2010', 'Pokémon Black', 'Pokémon White', 'Saga Unova', 'Unova');

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, cidade) 
VALUES ('6', '2013', 'Pokémon X', 'Pokémon Y', 'Saga Kalos', 'Kalos');

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, cidade) 
VALUES ('7', '2016', 'Pokémon Sun', 'Pokémon Moon', 'Saga Alola', 'Alola');

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, cidade) 
VALUES ('8', '2019', 'Pokémon Sword', 'Pokémon Shield', 'Pokémon Journeys', 'Galar');

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, cidade) 
VALUES ('9', '2022', 'Pokémon Scarlet', 'Pokémon Violet', 'Saga Paldea', 'Paldea');

INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Normal', 'Nenhum', 'Lutador');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Fogo', 'Grama', 'Água');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Água', 'Fogo', 'Elétrico');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Elétrico', 'Água', 'Terra');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Grama', 'Água', 'Fogo');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Gelo', 'Dragão', 'Fogo');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Lutador', 'Normal', 'Psíquico');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Veneno', 'Grama', 'Terra');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Terra', 'Elétrico', 'Água');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Voador', 'Grama', 'Elétrico');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Psíquico', 'Lutador', 'Inseto');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Inseto', 'Grama', 'Fogo');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Pedra', 'Fogo', 'Água');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Fantasma', 'Psíquico', 'Fantasma');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Dragão', 'Dragão', 'Gelo');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Escuridão', 'Psíquico', 'Lutador');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Metal', 'Gelo', 'Fogo');
INSERT INTO habilidade (tipo, vantagem, desvantagem) 
VALUES ('Fada', 'Dragão', 'Aço');

ALTER TABLE pokemon ADD CONSTRAINT fk_geracao FOREIGN KEY (geracao_id) REFERENCES geracao(id);

ALTER TABLE pokemon ADD habilidade_id int;

ALTER TABLE pokemon ADD CONSTRAINT fk_habilidade FOREIGN KEY (habilidade_id) REFERENCES habilidade(id);


