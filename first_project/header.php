<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>iCursos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.6/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
    <div class="container header-flex">
        <div class="logo">
            <a href= "?pagina=home"><img src="img/logo.png" title = "Logo" alt="Logo"></a>
        </div>

        <nav class="menu">
            <a href="?pagina=cursos">Cursos</a>
            <a href="?pagina=alunos">Alunos</a>
            <a href="?pagina=matriculas">Matrículas</a>

            <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 'admin'): ?>
                <a href="?pagina=cadastrar_usuario" class="btn btn-primary">Cadastrar Usuário</a>
            <?php endif; ?>
       
            <a href="?pagina=perfil" title="Meu Perfil">
                <i class="fa-solid fa-user-gear"></i>
            </a>

            <a href="logout.php" class="btn-logout">
                Sair <i class="fa-solid fa-right-from-bracket"></i>
            </a>
        </nav>
    </div>
</header>

<div id="conteudo" class="container">
