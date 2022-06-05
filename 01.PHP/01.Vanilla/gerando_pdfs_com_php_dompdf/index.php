<?php

// AUTOLOAD DO COMPOSER
require __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// INSTÂNCIA DE OPTIONS
$options = new Options();
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);
// INSTÂNCIA DE DOMPDF
$dompdf = new Dompdf($options);
// CARREGA O HTML PARA DENTRO DA CLASSE
// $dompdf->loadHtml('<b>Olá mundo</b><br><br><i>Olá mundo</i><br><br>WDEV - canal');
$dompdf->loadHtmlFile(__DIR__ . '/arquivo.html');
// PÁGINA
$dompdf->setPaper('A4', 'portrait');

// RENDERIZAR O ARQUIVO PDF
$dompdf->render();

// IMPRIME O CONTEÚDO DO ARQUIVO PDF NA TELA
header('Content-type: application/pdf');
echo $dompdf->output();

// DOWNLOAD
// $dompdf->stream('documento.pdf');

// SALVAR ARQUIVO NO SERVIDOR
// file_put_contents(__DIR__.'/arquivo.pdf', $dompdf->output());
// echo "Arquivo foi salvo";