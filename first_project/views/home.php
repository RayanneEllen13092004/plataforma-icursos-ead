<link rel="stylesheet" href="css/style.css">

<?php
// Grid de cartões
$res_alunos = mysqli_query($conexao, "SELECT COUNT(*) as total FROM alunos");
$total_alunos = mysqli_fetch_assoc($res_alunos)['total'];

$res_cursos = mysqli_query($conexao, "SELECT COUNT(*) as total FROM cursos");
$total_cursos = mysqli_fetch_assoc($res_cursos)['total'];

$res_matriculas = mysqli_query($conexao, "SELECT COUNT(*) as total FROM alunos_cursos");
$total_matriculas = mysqli_fetch_assoc($res_matriculas)['total'];
?>

<?php
// Gráficos
$query_grafico = "SELECT cursos.nome_cursos, COUNT(alunos_cursos.id_aluno) as total 
                  FROM cursos 
                  LEFT JOIN alunos_cursos ON cursos.id_curso = alunos_cursos.id_curso 
                  GROUP BY cursos.id_curso";

$exec_grafico = mysqli_query($conexao, $query_grafico);

$nomes_cursos = [];
$quantidades = [];

while($dados = mysqli_fetch_assoc($exec_grafico)) {
    $nomes_cursos[] = $dados['nome_cursos'];
    $quantidades[] = $dados['total'];
}
?>

<?php
$query_recente = "SELECT alunos.nome_aluno, cursos.nome_cursos 
                  FROM alunos_cursos
                  JOIN alunos ON alunos_cursos.id_aluno = alunos.id_aluno
                  JOIN cursos ON alunos_cursos.id_curso = cursos.id_curso
                  ORDER BY alunos_cursos.id_aluno_curso DESC LIMIT 5";
$exec_recente = mysqli_query($conexao, $query_recente);
?>

<?php
// Saudações de acordo com o horário
date_default_timezone_set('America/Sao_Paulo');
$hora = date('H');

if ($hora >= 5 && $hora < 12) {
    $saudacao = "Bom dia";
    $subtitulo = "Que tal começar o dia organizando as novas matrículas?";
} elseif ($hora >= 12 && $hora < 18) {
    $saudacao = "Boa tarde";
    $subtitulo = "Produtividade em alta! Veja como estão as estatísticas hoje:";
} else {
    $saudacao = "Boa noite";
    $subtitulo = "Finalizando o expediente? Confira o balanço final do dia:";
}
?>



<div class="home-container">
    <div class="welcome-section">
        <h2><?php echo $saudacao; ?>, <span class="user-name"><?php echo $_SESSION['login']; ?></span>! <i class="fa-regular fa-hand-peace"></i></h2>
        <p class="welcome-subtitle"><?php echo $subtitulo; ?></p>
        <div class="welcome-divider"></div>

        <div class="dashboard-grid">
        <div class="card card-green">
            <div class="card-icon"><i class="fa-solid fa-graduation-cap"></i></div>
            <div class="card-content">
                <h3>Total de Alunos</h3>
                <span class="card-number"><?php echo $total_alunos; ?></span>
            </div>
        </div>

        <div class="card card-blue">
            <div class="card-icon"><i class="fa-solid fa-book"></i></div>
            <div class="card-content">
                <h3>Cursos Disponíveis</h3>
                <span class="card-number"><?php echo $total_cursos; ?></span>
            </div>
        </div>

        <div class="card card-teal">
            <div class="card-icon"><i class="fa-solid fa-file-signature"></i></div>
            <div class="card-content">
                <h3>Matrículas Realizadas</h3>
                <span class="card-number"><?php echo $total_matriculas; ?></span>
            </div>
        </div>
    </div>
    </div>

    <div class="dashboard-main">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>     

        <div class="chart-container">
            <h3>Popularidade dos Cursos</h3>
            <canvas id="graficoCursos"></canvas>
        </div>
        
        <div class="dashboard-sidebar">
            <div class="sidebar-cards-grid">
                <div class="card card-green">
                <i class="fa-solid fa-user-plus"></i>
                <div><h3>Novos Alunos</h3><span>+2</span></div>
            </div>
                <div class="card card-blue">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <div><h3>Alunos Ativos</h3><span>85%</span></div>
                </div>
                <div class="card card-teal">
                    <i class="fa-solid fa-bolt"></i>
                    <div><h3>Matrículas/Hoje</h3><span>4</span></div>
                </div>
                <div class="card card-purple">
                    <i class="fa-solid fa-chart-line"></i>
                    <div><h3>Média</h3><span>1.5</span></div>
                </div>
            </div>

            <div class="activity-section">
                <h3><i class="fa-solid fa-clock-rotate-left"></i> Matrículas Recentes</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <strong>Yara Silva</strong>
                            <span>matriculou-se em <small>Ruby</small></span>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <strong>Xavier Lima</strong>
                            <span>matriculou-se em <small>PHP & MySQL</small></span>
                        </div>
                    </div>
                </div>
            </div>

        </div> 
    </div> 
</div>


<script>
const ctx = document.getElementById('graficoCursos').getContext('2d');
const meuGrafico = new Chart(ctx, {
    type: 'doughnut', //'pie', 'doughnut', 'bar'
    data: {
        labels: <?php echo json_encode($nomes_cursos); ?>,
        datasets: [{
            label: 'Alunos por Curso',
            data: <?php echo json_encode($quantidades); ?>,
            backgroundColor: [
                '#2ecc71', '#3498db', '#9b59b6', '#f1c40f', '#e67e22', '#1abc9c'
            ],
            borderWidth: 1
        }]
    },
    options: {
        cutout: '70%',
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>

