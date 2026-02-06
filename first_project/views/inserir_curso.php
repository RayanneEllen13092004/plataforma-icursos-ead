<link rel="stylesheet" href="css/style.css">

<?php if(!isset($_GET['editar'])){
    ?>


<div class="form-box">
    <h1>Inserir Novo Curso</h1>

    <form method="post" action="processa_curso.php">

        <label for="nome_curso">Nome do curso</label>
        <input type="text" id="nome_curso" name="nome_curso" placeholder="Ex: Curso de PHP" required>

        <label for="carga_horaria">Carga horária</label>
        <input type="number" id="carga_horaria" name="carga_horaria" placeholder="Ex: 40" required>

        <button type="submit">Inserir Curso</button>

    </form>
</div>


<?php }else 
{ ?>
    
<div class="form-box">
    <h1>Inserir Novo Curso</h1>

    <form method="post" action="edita_curso.php">

        <label for="nome_curso">Nome do curso</label>
        <input type="text" id="nome_curso" name="nome_curso" placeholder="Ex: Curso de PHP" required>

        <label for="carga_horaria">Carga horária</label>
        <input type="number" id="carga_horaria" name="carga_horaria" placeholder="Ex: 40" required>

        <button type="submit">Inserir Curso</button>

    </form>
</div>


<?php } ?>