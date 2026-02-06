<link rel="stylesheet" href="css/style.css">

<div class="form-box">
    <h1>Inserir Matrícula</h1>

    <form method="post" action="processa_matricula.php">

        <label for="id_aluno">Selecione o Aluno</label>
        <select name="id_aluno" id="id_aluno" required>
            <option value="">Selecione</option>
            <?php
            while ($linha = mysqli_fetch_array($consulta_alunos)) {
                echo '<option value="'.$linha['id_aluno'].'">'.$linha['nome_aluno'].'</option>';
            }
            ?>
        </select>

        <label for="id_curso">Selecione o Curso</label>
        <select name="id_curso" id="id_curso" required>
            <option value="">Selecione</option>
            <?php
            while ($linha = mysqli_fetch_array($consulta_cursos)) {
                echo '<option value="'.$linha['id_curso'].'">'.$linha['nome_cursos'].'</option>';
            }
            ?>
        </select>

        <button type="submit">Matricular</button>

    </form>
</div>
