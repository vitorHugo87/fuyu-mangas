<?php
    require_once __DIR__ . '/../../core/Model.php';
    require_once __DIR__ . '/../bean/MangaBean.php';
    require_once __DIR__ . '/../bean/CategoriaBean.php';
    require_once __DIR__ . '/../dao/CategoriaDAO.php';
    require_once __DIR__ . '/AutorDAO.php';
    require_once __Dir__ . '/ColecaoDAO.php';

    class MangaDAO extends Model {
        // Listar apenas os mangás ativos
        public function listarTodosAtivos() {
            $stmt = $this->db->query("SELECT * FROM manga WHERE ativo = 1");
            $mangas = [];

            $autorDAO = new AutorDAO();
            $colecaoDAO = new ColecaoDAO();
            $categoriaDAO = new CategoriaDAO();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $row['autor'] = $autorDAO->buscarPorId($row['id_autor']);
                $row['colecao'] = $colecaoDAO->buscarPorId($row['id_colecao']);
                $row['categorias'] = $categoriaDAO->buscarPorMangaId($row['id']);
                $mangas[] = new MangaBean($row);
            }

            return $mangas;
        }

        // Buscar um mangá pelo ID
        public function buscarPorId($id) {
            $stmt = $this->db->prepare("SELECT * FROM manga WHERE id = ?");
            $stmt->execute([$id]);
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!$row) return null;

            $autorDAO = new AutorDAO();
            $colecaoDAO = new ColecaoDAO();
            $categoriaDAO = new CategoriaDAO();

            $row['autor'] = $autorDAO->buscarPorId($row['id_autor']);
            $row['colecao'] = $colecaoDAO->buscarPorId($row['id_colecao']);
            $row['categorias'] = $categoriaDAO->buscarPorMangaId($row['id']);

            return new MangaBean($row);
        }

        // Adicionar um novo mangá
        public function adicionar(MangaBean $manga) {
            try {
                // Inicia a transação
                $this->db->beginTransaction();

                // Insere o mangá
                $stmt = $this->db->prepare('INSERT INTO manga
                    (titulo_eng, titulo_jap, id_autor, id_colecao, editora, paginas, descricao, 
                    preco, estoque, imagem, data_publicacao, faixa_etaria, idioma, ativo) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                $stmt->execute([$manga->getTituloEng(), $manga->getTituloJap(),
                    $manga->getAutor()->getId(),$manga->getColecao()->getId(),
                    $manga->getEditora(), $manga->getPaginas(), $manga->getDescricao(), 
                    $manga->getPreco(), $manga->getEstoque(), $manga->getImagem(), 
                    $manga->getDataPublicacao(), $manga->getFaixaEtaria(), $manga->getIdioma(),
                    $manga->getAtivo()]);

                // Pega o ID do mangá recem criado
                $mangaId = $this->db->lastInsertId();

                // Insere as categorias relacionadas
                if(!empty($manga->getCategorias())) {
                    $stmtCat = $this->db->prepare("INSERT INTO manga_categoria (id_manga, id_categoria) VALUES (?, ?)");
                    foreach($manga->getCategorias() as $categoria) {
                        $stmtCat->execute([$mangaId, $categoria->getId()]);
                    }
                }

                // Tudo certo, salva tudo!
                $this->db->commit();
                return $mangaId;

            } catch (PDOException $e) {
                // Cancela a inserção no banco de dados
                $this->db->rollBack();
                throw new Exception("Erro ao adicionar mangá: " . $e->getMessage());
            }
        }

        /*
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
        */

        // Desativar um mangá (Não podemos exclui-lo)
        public function desativar($id) {
            try {
                $stmt = $this->db->prepare("UPDATE manga SET ativo = 0 WHERE id = ?");
                return $stmt->execute([$id]);
            } catch (PDOException $e) {
                echo "Erro ao desativar mangá: " . $e->getMessage();
                return false;
            }
        }
    }