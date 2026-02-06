<?php
include 'db.php';

$id_aluno = $_POST['id_aluno'];
$id_curso = $_POST['id_curso'];

$query = "INSERT INTO alunos_cursos (id_aluno, id_curso) VALUES ($id_aluno, $id_curso)";

mysqli_query($conexao, $query);

header("Location: index.php?pagina=matriculas");