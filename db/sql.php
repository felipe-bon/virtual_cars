-- --- SCRIPT PARA CRIAÇÃO DAS TABELAS DO PROJETO VIRTUAL CARS ---

-- Tabela para armazenar os dados dos usuários que anunciam os veículos.
CREATE TABLE IF NOT EXISTS Anunciante (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  cpf VARCHAR(14) NOT NULL UNIQUE,
  email VARCHAR(255) NOT NULL UNIQUE,
  senhaHash VARCHAR(255) NOT NULL,
  telefone VARCHAR(20)
) ENGINE=InnoDB;

-- Tabela principal para armazenar os anúncios dos veículos.
-- Ela se relaciona com a tabela Anunciante.
CREATE TABLE IF NOT EXISTS Anuncio (
  id INT PRIMARY KEY AUTO_INCREMENT,
  marca VARCHAR(50) NOT NULL,
  modelo VARCHAR(50) NOT NULL,
  ano INT NOT NULL,
  cor VARCHAR(30),
  quilometragem INT,
  descricao TEXT,
  valor DECIMAL(10, 2) NOT NULL,
  dataHora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  estado CHAR(2) NOT NULL,
  cidade VARCHAR(100) NOT NULL,
  idAnunciante INT NOT NULL,
  FOREIGN KEY (idAnunciante) REFERENCES Anunciante(id)
) ENGINE=InnoDB;

-- Tabela para armazenar as fotos de um anúncio.
-- Relaciona-se com Anuncio. ON DELETE CASCADE garante que ao apagar um anúncio, suas fotos também sejam apagadas.
CREATE TABLE IF NOT EXISTS Foto (
  id INT PRIMARY KEY AUTO_INCREMENT,
  idAnuncio INT NOT NULL,
  nomeArqFoto VARCHAR(255) NOT NULL,
  FOREIGN KEY (idAnuncio) REFERENCES Anuncio(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabela para armazenar as mensagens de interesse dos visitantes em um anúncio.
-- Relaciona-se com Anuncio. ON DELETE CASCADE garante que ao apagar um anúncio, as mensagens de interesse também sejam apagadas.
CREATE TABLE IF NOT EXISTS Interesse (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  mensagem TEXT NOT NULL,
  dataHora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  idAnuncio INT NOT NULL,
  FOREIGN KEY (idAnuncio) REFERENCES Anuncio(id) ON DELETE CASCADE
) ENGINE=InnoDB;