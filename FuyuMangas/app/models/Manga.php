<?php
    require_once __DIR__ . '/../core/Model.php';

    class Manga extends Model {
        // Listar todos os mangás
        public function listarTodos() {
            $stmt = $this->db->query("SELECT * FROM mangas");
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // Listar apenas os mangás ativos
        public function listarTodosAtivos() {
            $stmt = $this->db->query("SELECT * FROM mangas WHERE ativo = 1");
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // Buscar um mangá pelo ID
        public function buscarPorId($id) {
            $stmt = $this->db->prepare("SELECT * FROM mangas WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        // Adicionar um novo mangá
        public function adicionar($dados) {
            try {
                // Inicia a transação
                $this->db->beginTransaction();

                // Insere o mangá
                $stmt = $this->db->prepare("INSERT INTO mangas (titulo, autor, editora, paginas, descricao, preco, estoque, imagem, data_publicacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$dados->titulo, $dados->autor, $dados->editora, $dados->paginas, $dados->descricao, $dados->preco, $dados->estoque, $dados->imagem, $dados->dataLancamento]);

                // Pega o ID do mangá recem criado
                $mangaId = $this->db->lastInsertId();

                // Insere as categorias relacionadas
                if(!empty($dados->categorias)) {
                    $stmtCat = $this->db->prepare("INSERT INTO mangas_categorias (id_manga, id_categoria) VALUES (?, ?)");
                    foreach($dados->categorias as $categoriaId) {
                        $stmtCat->execute([$mangaId, $categoriaId]);
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

        public function atualizar($id, $dados) {
            try {
                // Inicia a transação
                $this->db->beginTransaction();

                // Atualiza os dados principais do mangá
                $stmt = $this->db->prepare("UPDATE mangas SET titulo = ?, autor = ?, editora = ?, paginas = ?, descricao = ?, preco = ?, estoque = ?, imagem = ?, ativo = ? WHERE id = ?");
                $stmt->execute([$dados->titulo, $dados->autor, $dados->editora, $dados->paginas, $dados->descricao, $dados->preco, $dados->estoque, $dados->imagem, $dados->ativo, $id]);

                // Remove categorias antigas
                $this->db->prepare("DELETE FROM mangas_categorias WHERE manga_id = ?")->execute([$id]);

                // Adiciona novas categorias, se houver
                if(!empty($dados->categorias)) {
                    $stmtCat = $this->db->prepare("INSERT INTO mangas_categorias (manga_id, categoria_id) VALUES (?, ?)");
                    foreach($dados->categorias as $categoriaId) {
                        $stmtCat->execute([$id, $categoriaId]);
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