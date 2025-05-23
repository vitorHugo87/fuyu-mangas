<?php
require_once ABS_APP_PATH . '/core/Controller.php';
require_once ABS_APP_PATH . '/models/dao/CriadorDAO.php';

class CriadorController extends Controller {
    private CriadorDao $criadorDAO;

    public function __construct() {
        $this->criadorDAO = new CriadorDAO();
    }

    public function cadastrar(): void {
        $this->render("criador/cadastrar", ['css' => [PUBLIC_URL . '/css/criador/cadastrar.css'],
            'js' => [PUBLIC_URL . '/js/criador/cadastrar.js']
        ]);
    }

    public function salvar(): void {
        // Recebe os dados do $_POST e $_FILES, valida, e chama $this->criadorDAO->adicionar($criador);
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
            $nomeArquivo = 'criador_' . time() . '_' . bin2hex(random_bytes(5)) . '.' . $extensao;

            // Define o caminho para salvar a imagem
            $caminhoDestino = ABSPATH . '/public/img/criadores_pfps/' . $nomeArquivo;

            // Move o arquivo da pasta temporária para a pasta correta
            if (move_uploaded_file($arquivo['tmp_name'], $caminhoDestino)) {
                // Caminho que será salvo no banco de dados (relativo ao site)
                $dados['foto_perfil'] = "img/criadores_pfps/$nomeArquivo";
            } else {
                die('Ops! Tivemos um erro ao mover o arquivo de imagem..');
            }
        } else {
            die('Ops, tivemos um problema com o upload da capa..');
        }

        // Cria um objeto CriadorBean
        $criador = new CriadorBean($dados);

        // Passa o objeto para o models/dao/CriadorDAO.php
        $this->criadorDAO->adicionar($criador);

        die('Criador Cadastrado com sucesso!');
        // Redireciona para a tela inicial
        //$this->render("layouts/main", []);
    }

    public function listar(): void {
        // Busca todos os criadores
        $criadores = $this->criadorDAO->listarTodos();

        // Redireciona
        $this->render("criador/listar", ['criadores' => $criadores, 
            'css' => [PUBLIC_URL . '/css/criador/listar.css'],
            'js' => [PUBLIC_URL . '/js/criador/listar.js']]);
    }
}