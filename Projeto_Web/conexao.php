<?php //session_start();

	$servidor = "localhost";
	$usuario  = "Crystian";
	$senha 	  = "123";
	$db_name  = "mercado_estacio";
	$port	  = "3306";

	$conexao = mysqli_connect($servidor, $usuario, $senha, $db_name, $port) or die('Banco de dados indisponível.');

	date_default_timezone_set("America/Manaus");

	$host_ip = $_SERVER['HTTP_HOST'];

    $url = "http://".$host_ip."/Projeto_Web";
	$url_admin = "http://".$host_ip."/Projeto_Web/admin/home.php";
?>