<?php
include 'db.php';

$id_curso = $_GET['id_curso'];

mysqli_query($conexao, "DELETE FROM cursos WHERE id_curso = $id_curso");

header("Location: index.php?pagina=cursos&sucesso=curso_excluido");