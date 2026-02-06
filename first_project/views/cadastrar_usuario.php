<?php
if(!isset($_SESSION)){ 
    session_start(); 
}

if(!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'admin'){
    header("Location: home.php?erro=sem_permissao");
    exit;
}
?>

<div class="container-perfil">
    <h2 class="titulo-sessao">Cadastrar Novo Usuário</h2>

    <div class="card-perfil">
        <form action="processa_usuario.php" method="POST">
            <label>Nome de Usuário:</label>
            <input type="text" name="usuario" required placeholder="Ex: joao_silva" class="form-control">
            
            <label>Senha:</label>
            <input type="password" name="senha" required placeholder="Digite a senha" class="form-control">
            
            <label>Confirmar Senha:</label>
            <input type="password" name="confirmar_senha" required placeholder="Repita a senha" class="form-control">

            <div class="botoes-lado-a-lado">
                <button type="submit" class="btn">Cadastrar</button>
                <a href="?pagina=home" class="btn-cancelar">Cancelar</a>
            </div>
        </form>

        <?php if(isset($_GET['erro'])): ?>
            <div class="alert-error" style="margin-top: 20px;">
                <?php 
                    if($_GET['erro'] == 'senha_incompativel') echo "As senhas não coincidem!";
                    if($_GET['erro'] == 'usuario_existe') echo "Este nome de usuário já está em uso!";
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>