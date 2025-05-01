<?php
class ColecaoBean {
    private ?int $id;
    private string $nome;

    public function __construct(array $dados = []) {
        $this->id = $dados['id'] ?? null;
        $this->nome = $dados['nome'] ?? '';
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }
}