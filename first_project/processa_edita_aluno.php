<?php
include 'db.php';

$id_aluno = (int) ($_POST['id_aluno'] ?? 0);
$nome_aluno = mysqli_real_escape_string($conexao, $_POST['nome_aluno'] ?? '');

$query = "
    UPDATE alunos 
    SET nome_aluno = '$nome_aluno'
    WHERE id_aluno = $id_aluno
";

mysqli_query($conexao, $query);

header('Location: index.php?pagina=alunos&sucesso=aluno_editado');