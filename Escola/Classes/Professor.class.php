<?php
	
	class Professor extends Pessoa 
	{
		private $especialidade;

		public function __construct(string $nome = "", string $telefone = "",string $sexo = "",string $nascimento = "",string $especialidade = "")
		{

			parent::__construct($nome,$telefone,$sexo,$nascimento);

			$this->especialidade = $especialidade;

		}

		public function setEspecialidade(string $especialidade): void 
		{
			$this->especialidade = $especialidade;
		}

		public function getEspecialidade(): string 
		{
			return $this->especialidade;
		}

	}

?>