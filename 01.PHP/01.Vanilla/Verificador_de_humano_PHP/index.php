<?php
session_start();

$n1 = rand(0, 10);
$n2 = rand(0, 10);

$_SESSION["v"] = $n1 + $n2;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Verificador de Humanos</h2>
    <form action="verificador.php" method="post">
        <?php echo $n1; ?> + <?php echo $n2; ?> =
        <input type="number" name="n" />
        <input type="submit" value="Verificar" />
    </form>
</body>

</html>