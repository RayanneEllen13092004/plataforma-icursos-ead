<?php
session_start();
include 'db.php';

if(!isset($_SESSION['login'])){
    header('location:login.php');
    exit();
}

$nova_senha = $_POST['nova_senha'];
$confirmar_senha = $_POST['confirmar_senha'];
$usuario = $_SESSION['login'];

if($nova_senha === $confirmar_senha){
    $nova_senha_md5 = md5($nova_senha);

    $stmt = mysqli_prepare($conexao, "UPDATE usuarios SET senha = ? WHERE usuario = ?");

    mysqli_stmt_bind_param($stmt, "ss", $nova_senha_md5, $usuario);

    if(mysqli_stmt_execute($stmt)){
        header('location:index.php?pagina=home&sucesso=senha_alterada');
        exit();
    } else {
        header('location:index.php?pagina=perfil&erro=banco');
        exit();
    }
} else {
    header('location:index.php?pagina=perfil&erro=senha_incompativel');
    exit();
}