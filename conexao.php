<?php //session_start();

	// $servidor = "localhost";
	// $usuario  = "Crystian";
	// $senha 	  = "123";
	// $db_name  = "mercado_estacio";
	// $port	  = "3306";

	// $conexao = mysqli_connect($servidor, $usuario, $senha, $db_name, $port) or die('Banco de dados indisponível.');

	//: Obter informações de conexão do Heroku ClearDB
	$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$cleardb_server = $cleardb_url["host"];
	$cleardb_username = $cleardb_url["user"];
	$cleardb_password = $cleardb_url["pass"];
	$cleardb_db = substr($cleardb_url["path"],1);
	$active_group = 'default';
	$query_builder = TRUE;
	//: Conecta ao Banco
	$conexao = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db) or die('Banco de dados indisponível.');
	echo "<script>alert('$conexao');</script>";
	exit;

	// date_default_timezone_set("America/Manaus");

	// $host_ip = $_SERVER['HTTP_HOST'];

    // $url = "http://".$host_ip."/Projeto_Web";
	// $url_admin = "http://".$host_ip."/Projeto_Web/admin/home.php";
?>