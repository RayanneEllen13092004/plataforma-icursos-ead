<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit();
}

$tempo_limite = 600; 

if (isset($_SESSION['ultimo_acesso'])) {
    $tempo_inatividade = time() - $_SESSION['ultimo_acesso'];
    
    if ($tempo_inatividade > $tempo_limite) {
        session_destroy();
        header("Location: login.php?erro=sessao_expirada");
        exit();
    }
}

$_SESSION['ultimo_acesso'] = time();

include 'db.php';
include 'header.php';

$pagina = $_GET['pagina'] ?? 'home';

switch ($pagina) {
    case 'perfil':
        include 'views/perfil.php';
        break;

    case 'cadastrar_usuario':
        include 'views/cadastrar_usuario.php';
        break;    

    case 'cursos':
        include 'views/cursos.php';
        break;

    case 'alunos':
        include 'views/alunos.php';
        break;

    case 'inserir_aluno':
        include 'views/inserir_aluno.php';
        break;
    
    case 'edita_aluno':
        include 'views/edita_aluno.php';
        break;    

    case 'inserir_matricula':
        include 'views/inserir_matricula.php';
        break;    

    case 'inserir_curso':
        include 'views/inserir_curso.php';
        break;

     case 'edita_curso':
        include 'views/edita_curso.php';
        break;    

    case 'matriculas':
        include 'views/matriculas.php';
        break;

    default:
        include 'views/home.php';
        break;
}

include 'footer.php';
