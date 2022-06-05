<?php

if (isset($_POST["submit"])) {

    $diretorio = "arquivo/";

    if (!is_dir($diretorio)) {
        echo "Pasta $diretorio não existe";
    } else {
        $arquivo = isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : FALSE;
        // IMPORTANDO O LOGO
        $logo = imagecreatefrompng("logo.png");

        // OBTENDO A LARGURA DO LOGO
        $largura_logo = imagesx($logo);

        // OBTENDO A ALTURA DO LOGO
        $altura_logo = imagesy($logo);
        for ($controle = 0; $controle < count($arquivo["name"]); $controle++) {

            // VALIDAR EXTENSÃO DA IMAGEM
            switch ($_FILES["arquivo"]["type"][$controle]) {
                case "image/jpeg";
                case "image/pjpeg";
                    // CRIANDO A IMAGEM TEMPORÁRIA A SER MANIPULADA
                    $imagem_temporaria = imagecreatefromjpeg($_FILES["arquivo"]["tmp_name"][$controle]);
                    break;
                case "image/png";
                case "image/xpng";
                    // CRIANDO A IMAGEM TEMPORÁRIA A SER MANIPULADA
                    $imagem_temporaria = imagecreatefrompng($_FILES["arquivo"]["tmp_name"][$controle]);
                    break;
            }

            // CALCULAR POSIÇÃO X SENDO 6PX DA LATERAL DIREITA
            $x_logo = imagesx($imagem_temporaria) - $largura_logo - 6;

            // CALCULAR POSIÇÃO X SENDO 6PX DA LATERAL DIREITA
            $y_logo = imagesy($imagem_temporaria) - $altura_logo - 6;

            // JUNTA AS IMAGENS
            imagecopymerge($imagem_temporaria, $logo, $x_logo, $y_logo, 0, 0, $largura_logo, $altura_logo, 100);

            // SALVA AS IMAGENS
            imagejpeg($imagem_temporaria, "arquivo/" . $_FILES["arquivo"]["name"][$controle]);
        }
    }

    // COMPACTANDO IMAGENS

    $zip = new ZipArchive();
    $fileName = "zipFile.zip";
    $path = __DIR__;
    $fullPath = $path . DIRECTORY_SEPARATOR . $fileName;

    if ($zip->open($fullPath, ZipArchive::CREATE)) {
        foreach (scandir("arquivo") as $key => $arquivo) {
            if ($arquivo != "." && $arquivo != "..") {
                $zip->addFile(
                    $path . "/arquivo/$arquivo",
                    "name" . $key . ".jpg"
                );
            }
        }
        $zip->close();

        if (file_exists($fullPath)) {
            echo "Arquivo criado com sucesso <br>";
            echo "<a href='zipFile.zip'>Download</a>";
            exit;
        }

        echo "Erro ao criar arquivo";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="arquivo[]" multiple="multiple"><br><br>
        <input type="submit" value="Enviar" name="submit">
    </form>

</body>

</html>