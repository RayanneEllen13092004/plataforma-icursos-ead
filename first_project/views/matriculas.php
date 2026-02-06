<link rel="stylesheet" href="css/style.css">

<a href="?pagina=inserir_matricula" class="btn">Criar Nova Matrícula</a>

<table id = "matriculas" class="tabela">
    <thead>
        <tr>
            <th>Nome do Aluno</th>
            <th>Nome do Curso</th>
            <th>Cancelar</th>
        </tr>
    </thead>

    <tbody>
        <?php while ($linha = mysqli_fetch_array($consulta_matriculas)) { ?>
            <tr>
                <td><?= htmlspecialchars($linha['nome_aluno']); ?></td>
                <td><?= htmlspecialchars($linha['nome_cursos']); ?></td>
                <td>
                    <a href="deleta_matricula.php?id_aluno_curso=<?= (int)$linha['id_aluno_curso']; ?>" 
                    class="btn-delete" 
                    title="Cancelar Matrícula" 
                    onclick="return confirm('Deseja realmente cancelar esta matrícula?')">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>