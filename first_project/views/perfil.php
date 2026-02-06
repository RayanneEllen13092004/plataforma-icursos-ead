<div class="container-perfil">
    <h2 class="titulo-sessao">Meu Perfil</h2>

    <div class="card-perfil">
        <form action="alterar_senha.php" method="POST">
            <label>Usuário:</label>
            <input type="text" value="<?= htmlspecialchars($_SESSION['login']); ?>" disabled class="form-control-disabled">
            
            <label>Nova Senha:</label>
            <input type="password" name="nova_senha" required placeholder="Digite a nova senha" class="form-control">
            
            <label>Confirmar Nova Senha:</label>
            <input type="password" name="confirmar_senha" required placeholder="Repita a nova senha" class="form-control">

            <div class="botoes-lado-a-lado">
                <button type="submit" class="btn">Atualizar Senha</button>
                <a href="?pagina=home" class="btn-cancelar">Cancelar</a>
            </div>
        </form>

        <?php if(isset($_GET['erro']) && $_GET['erro'] == 'senha_incompativel'): ?>
            <div class="alert-error" style="margin-top: 20px;">As senhas não coincidem!</div>
        <?php endif; ?>
    </div>
</div>