<?php
class CriadorBean {
    private ?int $id;
    private ?string $nome;
    private ?string $biografia;
    private ?string $paisOrigem;
    private ?string $paisOrigemFlagSVG;
    private ?string $dataNascimento;
    private ?string $slug;
    private ?array $redesSociais;
    private ?string $fotoPerfil;
    private ?array $colecoes;

    private ?array $papeis;

    public function __construct(array $dados = []) {
        $this->id = $dados['id'] ?? null;
        $this->nome = $dados['nome'] ?? null;
        $this->biografia = $dados['biografia'] ?? null;
        $this->paisOrigem = $dados['pais_origem'] ?? null;
        $this->paisOrigemFlagSVG = $dados['pais_origem_flag_svg'] ?? null;
        $this->dataNascimento = $dados['data_nascimento'] ?? null;
        $this->slug = $dados['slug'] ?? null;
        $this->redesSociais = $dados['redes_sociais'] ?? null;
        $this->fotoPerfil = $dados['foto_perfil'] ?? null;
        $this->colecoes = $dados['colecoes'] ?? null;
        $this->papeis = $dados['papeis'] ?? null;
    }

	public function getId(): ?int {
		return $this->id;
	}

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getNome(): ?string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function getBiografia(): ?string {
        return $this->biografia;
    }

    public function setBiografia($biografia): void {
        $this->biografia = $biografia;
    }

    public function getPaisOrigem(): ?string {
        return $this->paisOrigem;
    }

    public function setPaisOrigem($paisOrigem): void {
        $this->paisOrigem = $paisOrigem;
    }

    public function getPaisOrigemFlagSVG(): ?string {
        return $this->paisOrigemFlagSVG;
    }

    public function setPaisOrigemFlagSVG($paisOrigemFlagSVG): void {
        $this->paisOrigemFlagSVG = $paisOrigemFlagSVG;
    }

    public function getDataNascimento(): ?string {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento): void {
        $this->dataNascimento = $dataNascimento;
    }

    public function getSlug(): ?string {
        return $this->slug;
    }

    public function setSlug($slug): void {
        $this->slug = $slug;
    }

    public function getRedesSociais(): ?array {
        return $this->redesSociais;
    }

    public function setRedesSociais($redesSociais): void {
        $this->redesSociais = $redesSociais;
    }

    public function getFotoPerfil(): ?string {
        return $this->fotoPerfil;
    }

    public function setFotoPerfil(string $fotoPerfil): void {
        $this->fotoPerfil = $fotoPerfil;
    }

    public function getColecoes(): ?array {
        return $this->colecoes;
    }

    public function setColecoes($colecoes): void {
        $this->colecoes = $colecoes;
    }

    public function getPapeis(): ?array {
        return $this->papeis;
    }

    public function setPapeis($papeis): void {
        $this->papeis = $papeis;
    }
}