<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Básica</title>
</head>

<body>
    <form method="GET" action="calc.php">
        <input type="number" name="n1" />
        <select name="op">
            <option value="-">-</option>
            <option value="+">+</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="number" name="n2" />
        <input type="submit" value="Calcular" />
    </form>
</body>

</html>