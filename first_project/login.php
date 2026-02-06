<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - iCursos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body-login">
    <div class="login-container">
        <form method="post" action="processa_login.php">
            <img src="img/logo.png" alt="Logo">
            
            <label>Usuário:</label>
            <input type="text" name="usuario" placeholder="Nome do usuário" class="form-control" required>
            
            <label>Senha:</label>
            <input type="password" name="senha" placeholder="Digite a senha" class="form-control" required>

            <input type="submit" value="Entrar" class="btn">

            <?php if(isset($_GET['erro'])){ ?>
                <div class="alert-error">
                    <?php 
                        if($_GET['erro'] == 'sessao_expirada'){
                            echo "Sua sessão expirou por inatividade. Faça login novamente.";
                        } else {
                            echo "Usuário ou senha inválidos.";
                        }
                    ?>
                </div>
            <?php } ?>
        </form>
    </div>
</body>
</html>