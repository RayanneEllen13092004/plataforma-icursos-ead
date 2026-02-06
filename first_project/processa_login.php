<?php
include 'db.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$senha_criptografada = md5($senha);

$stmt = mysqli_prepare($conexao, "SELECT * FROM usuarios WHERE usuario = ?");
mysqli_stmt_bind_param($stmt, "s", $usuario);

mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($resultado) == 1){
    $dados = mysqli_fetch_assoc($resultado);
   
    if($senha_criptografada == $dados['senha']){
        session_start();
        $_SESSION['login'] = $usuario;
        
        if(isset($dados['nivel'])){
            $_SESSION['nivel'] = $dados['nivel'];
        } else {
            $_SESSION['nivel'] = 'erro_coluna_nao_encontrada';
        }

        header('location:index.php');
        exit(); 
    }
        header('location:login.php?erro');
        exit();
    
    } else {
        header('location:login.php?erro');
        exit();
    }