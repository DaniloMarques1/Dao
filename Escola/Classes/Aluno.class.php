<?php
	
	class Aluno extends Pessoa 
	{
		//atributos

		private $turma;
		private $ano;


		public function __construct(string $nome = "",string $telefone = "",string $sexo = "",string $nascimento = "",string $turma = "",string $ano = "")
		{
			//passando os valores ao construtor do pai da classe Aluno
			parent::__construct($nome,$telefone,$sexo,$nascimento);
			$this->turma = $turma;
			$this->ano = $ano;
		}

		public function setTurma(string $turma): void 
		{
			$this->turma = $turma;
		}

		public function getTurma(): string 
		{
			return $this->turma;
		}

		public function setAno(string $ano): void 
		{
			$this->ano = $ano;
		}

		public function getAno(): string 
		{
			return $this->ano;
		}

		//metodo magico para print do objeto na tela
		public function __toString()
		{
			//imprimir em formato de json
			return json_encode(array(
				"Nome"=>$this->getNome(),
				"Nascimento"=>$this->getNascimento()->format("d/m/Y"),
				"Turma"=>$this->getTurma(),
				"Ano"=>$this->getAno()
			));
		}

		//metodo de inserção no banco de dados
		public function inserir(): void
		{
			$sql = new Sql();

			$sql->query("INSERT INTO aluno(nome,telefone,sexo,nascimento,turma,ano) VALUES(:nome,:telefone,:sexo,:nascimento,:turma,:ano)",array(
				":nome"=>$this->getNome(),
				":telefone"=>$this->getTelefone(),
				":sexo"=>$this->getSexo(),
				":nascimento"=>$this->getNascimento()->format("Y/m/d"),
				":turma"=>$this->getTurma(),
				":ano"=>$this->getANo()
			));

		}
		//carregar um registro pelo id
		public function loadById($id): void
		{

			$sql = new Sql();
			//pegando os registros
			$result = $sql->select("SELECT * FROM aluno");

			//verificando se teve retorno baseado no length do array
			if(count($result)>0)
			{
				//usando o metodo setData()
				$this->setData($result[0]);
			}

		}

		public function setData($row = array()): void
		{
			//carregando valores recebidos nos metodos acessores
			$this->setId($row["id"]);
			$this->setNome($row["nome"]);
			$this->setTelefone($row["telefone"]);
			$this->setSexo($row["sexo"]);
			$this->setNascimento($row["nascimento"]);
			$this->setAno($row["ano"]);
			$this->setTurma($row["turma"]);

		}


		//metodo update
		function atualizar(string $nome,string $telefone, string $sexo,string $nascimento,string $turma,string $ano,int $id ): void
		{
			$this->setNascimento($nascimento);
			$sql = new Sql();

			$sql->query("UPDATE aluno set nome = :nome,telefone = :telefone,sexo = :sexo,nascimento = :nascimento,turma = :turma , ano = :ano where id = :id",array(
				":nome"=>$nome,
				":telefone"=>$telefone,
				":sexo"=>$sexo,
				":nascimento"=>$this->getNascimento()->format("Y,m,d"),
				":turma"=>$turma,
				":ano"=>$ano,
				":id"=>$id
			));


		}

		//metodo pra deletar
		public function delete(int $id): void
		{
			//recebe um id e o deelta um registro com o mesmo id
			
			$sql = new Sql();

			$sql->query("DELETE FROM aluno where id = :id",array(
				":id"=>$id
			));
		}

		//metodo para exibir os alunos
		public function exibirTodos()
		{
			$sql = new Sql();

			//pegando os dados do banco de dados
			$dados = $sql->select("SELECT * FROM aluno order by nome");

			echo "<table class='table'>";
				echo "<tr>";

					echo "<th scope='col'>Nome</th>";
					echo "<th scope='col'>Nascimento</th>";
					echo "<th scope='col'>Ano</th>";
					echo "<th scope='col'>Turma</th>";
				echo "</tr>";
			foreach($dados as $index => $arr)
			{
				$this->setData($arr);

				echo "<tr>";

					echo "<td>".$this->getNome()."</td>";
					//exibição da data formatada
					echo "<td>".$this->getNascimento()->format("d/m/Y")."</td>";
					echo "<td>".$this->getAno()."</td>";
					echo "<td>".$this->getTurma()."</td>";
				echo "</tr>";
			}

			echo "</table>";

		}

	}

?>