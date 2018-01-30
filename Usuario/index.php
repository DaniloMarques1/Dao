<?php
	//carregando o arquivo responsavel por fazer o autoload das classes
	require_once("config.php");

	//instanciando usuarios com o construtor
	//$usuario = new Usuario("Jim gordon","jim@hotmail.com","gordon");
	//$usuario = new Usuario("Lionel Messi","messi@hotmail.com","messi");
	//sem a necessidade do construtor
	$usuario = new Usuario();
	
	//usando o metodo atualizar
	//$usuario->atualizar("Bruce Wayne","brucinho@hotmail.com","selina",2);

	//usando o metodo inserir
	//$usuario->insert();
	
	//usando o metodo magico __toString para exibir o objeto na tela
	//echo $usuario;	

	//usando o metodo que lista os usuarios
	//$usuario->listarUsuarios();

	// fazendo pesquisa atraves do nome
	//$usuario->searchByNome("Seli");

	//atualizando um registro existente
	//$usuario->atualizar("Bill Gates","gates@hotmail.com","gates",4);

	//carrega um registro no banco com base no id
	//$usuario->loadById(7);
	//echo $usuario;

	//carrega um registro do banco com base no id passado
	//$usuario->loadById(3);

	//metodo que apaga um registro do banco de dados
	$usuario->deletar(3);

	//echo $usuario;
	
	//$usuario->loadById(3);
	//echo $usuario;
	//$usuario->listarUsuarios();
	//$lista = Usuario::searchByNome("Ba");

	//utilizando metodo validarLogin
	//$usuario->validarLogin("Batman","12$");
	//echo $usuario;

	// utilizando metodo de inserir no banco
	//$usuario->insert();
	//echo $usuario;
?>