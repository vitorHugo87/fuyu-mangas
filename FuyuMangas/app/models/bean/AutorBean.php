<?php
class AutorBean {
    private ?int $id;
    private string $nome;
    private ?string $fotoPerfil;

    public function __construct($id = null, $nome = '', $fotoPerfil = '') {
        $this->id = $id;
        $this->nome = $nome;
        $this->fotoPerfil = $fotoPerfil;
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