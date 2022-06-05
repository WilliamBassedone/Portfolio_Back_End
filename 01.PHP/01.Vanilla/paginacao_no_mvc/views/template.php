<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITE</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">
</head>

<body>
    <h1>Projeto: Paginação com MVC</h1>
    <hr>
    <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/script.js"></script>
</body>

</html>