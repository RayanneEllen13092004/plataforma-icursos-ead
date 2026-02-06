<?php
include 'db.php';

$id_aluno = (int) ($_GET['id_aluno'] ?? 0);

$query = "SELECT * FROM alunos WHERE id_aluno = $id_aluno";
$result = mysqli_query($conexao, $query);
$aluno = mysqli_fetch_assoc($result);

if (!$aluno) {
    header('Location: index.php?pagina=alunos');
}
?>

<link rel="stylesheet" href="css/style.css">

<div class="form-box">
    <h1>Editar Aluno</h1>

    <form method="post" action="processa_edita_aluno.php">
        <input type="hidden" name="id_aluno" value="<?= (int)$aluno['id_aluno']; ?>">

        <label for="nome_aluno">Nome do Aluno</label>
        <input 
            type="text" 
            id="nome_aluno" 
            name="nome_aluno" 
            value="<?= htmlspecialchars($aluno['nome_aluno']); ?>" 
            required
        >

        <div class="form-actions">
            <button type="submit">Salvar Alterações</button>
            <a href="index.php?pagina=alunos" class="btn-cancel">Cancelar</a>
        </div>
    </form>
</div>
