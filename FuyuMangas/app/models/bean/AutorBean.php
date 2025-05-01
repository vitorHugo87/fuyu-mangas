<?php
class AutorBean {
    private ?int $id;
    private string $nome;
    private ?string $fotoPerfil;

    public function __construct(array $dados = []) {
        $this->id = $dados['id'] ?? null;
        $this->nome = $dados['nome'] ?? '';
        $this->fotoPerfil = $dados['foto_perfil'] ?? '';
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

    public function getFotoPerfil(): ?string {
        return $this->fotoPerfil;
    }

    public function setFotoPerfil(?string $fotoPerfil): void {
        $this->fotoPerfil = $fotoPerfil;
    }
}