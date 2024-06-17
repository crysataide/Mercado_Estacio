<?php session_start();

    require('conexao.php');

    if (isset($_POST['username'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        // $sql_valida_login = mysqli_query($conexao,"SELECT * FROM login WHERE username='".$username."' AND password='".$password."'");

        $sql_valida_login = $conexao->prepare("SELECT * FROM login WHERE username = :username AND password = :password");
        $sql_valida_login->bindParam(':username',$username);
        $sql_valida_login->bindParam(':password',$password);
        $sql_valida_login->execute();

        $registros_login = $sql_valida_login->fetchAll();

        if (count($registros_login)>0){

            // $registros_login=mysqli_fetch_assoc($sql_valida_login);

            $_SESSION['name'] = $registros_login['name'];
            $_SESSION['username'] = $registros_login['username'];
            $_SESSION['password'] = $registros_login['password'];

            $_SESSION['url'] = $url;
            $_SESSION['url_admin'] = $url_admin;

            echo "<script> window.location.href='$url_admin';</script>";
        }
        else {
            echo "<script> alert('Erro ao fazer login. Tente novamente ou fale com o Administrador.');</script>";
            echo "<script> window.location.href='$url';</script>";
        }
    }
?>