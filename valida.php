<?php
session_start();

require_once __DIR__ . '/conexao.php';

if (!isset($conexao) || !($conexao instanceof PDO)) {
    die("A conexão com o banco de dados não foi estabelecida.");
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (!empty($username) && !empty($password)) {
    $stmt = $conexao->prepare("SELECT * FROM login WHERE username = :username AND password = :password LIMIT 1");
    $stmt->execute([
        ':username' => $username,
        ':password' => $password
    ]);

    $usuario = $stmt->fetch();

    if ($usuario) {
        $_SESSION['name']     = $usuario['name'];
        $_SESSION['username'] = $usuario['username'];
        $_SESSION['email']    = $usuario['email'] ?? '';
        $_SESSION['password'] = $usuario['password'];

        $_SESSION['url']       = $url;
        $_SESSION['url_admin'] = $url_admin;

        header("Location: " . $url_admin);
        exit;
    } else {
        echo "<script>alert('Erro ao fazer login. Usuário ou senha incorretos.'); window.location.href = 'index.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Por favor, preencha todos os campos.'); window.location.href = 'index.php';</script>";
    exit;
}