CREATE TABLE pokemon (
  id int AUTO_INCREMENT NOT NULL,
  nome varchar(15) NOT NULL,
  descricao varchar(1000) NOT NULL,
  link varchar(500) NOT NULL,
  tipo1 varchar varchar(2) NOT NULL,
  tipo2 varchar(2),
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

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, regiao) 
VALUES ('1', '1996', 'Pokémon Red', 'Pokémon Blue', 'Saga Kanto', 'Kanto');

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, regiao) 
VALUES ('2', '1999', 'Pokémon Gold', 'Pokémon Silver', 'Saga Johto', 'Johto');

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, regiao) 
VALUES ('3', '2002', 'Pokémon Ruby', 'Pokémon Sapphire', 'Saga Hoenn', 'Hoenn');

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, regiao) 
VALUES ('4', '2006', 'Pokémon Diamond', 'Pokémon Pearl', 'Saga Sinnoh', 'Sinnoh');

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, regiao) 
VALUES ('5', '2010', 'Pokémon Black', 'Pokémon White', 'Saga Unova', 'Unova');

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, regiao) 
VALUES ('6', '2013', 'Pokémon X', 'Pokémon Y', 'Saga Kalos', 'Kalos');

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, regiao) 
VALUES ('7', '2016', 'Pokémon Sun', 'Pokémon Moon', 'Saga Alola', 'Alola');

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, regiao) 
VALUES ('8', '2019', 'Pokémon Sword', 'Pokémon Shield', 'Pokémon Journeys', 'Galar');

INSERT INTO geracao (numero, ano, jogo, jogo2, anime, regiao) 
VALUES ('9', '2022', 'Pokémon Scarlet', 'Pokémon Violet', 'Saga Paldea', 'Paldea');