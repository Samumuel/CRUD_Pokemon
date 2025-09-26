CREATE TABLE pokemon (
  id int AUTO_INCREMENT NOT NULL,
  nome varchar(15) NOT NULL,
  descricao varchar(1000) NOT NULL,
  link varchar(500) NOT NULL,
  tipo1 varchar varchar(20) NOT NULL,
  tipo2 varchar(20),
  evolucao int(1) NOT NULL,
  geracao_id NOT NULL
);

ALTER TABLE pokemon ADD CONSTRAINT fk_geracao FOREIGN KEY (geracao_id) REFERENCES geracao(id);

CREATE TABLE geracao ( 
  id int AUTO_INCREMENT NOT NULL, 
  numero int NOT NULL,
  ano int NOT NULL,
  jogo varchar(50) NOT NULL,
  jogo2 varchar(50) NOT NULL,
  anime varchar(30) NOT NULL,
  cidade varchar(30) NOT NULL
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

CREATE TABLE geracao_link(
  id int AUTO_INCREMENT NOT NULL,
  numero int NOT NULL,
  jogo1_link varchar(1000) NOT NULL,
  jogo2_link varchar(1000) NOT NULL,
  anime_link varchar(1000) NOT NULL,
  geracao_id int NOT NULL
);

ALTER TABLE geracao_link ADD CONSTRAINT fk_geracao_link FOREIGN KEY (geracao_id) REFERENCES geracao(id);

INSERT INTO geracao_link (numero, jogo1_link, jogo2_link, anime_link) 
VALUES ('1', 'Pokémon Red', 'Pokémon Blue', 'Saga Kanto');

INSERT INTO geracao_link (numero, jogo1_link, jogo2_link, anime_link) 
VALUES ('2', 'Pokémon Gold', 'Pokémon Silver', 'Saga Johto');

INSERT INTO geracao_link (numero, jogo1_link, jogo2_link, anime_link) 
VALUES ('3', 'Pokémon Ruby', 'Pokémon Sapphire', 'Saga Hoenn');

INSERT INTO geracao_link (numero, jogo1_link, jogo2_link, anime_link) 
VALUES ('4', 'Pokémon Diamond', 'Pokémon Pearl', 'Saga Sinnoh');

INSERT INTO geracao_link (numero, jogo1_link, jogo2_link, anime_link) 
VALUES ('5', 'Pokémon Black', 'Pokémon White', 'Saga Unova');

INSERT INTO geracao_link (numero, jogo1_link, jogo2_link, anime_link) 
VALUES ('6', 'Pokémon X', 'Pokémon Y', 'Saga Kalos');

INSERT INTO geracao_link (numero, jogo1_link, jogo2_link, anime_link) 
VALUES ('7', 'Pokémon Sun', 'Pokémon Moon', 'Saga Alola');

INSERT INTO geracao_link (numero, jogo1_link, jogo2_link, anime_link) 
VALUES ('8', 'Pokémon Sword', 'Pokémon Shield', 'Pokémon Journeys');

INSERT INTO geracao_link (numero, jogo1_link, jogo2_link, anime_link) 
VALUES ('9', 'Pokémon Scarlet', 'Pokémon Violet', 'Saga Paldea');
