<?php
include 'db.php';

$id_aluno_curso = $_GET['id_aluno_curso'];

mysqli_query(
    $conexao,
    "DELETE FROM alunos_cursos WHERE id_aluno_curso = $id_aluno_curso"
);

header('Location: index.php?pagina=matriculas');