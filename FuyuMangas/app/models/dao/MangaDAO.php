<?php
    require_once __DIR__ . '/../../core/Model.php';
    require_once __DIR__ . '/../bean/MangaBean.php';
    require_once __DIR__ . '/../bean/CategoriaBean.php';
    require_once __DIR__ . '/../dao/CategoriaDAO.php';
    require_once __DIR__ . '/AutorDAO.php';
    require_once __Dir__ . '/ColecaoDAO.php';

    class MangaDAO extends Model {
        // Listar todos os mangás
        public function listarTodos() {
            $stmt = $this->db->query("SELECT * FROM mangas");
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // Listar apenas os mangás ativos
        public function listarTodosAtivos() {
            $stmt = $this->db->query("SELECT * FROM mangas WHERE ativo = 1");
            $mangas = [];

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $manga = new MangaBean();
                $manga->setId($row['id']);
                $manga->setTituloJap($row['titulo_jap']);
                $manga->setTituloEng($row['titulo_eng']);
                $manga->setEditora($row['editora']);
                $manga->setPaginas($row['paginas']);
                $manga->setDescricao($row['descricao']);
                $manga->setPreco($row['preco']);
                $manga->setEstoque($row['estoque']);
                $manga->setImagem($row['imagem']);
                $manga->setDataPublicacao($row['data_publicacao']);
                $manga->setFaixaEtaria($row['faixa_etaria']);
                $manga->setIdioma($row['idioma']);
                $manga->setAtivo($row['ativo']);
                
                // Autor
                $autorDAO = new AutorDAO();
                $autor = $autorDAO->buscarPorId($row['id_autor']);
                $manga->setAutor($autor);

                // Coleção
                $colecaoDAO = new ColecaoDAO();
                $colecao = $colecaoDAO->buscarPorId($row['id_colecao']);
                $manga->setColecao($colecao);

                // Categorias
                $categoriaDAO = new CategoriaDAO();
                $categorias = $categoriaDAO->buscarPorMangaId($manga->getId());
                $manga->setCategorias($categorias);

                $mangas[] = $manga;
            }

            return $mangas;
        }

        // Buscar um mangá pelo ID
        public function buscarPorId($id) {
            $stmt = $this->db->prepare("SELECT * FROM mangas WHERE id = ?");
            $stmt->execute([$id]);
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!$row) return null;

            $manga = new MangaBean();
            $manga->setId($row['id']);
            $manga->setTituloJap($row['titulo_jap']);
            $manga->setTituloEng($row['titulo_eng']);
            $manga->setEditora($row['editora']);
            $manga->setPaginas($row['paginas']);
            $manga->setDescricao($row['descricao']);
            $manga->setPreco($row['preco']);
            $manga->setEstoque($row['estoque']);
            $manga->setImagem($row['imagem']);
            $manga->setDataPublicacao($row['data_publicacao']);
            $manga->setFaixaEtaria($row['faixa_etaria']);
            $manga->setIdioma($row['idioma']);
            $manga->setAtivo($row['ativo']);
            
            // Autor
            $autorDAO = new AutorDAO();
            $autor = $autorDAO->buscarPorId($row['id_autor']);
            $manga->setAutor($autor);

            // Coleção
            $colecaoDAO = new ColecaoDAO();
            $colecao = $colecaoDAO->buscarPorId($row['id_colecao']);
            $manga->setColecao($colecao);

            // Categorias
            $categoriaDAO = new CategoriaDAO();
            $categorias = $categoriaDAO->buscarPorMangaId($manga->getId());
            $manga->setCategorias($categorias);

            return $manga;
        }

        // Adicionar um novo mangá
        public function adicionar(MangaBean $manga) {
            try {
                // Inicia a transação
                $this->db->beginTransaction();

                // Insere o mangá
                $stmt = $this->db->prepare("INSERT INTO mangas (titulo, autor, editora, paginas, descricao, preco, estoque, imagem, data_publicacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$manga->getTitulo(), $manga->getAutor(), $manga->getEditora(), $manga->getPaginas(), $manga->getDescricao(), $manga->getPreco(), $manga->getEstoque(), $manga->getImagem(), $manga->getDataPublicacao()]);

                // Pega o ID do mangá recem criado
                $mangaId = $this->db->lastInsertId();

                // Insere as categorias relacionadas
                if(!empty($manga->getCategorias())) {
                    $stmtCat = $this->db->prepare("INSERT INTO mangas_categorias (id_manga, id_categoria) VALUES (?, ?)");
                    foreach($manga->getCategorias() as $categoria) {
                        $stmtCat->execute([$mangaId, $categoria->getId()]);
                    }
                }

                // Tudo certo, salva tudo!
                $this->db->commit();
                return true;

            } catch (PDOException $e) {
                // Cancela a inserção no banco de dados
                $this->db->rollBack();
                echo "Erro ao adicionar mangá: " . $e->getMessage();
                return false;
            }
        }

        public function atualizar(MangaBean $manga) {
            try {
                // Inicia a transação
                $this->db->beginTransaction();

                // Atualiza os dados principais do mangá
                $stmt = $this->db->prepare("UPDATE mangas SET titulo = ?, autor = ?, editora = ?, paginas = ?, descricao = ?, preco = ?, estoque = ?, imagem = ?, ativo = ? WHERE id = ?");
                $stmt->execute([$manga->getTitulo(), $manga->getAutor(), $manga->getEditora(), $manga->getPaginas(), $manga->getDescricao(), $manga->getPreco(), $manga->getEstoque(), $manga->getImagem(), $manga->getAtivo(), $manga->getId()]);

                // Remove categorias antigas
                $this->db->prepare("DELETE FROM mangas_categorias WHERE id_manga = ?")->execute([$manga->getId()]);

                // Adiciona novas categorias, se houver
                if(!empty($manga->getCategorias())) {
                    $stmtCat = $this->db->prepare("INSERT INTO mangas_categorias (id_manga, id_categoria) VALUES (?, ?)");
                    foreach($manga->getCategorias() as $categoria) {
                        $stmtCat->execute([$manga->getId(), $categoria->getId()]);
                    }
                }

                // Tudo certo, salva tudo!
                $this->db->commit();
                return true;

            } catch (PDOException $e) {
                // Cancela a inserção no banco de dados
                $this->db->rollBack();
                echo "Erro ao atualizar mangá: " . $e->getMessage();
                return false;
            }
        }

        // Desativar um mangá (Não podemos exclui-lo)
        public function desativar($id) {
            try {
                $stmt = $this->db->prepare("UPDATE mangas SET ativo = 0 WHERE id = ?");
                return $stmt->execute([$id]);
            } catch (PDOException $e) {
                echo "Erro ao desativar mangá: " . $e->getMessage();
                return false;
            }
        }
    }