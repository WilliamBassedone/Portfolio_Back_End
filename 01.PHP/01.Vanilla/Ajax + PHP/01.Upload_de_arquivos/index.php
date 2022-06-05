<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de arquivos</title>
</head>

<body>

    <form id="form" method="POST" enctype="multipart/form-data">
        Nome:<br />
        <input type="text" name="nome"><br /><br />

        Foto:<br />
        <input type="file" name="foto" id="foto" /><br></br />

        <input type="submit" value="Enviar" />
    </form>

    <script type="text/javascript" src="jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>