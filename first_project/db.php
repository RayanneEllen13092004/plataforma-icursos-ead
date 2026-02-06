<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "rayanne";

$conexao = mysqli_connect($servidor, $usuario, $senha, $db);

$query = "SELECT * FROM cursos";
$consulta_cursos = mysqli_query($conexao, $query);

$query = "SELECT * FROM alunos";
$consulta_alunos = mysqli_query($conexao, $query);

$query = "SELECT 
    alunos.nome_aluno,
    cursos.nome_cursos
FROM alunos_cursos
JOIN alunos ON alunos_cursos.id_aluno = alunos.id_aluno
JOIN cursos ON alunos_cursos.id_curso = cursos.id_curso";

$query = "SELECT 
    alunos_cursos.id_aluno_curso,
    alunos.nome_aluno,
    cursos.nome_cursos
FROM alunos_cursos
JOIN alunos ON alunos_cursos.id_aluno = alunos.id_aluno
JOIN cursos ON alunos_cursos.id_curso = cursos.id_curso";

$consulta_matriculas = mysqli_query($conexao, $query);
