<link rel="stylesheet" href="css/style.css">

<div class="form-box">
    <h1>Inserir Novo Aluno</h1>

    <form method="post" action="processa_aluno.php">

        <label for="nome_aluno">Nome do Aluno</label>
        <input type="text" id="nome_aluno" name="nome_aluno" placeholder="Ex: Francisco Santos" required>

        <label for="data_nasc">Data de Nascimento</label>
        <input type="date" id="data_nasc" name="data_nasc" placeholder="Ex: " required>

        <button type="submit">Inserir Aluno</button>

    </form>
</div>
