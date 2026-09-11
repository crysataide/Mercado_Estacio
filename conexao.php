<?php
// Carregar variáveis de ambiente locais caso o arquivo exista
$envFiles = [
    __DIR__ . '/.env.development.local',
    __DIR__ . '/.env.local',
    __DIR__ . '/.env',
];

foreach ($envFiles as $envFile) {
    if (file_exists($envFile)) {
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || strpos($line, '#') === 0) continue;
            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value);
                $value = trim($value, "\"'"); // Remove aspas extras
                if (!getenv($name)) {
                    putenv("{$name}={$value}");
                    $_ENV[$name] = $value;
                    $_SERVER[$name] = $value;
                }
            }
        }
        break; // Carrega o primeiro arquivo de ambiente disponível
    }
}

// Suporte a connection string (POSTGRES_URL / DATABASE_URL) ou variáveis individuais
$databaseUrl = getenv('POSTGRES_URL') ?: getenv('DATABASE_URL');

if ($databaseUrl) {
    $components = parse_url($databaseUrl);
    $host     = $components['host'] ?? 'localhost';
    $port     = $components['port'] ?? 5432;
    $user     = $components['user'] ?? 'default';
    $password = $components['pass'] ?? '';
    $dbname   = isset($components['path']) ? ltrim($components['path'], '/') : 'verceldb';
} else {
    $host     = getenv('POSTGRES_HOST')     ?: getenv('PGHOST')     ?: 'localhost';
    $port     = getenv('POSTGRES_PORT')     ?: getenv('PGPORT')     ?: '5432';
    $dbname   = getenv('POSTGRES_DATABASE') ?: getenv('PGDATABASE') ?: 'verceldb';
    $user     = getenv('POSTGRES_USER')     ?: getenv('PGUSER')     ?: 'default';
    $password = getenv('POSTGRES_PASSWORD') ?: getenv('PGPASSWORD') ?: '';
}

$sslmode = 'require';

try {
    $dsn = "pgsql:host={$host};port={$port};dbname={$dbname};sslmode={$sslmode}";
    $conexao = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => true,
        PDO::ATTR_TIMEOUT            => 10,
    ]);

    // Configuração de Fuso Horário
    date_default_timezone_set("America/Manaus");

    // Definição de URLs base dinâmicas
    $host_ip  = $_SERVER['HTTP_HOST'] ?? 'localhost:8000';
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
    $url       = $protocol . $host_ip . "/";
    $url_admin = $url . "admin/home.php";

} catch (PDOException $e) {
    die("Falha na conexão com o banco de dados: " . $e->getMessage());
}