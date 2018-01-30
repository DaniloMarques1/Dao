<?php
		
	class Usuario
	{
		//atributos
		private $id_usuario;
		private $nome;
		private $email;
		private $senha;


		//metodo construtor

		public function __construct(string $nome = "",string $email = "",string $senha = "")
		{
			$this->nome = $nome;
			$this->email = $email;
			$this->senha = $senha;
		}
		

		//metodos acessores
		public function setId(int $id_usuario): void 
		{
			$this->id_usuario = $id_usuario;
		}

		public function getId(): int 
		{
			return $this->id_usuario;
		}

		public function setNome(string $nome): void 
		{
			$this->nome = $nome;
		}

		public function getNome(): string 
		{
			return $this->nome;
		}

		public function setEmail(string $email): void 
		{
			$this->email = $email;
		}

		public function getEmail(): string 
		{
			return $this->email;
		}

		public function setSenha(string $senha): void 
		{
			$this->senha = $senha;
		}


		public function getSenha(): string 
		{
			return $this->senha;
		}



		//metodos

		public function loadById($id)
		{

			//conexão com o banco
			$sql =  new Sql();
			//recebo um array de arrays
			$result = $sql->select("SELECT * FROM tbusuario WHERE id = :ID",array(
				":ID"=> $id
			));
			//verfico se me retornou resultado
			if(count($result)>0)
			{	
				//como apenas um usuario pode ter o id, o primeiro do array sera também o unico e por isso envio ele para o metodo setData
				$this->setData($result[0]);
			}
			
		}

		public function setData($row = array())
		{

			//recebe um array associativo do banco de dados e os envia para os metodos acessores
			$this->setId($row["id"]);			
			$this->setNome($row["nome"]);
			$this->setEmail($row["email"]);
			$this->setSenha($row["senha"]);
		}

		public function __toString() 
		{
			//metodo magico para impressão do objeto na tela
			return json_encode(array(
				"idusuario"=>$this->getId(),
				"nome"=>$this->getNome(),
				"email"=>$this->getEmail(),
				"senha"=>$this->getSenha()
			));
		}
		public function lista($result = array())
		{	
			//após receber o array de arrays associativos
			foreach($result as $index => $arr)
			{
				echo "<br />";
				foreach($arr as $coluna => $linha)
				{
					echo "{$coluna} : {$linha} <br/>";
				}

				echo "============= <br/>";
			}

		}

		public function listarUsuarios()
		{
			//conexão
			$sql = new Sql();

			//consulta que retorna um array de arrays associativos
			$result = $sql->select("SELECT * FROM tbusuario ORDER BY nome");
			
			//tratando os arrays
			$this->lista($result);

		
		}

		public function searchByNome($nome) 
		{
			$sql = new Sql();

			$result = $sql->select("SELECT * FROM tbusuario WHERE nome LIKE :nome",array(
				":nome"=>"%{$nome}%"
			));
			//chamando o metodo lista
			$this->lista($result);

		}	

		public function validarLogin($usuario,$senha)
		{
			$sql = new Sql();
			//recebendo um array de arrays associativos caso as condições sejam verdadeiras
			$result = $sql->select("SELECT * FROM tbusuario WHERE nome = :nome AND senha = :senha", array(
				":nome"=>$usuario,
				":senha"=>$senha

			));

			if(count($result) > 0)
			{
				//caso algum retorno seja encontrado chamar o metodo setData()	
				$this->setData($result[0]);

			}
			else
			{
				throw new Exception ("Usuario e/ou senha inválidos");
			}

		}

		public function insert()
		{
			$sql = new Sql();
			//procedure que vai nao só inserir mas também retornar com base no ultimo id inserido
			$result = $sql->select("CALL sp_usuario_insert(:nome,:email,:senha)",array(
				":nome"=>$this->getNome(),
				":email"=>$this->getEmail(),
				":senha"=>$this->getSenha()
			));

			if(count($result)>0)
			{
				//chamando metodo setData()
				$this->setData($result[0]);
			}

		}

		public function atualizar($nome,$email,$senha,$id)
		{
			//recebendo os valores
			$this->setNome($nome);
			$this->setEmail($email);
			$this->setSenha($senha);
			$this->setId($id);

			$sql = new Sql();
			//atualizando os dados no banco
			$sql->query("UPDATE  tbusuario set nome = :nome, email = :email, senha = :senha WHERE id = :id",array(
				":nome"=>$this->getNome(),
				":email"=>$this->getEmail(),
				":senha"=>$this->getSenha(),
				":id"=>$this->getId()
			));
		}

		public function deletar($id)
		{
			$sql = new Sql();
			//deletando registro no banco com base no id passado
			$sql->query("DELETE FROM tbusuario WHERE id = :id",array(
				":id"=>$id
			));
		}
	}
		
?>