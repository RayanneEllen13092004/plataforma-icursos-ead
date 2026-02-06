<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$database = "rayanne";

$conexao = mysqli_connect($servidor, $usuario, $senha, $database);

/*$query = "CREATE TABLE IF NOT EXISTS cursos(
    id_curso INT NOT NULL AUTO_INCREMENT,
    nome_curso VARCHAR(255) NOT NULL,
    carga_horaria INT NOT NULL,
    PRIMARY KEY (id_curso)
)";

$execute = mysqli_query($conexao, $query);

$query = "CREATE TABLE IF NOT EXISTS alunos(
    id_aluno int not null auto_increment,
    nome_aluno varchar(255) not null,
    data_nasc varchar (255),
    primary key (id_aluno)
)";

$execute = mysqli_query($conexao, $query);
$query = "CREATE TABLE IF NOT EXISTS alunos_cursos(
    id_aluno_curso int not null auto_increment,
    id_aluno int not null,
    id_curso int not null,
    primary key (id_aluno_curso)
)";

$execute = mysqli_query($conexao, $query);
#inserindo na alunos
$query = "INSERT INTO alunos(nome_aluno, data_nasc) VALUES ('JOSE', '01-01-1999')";
$execute = mysqli_query($conexao, $query);

$query = "INSERT INTO alunos(nome_aluno, data_nasc) VALUES ('MARIA', '01-01-2000')";
$execute = mysqli_query($conexao, $query);

#inserindo na cursos
$query = "INSERT INTO cursos(nome_cursos, carga_horaria) VALUES ('PHP E MYSQL', '10')";
$execute = mysqli_query($conexao, $query);

#inserindo na alunos_cursos
$query = "INSERT INTO alunos_cursos(id_aluno, id_curso) VALUES (8, 1)";
$execute = mysqli_query($conexao, $query);

 
if (mysqli_query($conexao, "DELETE FROM alunos WHERE id_aluno = 9 or id_aluno = 10")){
    echo "Deleted successfully!";
}else {
    echo "Error upon delection!";
}

if(mysqli_query($conexao, "UPDATE ALUNOS SET NOME_ALUNO = 'Jose Miguel' WHERE id_aluno = 1")){
    echo "Success!<br>";
}

if (mysqli_query($conexao, "UPDATE ALUNOS SET NOME_ALUNO = 'Maria Gicelia' WHERE id_aluno = 3")){
    echo "Success!";
}

$consulta = mysqli_query($conexao, "SELECT * FROM alunos");

echo "<table border='1'>";
echo "<tr>
        <th>id</th>
        <th>Nome</th>
        <th>Data Nascimento</th>
      </tr>";

while ($linha = mysqli_fetch_assoc($consulta)) {
    echo "<tr>";
    echo "<td>{$linha['id_aluno']}</td>";
    echo "<td>{$linha['nome_aluno']}</td>";
    echo "<td>{$linha['data_nasc']}</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_query($conexao, "ALTER TABLE cursos CHANGE id id_curso INT NOT NULL AUTO_INCREMENT");

$consulta = mysqli_query($conexao, "SELECT ALUNOS.nome_aluno, CURSOS.nome_cursos
FROM ALUNOS, CURSOS, ALUNOS_CURSOS WHERE ALUNOS_CURSOS.id_aluno = ALUNOS.id_aluno 
AND ALUNOS_CURSOS.id_curso = CURSOS.id_curso");

echo '<table border=1><tr><th>Nome do aluno</th><th>Nome do curso</th></tr>';
while($linha = mysqli_fetch_array($consulta) ){
    echo '<tr><td>' . $linha ['nome_aluno' ]. '</td>';
    echo '<td>' . $linha ['nome_cursos' ]. '</td></tr>';
}

echo '<table>';
*/









