<link rel="stylesheet" href="css/style.css">

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    
    <a href="?pagina=inserir_aluno" class="btn">+ Inserir Novo Aluno</a>

    <a href="gerar_pdf.php" target="_blank" class="btn" style="background-color: #59c3bcff; text-decoration: none; padding: 10px 20px; color: white; border-radius: 5px;">
        <i class="fas fa-file-pdf"></i> Gerar Relatório PDF
    </a>
    
</div>

<table id = "alunos" class="tabela">
    <thead>
        <tr>
            <th>Nome do Aluno</th>
            <th>Data de Nascimento</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
    </thead>

<tbody>
    <?php while ($linha = mysqli_fetch_array($consulta_alunos)) { ?>
<tr>
    <td><?= htmlspecialchars($linha['nome_aluno']); ?></td>
    <td><?= htmlspecialchars($linha['data_nasc']); ?></td>
    
    <td>
        <a href="?pagina=edita_aluno&id_aluno=<?= (int)$linha['id_aluno']; ?>" 
           class="btn-edit" 
           title="Editar Aluno">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
    </td>
<td>
    <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] === 'admin'): ?>
        <a href="deleta_aluno.php?id_aluno=<?= (int)$linha['id_aluno']; ?>" 
           class="btn-delete"
           title="Deletar Aluno" 
           onclick="return confirm('⚠ ATENÇÃO!\n\nAo excluir este aluno, as matrículas vinculadas serão removidas.\nEsta ação NÃO poderá ser desfeita.\n\nDeseja continuar?')">
            <i class="fa-solid fa-trash"></i>
        </a>
    <?php else: ?>
        <span title="Apenas administradores podem excluir" style="color: #ccc; cursor: not-allowed;">
            <i class="fa-solid fa-trash"></i>
        </span>
    <?php endif; ?>
</td>
</tr>
    <?php } ?>
</tbody>

</table>
