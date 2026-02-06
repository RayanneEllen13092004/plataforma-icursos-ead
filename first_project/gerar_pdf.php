<?php
ob_start();

session_start();
require 'db.php';
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', false);
$options->set('isFontSubsettingEnabled', false);
$options->set('isHtml5ParserEnabled', true); 
$options->set('isJavascriptEnabled', false);
$options->set('defaultFont', 'Helvetica');
$options->set('dpi', 96);

$dompdf = new Dompdf($options);

$logoPath = 'img/logo.png';
$logoBase64 = '';
if (file_exists($logoPath)) {
    $type = pathinfo($logoPath, PATHINFO_EXTENSION);
    $data = file_get_contents($logoPath);
    if ($data !== false && !empty($data)) {
        $logoBase64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
}

$sql = "SELECT id_aluno, nome_aluno FROM alunos LIMIT 200";
$result = mysqli_query($conexao, $sql);

$html = <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
    /* Body */
    body {
        font-family: Helvetica, Arial, sans-serif;
        font-size: 12px;
        color: #333;
        line-height: 1.4;
    }

    /* Header */
    .header-container {
        text-align: center;
        margin-bottom: 30px;
    }
    .logo {
        width: 200px;
        height: auto;
        margin-bottom: 15px;
    }
    h2.titulo-relatorio {
        text-align: center;
        color: #2c3e50;
        font-size: 22px;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Tabela */
    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #e0e0e0;
    }
    th {
        background-color: #2ecc71;
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
        padding: 10px 8px;
        border-bottom: 2px solid #27ae60;
    }
    td {
        padding: 8px;
        border-bottom: 1px solid #eee;
        vertical-align: middle;
    }
    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    td.col-id {
        font-weight: bold;
        color: #555;
        text-align: center;
    }
</style>
</head>
<body>
    <div class="header-container">
HTML;

if ($logoBase64) {
    $html .= "<img src='{$logoBase64}' class='logo' alt='Logo iCursos'>";
}

$html .= <<<HTML
        <h2 class="titulo-relatorio">Relatório de Alunos Matriculados</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%" style="text-align: center;">ID</th>
                <th width="95%">Nome do Aluno</th>
            </tr>
        </thead>
        <tbody>
HTML;

while ($row = mysqli_fetch_assoc($result)) {
    $nome = htmlspecialchars($row['nome_aluno'], ENT_QUOTES, 'UTF-8');
    $html .= "<tr>
                <td class='col-id'>#{$row['id_aluno']}</td>
                <td>{$nome}</td>
              </tr>";
}

$html .= <<<HTML
        </tbody>
    </table>

    <div style="position: fixed; bottom: 0; width: 100%; text-align: right; font-size: 10px; color: #777; border-top: 1px solid #eee; padding-top: 5px;">
        Gerado em: via Sistema iCursos
    </div>

</body>
</html>
HTML;

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

if (ob_get_length()) ob_clean();

header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="lista_alunos_icursos.pdf"');
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');

echo $dompdf->output();
exit;
?>