<link rel="stylesheet" href="css/style.css?v=1.2">

<?php if (isset($_GET['sucesso']) && $_GET['sucesso'] === 'curso_excluido') { ?>
    <div class="toast toast-success" id="toast">
        <span>Curso excluído com sucesso!</span>
        <button onclick="fecharToast()">OK</button>
    </div>
<?php } ?>

<?php if (isset($_GET['sucesso']) && $_GET['sucesso'] === 'curso_editado') { ?>
    <div class="toast toast-success" id="toast">
        <span>Curso atualizado com sucesso!</span>
        <button onclick="fecharToast()">OK</button>
    </div>
<?php } ?>


<a href="?pagina=inserir_curso" class="btn">Inserir Novo Curso</a>

<table id = "cursos" class="tabela">
    <thead>
        <tr>
            <th>Nome do curso</th>
            <th>Carga horária</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
    </thead>

    <tbody>
        <?php while ($linha = mysqli_fetch_array($consulta_cursos)) { ?>
            <tr>
                <td><?= htmlspecialchars($linha['nome_cursos']); ?></td>
                <td><?= (int)$linha['carga_horaria']; ?>h</td>
                <td>
                    <a href="?pagina=edita_curso&id_curso=<?= (int)$linha['id_curso']; ?>" 
                    class="btn-edit" 
                    title="Editar Curso">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td> 

                <td>
                    <a href="deleta_curso.php?id_curso=<?= (int)$linha['id_curso']; ?>" 
                    class="btn-delete" 
                    title="Deletar Curso" 
                    onclick="return confirm('ATENÇÃO!\n\nAo excluir este curso, as matrículas vinculadas serão removidas.\nEsta ação não pode ser desfeita.\n\nDeseja continuar?')">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!--JavaScript-->
<script>
const toast = document.getElementById('toast');

function fecharToast() {
    toast.classList.add('hide');

    setTimeout(() => {
        toast.remove();
        history.replaceState(null, '', 'index.php?pagina=cursos');
    }, 400);
}

setTimeout(() => {
    if (toast) fecharToast();
}, 4000);
</script>
