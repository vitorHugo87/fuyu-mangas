<?php
require_once ABS_APP_PATH . '/core/Controller.php';
require_once ABS_APP_PATH . '/models/dao/ColecaoDAO.php';

class ColecaoController extends Controller {
    private ColecaoDAO $colecaoDAO;

    public function __construct() {
        $this->colecaoDAO = new ColecaoDAO();
    }

    public function cadastrar(): void {
        $this->render('colecao/cadastrar', ['css' => [PUBLIC_URL . '/css/colecao/cadastrar.css'],
            'js' => [PUBLIC_URL . '/js/colecao/cadastrar.js']
        ]);
    }

    public function salvar(): void {
        var_dump($_POST);
        
        $dados['nome'] = trim($_POST['nome'] ?? '');
        $dados['status'] = $_POST['status'] ?? '';
        $dados['data_lancamento'] = $_POST['data_lancamento'] ?? '';
        $dados['data_encerramento'] = $_POST['data_encerramento'] ?? null;
        $dados['descricao'] = $_POST['descricao'] ?? '';

        // Gera o slug
        // Remove acentos
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $_POST['nome'] ?? '');
        // Converte para minúsculas
        $slug = strtolower($slug);
        // Remove caracteres especiais
        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
        // Substitui espaços por hífens
        $slug = preg_replace('/[\s-]+/', '-', $slug);
        // Remove hífens no começo/fim
        $slug = trim($slug, '-');
        // Salva nos dados
        $dados['slug'] = $slug;

        // Cria um objeto ColecaoBean
        $colecao = new ColecaoBean($dados);

        // Passa o objeto para o models/dao/colecaoDAO.php
        $this->colecaoDAO->adicionar($colecao);

        die('Coleção Cadastrada com sucesso!');
        // Redireciona para a tela inicial
        //$this->render("layouts/main", []);
    }
}