<?php //session_start();

	//: Conexão com XAMPP
	// $servidor = "localhost";
	// $usuario  = "Crystian";
	// $senha 	  = "123";
	// $db_name  = "mercado_estacio";
	// $port	  = "3306";

	// $conexao = mysqli_connect($servidor, $usuario, $senha, $db_name, $port) or die('Banco de dados indisponível.');

	//: Obter informações de conexão do Heroku ClearDB
	// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	// $cleardb_server = $cleardb_url["host"];
	// $cleardb_username = $cleardb_url["user"];
	// $cleardb_password = $cleardb_url["pass"];
	// $cleardb_db = substr($cleardb_url["path"],1);
	// $active_group = 'default';
	// $query_builder = TRUE;
	//: Conecta ao Banco
	// $conexao = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db) or die('Banco de dados indisponível.');

	//: Conexão de banco com a Vercel e PostgreSQL
	$url = getenv('POSTGRES_URL');

	// Extrair informações da URL de conexão
	$components = parse_url($url);

	$host = $components['host'];
	$port = $components['port'] ?? 5432; // 5432 é a porta padrão do PostgreSQL
	$user = $components['user'];
	$password = $components['pass'];
	$dbname = ltrim($components['path'], '/');
	$sslmode = 'require';

	// Criar a string de conexão DSN
	$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=$sslmode";

	try {
		// Criar uma instância PDO
		$conexao = new PDO($dsn, $user, $password, [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		]);
		date_default_timezone_set("America/Manaus");
	
		$host_ip = $_SERVER['HTTP_HOST'];
	
		$url = "http://".$host_ip."/";
		$url_admin = "http://".$host_ip."/admin/home.php";

		echo "Conexão com o banco de dados PostgreSQL realizada com sucesso!";
	} catch (PDOException $e) {
		echo 'Falha na conexão: ' . $e->getMessage();
	}
?>