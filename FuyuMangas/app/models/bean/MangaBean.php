<?php
    class MangaBean {
        private $id;
        private $titulo;
        private $autor;
        private $editora;
        private $paginas;
        private $descricao;
        private $preco;
        private $estoque;
        private $dataPublicacao;
        private $imagem;
        private $ativo;
        private $categorias;

        public function __construct(
            $id = null, 
            $titulo = '', 
            $autor = '', 
            $editora = '', 
            $paginas = 0, 
            $descricao = '', 
            $preco = 0.0, 
            $estoque = 0,
            $dataPublicacao = '',
            $imagem = '',
            $ativo = 1,
            $categorias = []
        ) {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->editora = $editora;
            $this->paginas = $paginas;
            $this->descricao = $descricao;
            $this->preco = $preco;
            $this->estoque = $estoque;
            $this->dataPublicacao = $dataPublicacao;
            $this->imagem = $imagem;
            $this->ativo = $ativo;
            $this->categorias = $categorias;
        }

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getTitulo() {
			return $this->titulo;
		}

		public function setTitulo($titulo) {
			$this->titulo = $titulo;
		}

		public function getAutor() {
			return $this->autor;
		}

		public function setAutor($autor) {
			$this->autor = $autor;
		}

		public function getEditora() {
			return $this->editora;
		}

		public function setEditora($editora) {
			$this->editora = $editora;
		}

		public function getPaginas() {
			return $this->paginas;
		}

		public function setPaginas($paginas) {
			$this->paginas = $paginas;
		}

		public function getDescricao() {
			return $this->descricao;
		}

		public function setDescricao($descricao) {
			$this->descricao = $descricao;
		}

		public function getPreco() {
			return $this->preco;
		}

		public function setPreco($preco) {
			$this->preco = $preco;
		}

		public function getEstoque() {
			return $this->estoque;
		}

		public function setEstoque($estoque) {
			$this->estoque = $estoque;
		}

		public function getDataPublicacao() {
			return $this->dataPublicacao;
		}

		public function setDataPublicacao($dataPublicacao) {
			$this->dataPublicacao = $dataPublicacao;
		}

		public function getImagem() {
			return $this->imagem;
		}

		public function setImagem($imagem) {
			$this->imagem = $imagem;
		}

		public function getAtivo() {
			return $this->ativo;
		}

		public function setAtivo($ativo) {
			$this->ativo = $ativo;
		}

		public function getCategorias() {
			return $this->categorias;
		}

		public function setCategorias($categorias) {
			$this->categorias = $categorias;
		}
    }