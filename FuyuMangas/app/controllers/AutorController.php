<?php
require_once ABS_APP_PATH . '/core/Controller.php';
require_once ABS_APP_PATH . '/models/dao/AutorDAO.php';

class AutorController extends Controller {
    private AutorDAO $autorDAO;

    public function __construct() {
        $this->autorDAO = new AutorDAO();
    }

    public function cadastrar(): void {
        $this->render("autor/cadastrar", ['css' => [BASE_URL . '/css/autor/cadastrar.css'],
            'js' => [BASE_URL . '/js/autor/cadastrar.js']
        ]);
    }

    public function salvar(): void {
        // Recebe os dados do $_POST e $_FILES, valida, e chama $this->autorDAO->adicionar($autor);
        $dados['nome'] = trim($_POST['nome'] ?? '');
        $dados['data_nascimento'] = $_POST['data_nascimento' ?? ''];
        $dados['biografia'] = trim($_POST['biografia'] ?? '');
        $dados['pais_origem'] = trim($_POST['pais_origem'] ?? '');
        $dados['pais_origem_flag_svg'] = trim($_POST['bandeira_svg'] ?? '');
        $dados['redes_sociais'] = $_POST['redes'] ?? [];
        
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

        // Salva a imagem
        if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $arquivo = $_FILES['imagem'];

            // Gera um nome único para evitar conflitos
            $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
            $nomeArquivo = 'autor_' . time() . '_' . bin2hex(random_bytes(5)) . '.' . $extensao;

            // Define o caminho para salvar a imagem
            $caminhoDestino = __DIR__ . '/../../public/img/autores_pfps/' . $nomeArquivo;

            // Move o arquivo da pasta temporária para a pasta correta
            if (move_uploaded_file($arquivo['tmp_name'], $caminhoDestino)) {
                // Caminho que será salvo no banco de dados (relativo ao site)
                $dados['foto_perfil'] = 'img/autores_pfps/' . $nomeArquivo;
            } else {
                die('Ops! Tivemos um erro ao mover o arquivo de imagem..');
            }
        } else {
            die('Ops, tivemos um problema com o upload da capa..');
        }

        // Cria um objeto AutorBean
        $autor = new AutorBean($dados);

        // Passa o objeto para o models/dao/AutorDAO.php
        $this->autorDAO->adicionar($autor);

        die('Autor Cadastrado com sucesso!');
        // Redireciona para a tela inicial
        //$this->render("layouts/main", []);
    }

    public function listar(): void {
        // Busca todos os autores
        $autores = $this->autorDAO->listarTodos();

        // Redireciona
        $this->render("autor/listar", ['autores' => $autores, 
            'css' => [BASE_URL . '/css/autor/listar.css'],
            'js' => [BASE_URL . '/js/autor/listar.js']]);
    }
}