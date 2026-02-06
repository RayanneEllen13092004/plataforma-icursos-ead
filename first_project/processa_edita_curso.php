<?php
include 'db.php';

$id_curso = (int) $_POST['id_curso'];
$nome_curso = mysqli_real_escape_string($conexao, $_POST['nome_curso']);
$carga_horaria = (int) $_POST['carga_horaria'];

$query = "
UPDATE cursos 
SET nome_cursos = '$nome_curso', carga_horaria = $carga_horaria
WHERE id_curso = $id_curso
";

mysqli_query($conexao, $query);

header('Location: index.php?pagina=cursos&sucesso=curso_editado');
