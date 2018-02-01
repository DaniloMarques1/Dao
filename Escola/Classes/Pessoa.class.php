<?php
	
	//class abstrata
	 abstract class Pessoa 
	{

		//atributos
		private $id;
		private $nome;
		private $telefone;
		private $sexo;
		private $nascimento;
		private $idade;

		//construtor
		public function __construct(string $nome,string $telefone,string $sexo, string $nascimento)
		{

			$this->nome = $nome;
			$this->telefone = $telefone;
			$this->sexo = $sexo;
			$this->nascimento =  new DateTime($nascimento);

			//chamando metodo que define a idade no construtor para o objeto ja ter uma idade
			if($this->nascimento !== "")
			{
				$this->idade();
			}
		}

		//metodos acessores
		public function setNome(string $nome): void 
		{
			$this->nome = $nome;
		}

		public function getNome(): string 
		{
			return $this->nome;
		}

		public function setTelefone(string $telefone): void 
		{
			$this->telefone = $telefone;
		}

		public function getTelefone(): string 
		{
			return $this->telefone;
		}

		public function setSexo(string $sexo): void 
		{
			$this->sexo = $sexo;
		}

		public function getSexo(): string 
		{
			return $this->sexo;
		}

		public function setNascimento(string $nascimento): void 
		{
			$this->nascimento = new DateTime($nascimento);
		}

		public function getNascimento()
		{
			return $this->nascimento;
		}

		protected function setid($id): void 
		{
			$this->id = $id;
		}

		public function getId(): int 
		{
			return $this->id;
		}

		public function idade(): void 
		{
			// definindo a idade
			$dataAtual = new DateTime("now");

			$this->idade = $this->getNascimento()->diff($dataAtual)->y;

		}

		//metodo que retorna a idade

		public function getIdade() 
		{
			//chamando metodo idade
			$this->idade();

			return $this->idade;	

		}

	}	

?>