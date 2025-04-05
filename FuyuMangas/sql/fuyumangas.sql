-- 1. Criação do banco
CREATE DATABASE IF NOT EXISTS fuyumangas DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE fuyumangas;

-- 2. Tabela: usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('cliente', 'admin') NOT NULL DEFAULT 'cliente',
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- 3. Tabela: mangas
CREATE TABLE mangas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255),
    editora VARCHAR(100),
    paginas INT,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    estoque INT DEFAULT 0,
    imagem VARCHAR(255),
    data_publicacao DATE
);

-- 4. Tabela: categorias
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT
);

-- 5. Relacionamento: mangas_categorias (N:N)
CREATE TABLE mangas_categorias (
    id_manga INT,
    id_categoria INT,
    PRIMARY KEY (id_manga, id_categoria),
    FOREIGN KEY (id_manga) REFERENCES mangas(id),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id)
);

-- 6. Tabela: carrinho
CREATE TABLE carrinho (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_manga INT,
    quantidade INT DEFAULT 1,
    data_adicionado DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_manga) REFERENCES mangas(id)
);

-- 7. Tabela: pedidos
CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    data_pedido DATETIME DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(50) DEFAULT 'Pendente',
    total DECIMAL(10,2),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

-- 8. Itens do pedido
CREATE TABLE pedidos_itens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT,
    id_manga INT,
    quantidade INT,
    preco_unitario DECIMAL(10,2),
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id),
    FOREIGN KEY (id_manga) REFERENCES mangas(id)
);

-- 9. Tabela: avaliacoes
CREATE TABLE avaliacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_manga INT,
    nota INT CHECK (nota >= 1 AND nota <= 5),
    comentario TEXT,
    data_avaliacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_manga) REFERENCES mangas(id)
);