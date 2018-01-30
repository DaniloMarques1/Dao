<?php
	
	
	class Sql extends PDO
	{

		private $con;


		public function __construct()
		{
			//iniciar conexão com esse banco de dados sempre que instanciar a classe SQL
			$this->con = new PDO("mysql:host=localhost;dbname=teste","root","");
		}


		//
		public function setParams($stmt, $parametros = array())
		{
			foreach($parametros as $key => $value)
			{
				//pegando o key e o value do array associativo
				$this->setParam($stmt,$key,$value);
			}
		}

		public function setParam($stmt,$key,$value)
		{
			//passando key, value do array associativo
			$stmt->bindParam($key,$value);

		}


		public function query($rowQuery,$param = array())
		{
			//prepara a query para execução no banco
			$stmt = $this->con->prepare($rowQuery);
			//chama o metodo para passar os parametros chave/valor
			$this->setParams($stmt,$param);

			//executa a query
			$stmt->execute();
			
			//retorna o resultado
			return $stmt;

		}


		public function select($rowQuery, $params = array()): array
		{
			//executa a query
			$result = $this->query($rowQuery,$params);

			// no caso do select trata o retorno e transforma em array de arrays
			$dados = $result->fetchAll(PDO::FETCH_ASSOC);

			//retorna o array
			return $dados;

		}


	}


?>