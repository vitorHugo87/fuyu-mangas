<?php
    require_once __DIR__ . '/../models/Manga.php';
    require_once __DIR__ . '/../models/Categoria.php';
    class MangaController {
        private $mangaModel;

        public function __construct() {
            $this->mangaModel = new Manga();
        }

        // Mostrar o formulário de cadastro
        public function cadastrar() {
            $categoriaModel = new Categoria(); // Se você tiver um model Categoria
            $categorias = $categoriaModel->listarTodos();

            render("manga/cadastrar", ["categorias" => $categorias]);
        }

        // Salvar os dados enviados
        public function salvar() {
             // Recebe os dados do $_POST e $_FILES, valida, e chama $this->mangaModel->adicionar()
            // Já já posso te ajudar com isso tbm se quiser!
        }

        // Listar todos os mangás
        public function listar() {
            $mangas = $this->mangaModel->listarTodos();
            render("manga/listar", ["mangas" => $mangas]);
        }
    }