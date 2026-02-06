<?php
include 'db.php';

$id_curso = (int) $_GET['id_curso'];

$query = "SELECT * FROM cursos WHERE id_curso = $id_curso";
$result = mysqli_query($conexao, $query);
$curso = mysqli_fetch_assoc($result);

if (!$curso) {
    header('Location: index.php?pagina=cursos');
    exit;
}
?>

<link rel="stylesheet" href="css/style.css">

<div class="form-box">
    <h1>Editar Curso</h1>

    <form method="post" action="processa_edita_curso.php">
        <input type="hidden" name="id_curso" value="<?= $curso['id_curso']; ?>">

        <label for="nome_curso">Nome do Curso</label>
        <input 
            type="text" 
            id="nome_curso" 
            name="nome_curso" 
            value="<?= htmlspecialchars($curso['nome_cursos']); ?>" 
            required
        >

        <label for="carga_horaria">Carga Horária</label>
        <input 
            type="number" 
            id="carga_horaria" 
            name="carga_horaria" 
            value="<?= (int)$curso['carga_horaria']; ?>" 
            required
        >

        <div class="form-actions">
            <button type="submit">Salvar Alterações</button>
            <a href="index.php?pagina=cursos" class="btn-cancel">Cancelar</a>
        </div>

    </form>
</div>
