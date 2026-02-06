<?php
include 'db.php';

if(!isset($_SESSION['nivel']) || $_SESSION['nivel'] !== 'admin'){
    header("Location: index.php?pagina=alunos&erro=sem_permissao");
    exit();
}

$id_aluno = $_GET['id_aluno'];

mysqli_query($conexao, "DELETE FROM alunos_cursos WHERE id_aluno = $id_aluno");
mysqli_query($conexao, "DELETE FROM alunos WHERE id_aluno = $id_aluno");

header('Location: index.php?pagina=alunos');
