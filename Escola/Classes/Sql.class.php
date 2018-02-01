<?php
	
	class Sql extends PDO
	{
		private $con;

		public function __construct()
		{
			//conexão com banco de dados
			$this->con = new PDO("mysql:host=localhost;dbname=Escola","root","");
		}
			
		public function setParams($stmt,$parametros = array())
		{

			foreach($parametros as $key => $value )
			{
				$this->setParam($stmt,$key,$value);
			}

		}

		public function setParam($stmt,$key,$value)
		{
			$stmt->bindParam($key,$value);
		}

		public function query($rowQuery,$parametros = array())
		{
			$stmt = $this->con->prepare($rowQuery,$parametros);
			$this->setParams($stmt,$parametros);
			$stmt->execute();

			return $stmt;

		}

		public function select($rowQuery,$parametros = array())
		{
			$result = $this->query($rowQuery,$parametros);
			$dados = $result->fetchAll(PDO::FETCH_ASSOC);
			return $dados;
		}

	}	

?>