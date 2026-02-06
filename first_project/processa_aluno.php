<?php
include 'db.php';

$nome_aluno = $_POST['nome_aluno'];
$data_nasc = $_POST['data_nasc'];

$query = "INSERT INTO alunos(nome_aluno, data_nasc) VALUES ('$nome_aluno', '$data_nasc')";

mysqli_query($conexao, $query);

header('location:index.php?pagina=alunos');