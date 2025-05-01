<?php
	require_once __DIR__ . '/AutorBean.php';
	require_once __DIR__ . '/ColecaoBean.php';
    class MangaBean {
        private ?int $id;
		private string $tituloEng;
        private string $tituloJap;
        private ?AutorBean $autor;
		private ?ColecaoBean $colecao;
        private string $editora;
        private int $paginas;
        private string $descricao;
        private float $preco;
        private int $estoque;
        private string $dataPublicacao;
		private string $faixaEtaria;
		private string $idioma;
        private string $imagem;
        private bool $ativo;
        private array $categorias;

		public function __construct(array $dados = []) {
			$this->id = $dados['id'] ?? null;

			// Dados que devem vir como string
			$this->tituloEng = $dados['titulo_eng'] ?? '';
			$this->tituloJap = $dados['titulo_jap'] ?? '';
			$this->editora = $dados['editora'] ?? '';
			$this->descricao = $dados['descricao'] ?? '';
			$this->imagem = $dados['imagem'] ?? '';
			$this->dataPublicacao = $dados['data_publicacao'] ?? '';
			$this->faixaEtaria = $dados['faixa_etaria'] ?? '';
			$this->idioma = $dados['idioma'] ?? '';

			// Dados que devem vir como int / float
			$this->paginas = $dados['paginas'] ?? 0;
			$this->estoque = $dados['estoque'] ?? 0;
			$this->preco = $dados['preco'] ?? 0.0;

			// Dados que devem vir como bool
			$this->ativo = $dados['ativo'] ?? false;

			// Dados que devem vir como objetos
			$this->autor = $dados['autor'] ?? null;
			$this->colecao = $dados['colecao'] ?? null;
			$this->categorias = $dados['categorias'] ?? [];
		}

		public function getId(): ?int {
			return $this->id;
		}

		public function setId(?int $id): void {
			$this->id = $id;
		}

		public function getTituloJap(): string {
			return $this->tituloJap;
		}

		public function setTituloJap(string $tituloJap): void {
			$this->tituloJap = $tituloJap;
		}

		public function getTituloEng(): string {
			return $this->tituloEng;
		}

		public function setTituloEng(string $tituloEng): void {
			$this->tituloEng = $tituloEng;
		}

		public function getAutor(): ?AutorBean {
			return $this->autor;
		}

		public function setAutor(?AutorBean $autor): void {
			$this->autor = $autor;
		}

		public function getColecao(): ?ColecaoBean {
			return $this->colecao;
		}

		public function setColecao(?ColecaoBean $colecao): void {
			$this->colecao = $colecao;
		}

		public function getEditora(): string {
			return $this->editora;
		}

		public function setEditora(string $editora): void {
			$this->editora = $editora;
		}

		public function getPaginas(): int {
			return $this->paginas;
		}

		public function setPaginas(int $paginas): void {
			$this->paginas = $paginas;
		}

		public function getDescricao(): string {
			return $this->descricao;
		}
		
		public function setDescricao(string $descricao): void {
			$this->descricao = $descricao;
		}

		public function getPreco(): float {
			return $this->preco;
		}

		public function getPrecoFormatado(): string {
			return number_format($this->preco, 2, ',', '');
		}

		public function setPreco(float $preco): void {
			$this->preco = $preco;
		}

		public function getEstoque(): int {
			return $this->estoque;
		}

		public function getEstoqueString(): string {
			if($this->estoque == 0) return "Estoque esgotado!";
			else if($this->estoque <= 50) return "Apenas <b>$this->estoque</b> restantes!";
			else return "Estoque: <b>$this->estoque</b>";
		}

		public function setEstoque(int $estoque): void {
			$this->estoque = $estoque;
		}

		public function getDataPublicacao(): string {
			return $this->dataPublicacao;
		}

		public function getDataPublicacaoFormatada() {
			// Ex.: (2024-12-17) para (17 dez. 2024)
			$fuso = new DateTimeZone('America/Sao_Paulo');
			$date = new DateTime($this->dataPublicacao, $fuso);

			$formatter = new IntlDateFormatter(
				'pt_BR',
				IntlDateFormatter::LONG,
				IntlDateFormatter::NONE,
				'America/Sao_Paulo',
				IntlDateFormatter::GREGORIAN,
				"d MMM yyyy"
			);

			return $formatter->format($date);
		}

		public function setDataPublicacao(string $dataPublicacao): void {
			$this->dataPublicacao = $dataPublicacao;
		}

		public function getImagem(): string {
			return $this->imagem;
		}

		public function setImagem(string $imagem): void {
			$this->imagem = $imagem;
		}

		public function getFaixaEtaria(): string {
			return $this->faixaEtaria;
		}

		public function getFaixaEtariaFormatada(): string {
			return ($this->faixaEtaria == "Livre") ? $this->faixaEtaria : "+$this->faixaEtaria anos";
		}

		public function setFaixaEtaria(string $faixaEtaria): void {
			$this->faixaEtaria = $faixaEtaria;
		}

		public function getIdioma(): string {
			return $this->idioma;
		}

		public function setIdioma(string $idioma): void {
			$this->idioma = $idioma;
		}

		public function getAtivo(): bool {
			return $this->ativo;
		}

		public function setAtivo(bool $ativo): void {
			$this->ativo = $ativo;
		}

		public function getCategorias(): array {
			return $this->categorias;
		}

		public function setCategorias(array $categorias): void {
			$this->categorias = $categorias;
		}
    }