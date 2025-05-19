<?php
class AutorBean {
    private ?int $id;
    private string $nome;
    private string $biografia;
    private string $paisOrigem;
    private string $paisOrigemFlagSVG;
    private string $dataNascimento;
    private string $slug;
    private array $redesSociais;
    private string $fotoPerfil;
    private array $colecoes;

    public function __construct(array $dados = []) {
        $this->id = $dados['id'] ?? null;
        $this->nome = $dados['nome'] ?? '';
        $this->biografia = $dados['biografia'] ?? '';
        $this->paisOrigem = $dados['pais_origem'] ?? '';
        $this->paisOrigemFlagSVG = $dados['pais_origem_flag_svg'] ?? '';
        $this->dataNascimento = $dados['data_nascimento'] ?? '';
        $this->slug = $dados['slug'] ?? '';
        $this->redesSociais = $dados['redes_sociais'] ?? ['x' => '', 'site' => '', 'instagram' => ''];
        $this->fotoPerfil = $dados['foto_perfil'] ?? '';
        $this->colecoes = $dados['colecoes'] ?? [];
    }

	public function getId(): ?int {
		return $this->id;
	}

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function getBiografia() {
        return $this->biografia;
    }

    public function setBiografia($biografia) {
        $this->biografia = $biografia;
    }

    public function getPaisOrigem() {
        return $this->paisOrigem;
    }

    public function setPaisOrigem($paisOrigem) {
        $this->paisOrigem = $paisOrigem;
    }

    public function getPaisOrigemFlagSVG() {
        return $this->paisOrigemFlagSVG;
    }

    public function setPaisOrigemFlagSVG($paisOrigemFlagSVG) {
        $this->paisOrigemFlagSVG = $paisOrigemFlagSVG;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
    }

    public function getRedesSociais() {
        return $this->redesSociais;
    }

    public function setRedesSociais($redesSociais) {
        $this->redesSociais = $redesSociais;
    }

    public function getFotoPerfil(): string {
        return $this->fotoPerfil;
    }

    public function setFotoPerfil(string $fotoPerfil): void {
        $this->fotoPerfil = $fotoPerfil;
    }

    public function getColecoes(): array {
        return $this->colecoes;
    }

    public function setColecoes($colecoes): void {
        $this->colecoes = $colecoes;
    }
}