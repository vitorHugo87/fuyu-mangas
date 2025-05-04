<?php
class ColecaoBean {
    private ?int $id;
    private string $nome;
    private string $descricao;
    private string $data_lancamento;
    private ?string $data_encerramento;
    private string $status;
    private string $slug;

    public function __construct(array $dados = []) {
        $this->id = $dados['id'] ?? null;
        $this->nome = $dados['nome'] ?? '';
        $this->descricao = $dados['descricao'] ?? '';
        $this->data_lancamento = $dados['data_lancamento'] ?? '';
        $this->data_encerramento = $dados['data_encerramento'] ?? null;
        $this->status = $dados['status'] ?? '';
        $this->slug = $dados['slug'] ?? '';
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

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }

    public function getData_lancamento(): string {
        return $this->data_lancamento;
    }

    public function setData_lancamento($data_lancamento): void {
        $this->data_lancamento = $data_lancamento;
    }

    public function getData_encerramento(): ?string {
        return $this->data_encerramento;
    }

    public function setData_encerramento($data_encerramento): void {
        $this->data_encerramento = $data_encerramento;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus($status): void {
        $this->status = $status;
    }

    public function getSlug(): string {
        return $this->slug;
    }

    public function setSlug($slug): void {
        $this->slug = $slug;
    }
}