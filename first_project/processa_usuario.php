<?php
session_start();
include 'db.php';

if(!isset($_SESSION['login'])){
    header('location:login.php');
    exit();
}

$usuario_novo = $_POST['usuario'];
$senha_nova = $_POST['senha'];
$confirmar_senha = $_POST['confirmar_senha'];

if($senha_nova !== $confirmar_senha){
    header('location:index.php?pagina=cadastrar_usuario&erro=senha_incompativel');
    exit();
}

$stmt_check = mysqli_prepare($conexao, "SELECT usuario FROM usuarios WHERE usuario = ?");
mysqli_stmt_bind_param($stmt_check, "s", $usuario_novo);
mysqli_stmt_execute($stmt_check);
mysqli_stmt_store_result($stmt_check);

if(mysqli_stmt_num_rows($stmt_check) > 0){
    header('location:index.php?pagina=cadastrar_usuario&erro=usuario_existe');
    exit();
}

$senha_md5 = md5($senha_nova);
$stmt_insert = mysqli_prepare($conexao, "INSERT INTO usuarios (usuario, senha) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt_insert, "ss", $usuario_novo, $senha_md5);

if(mysqli_stmt_execute($stmt_insert)){
    header('location:index.php?pagina=home&sucesso=usuario_cadastrado');
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}