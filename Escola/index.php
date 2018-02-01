<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
</body>
</html>
<?php
	// carregando o arquivo responsavel pelo autoload
	require_once("autoload.php");

	//$aluno = new Aluno("Alana Turin","40028922","M","1930-05-28","A","3");
	//$aluno = new Aluno("Lionel Messi","95674634","M","1987-04-23","A","2");
	$aluno = new Aluno();	
	//$aluno->inserir();
	//$aluno->atualizar("Alan Turing","36267894","M","1917-06-27","B","2",4);
	//$aluno->exibirTodos();
	//$aluno->delete(5);

	//$aluno->loadById(3);
	//imprimindo o objeto na tela graças ao metodo magico toString()
	//echo $aluno;

	//$aluno->delete(5);

	$aluno->exibirTodos();
?>