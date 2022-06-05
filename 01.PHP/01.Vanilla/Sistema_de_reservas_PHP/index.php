<?php

// CONEXÃO COM O BANCO DE DADOS
include "config.php";

// INCLUINDO CLASSES
include "classes/reservas.class.php";

//
$reservas = new Reservas($pdo);

?>

<h1>Reservas</h1>

<a href="reservar.php">Adicionar Reserva</a>
<hr />

<!-- SELECT PARA FILTRO O CALENDÁRIO -->
<form method="GET">
    <select name="ano">
        <?php for ($q = date("Y"); $q >= 2000; $q--) : ?>
            <option value="<?php echo $q; ?>"><?php echo $q; ?></option>
        <?php endfor; ?>
    </select>
    <select name="mes">
        <?php for ($q = 1; $q <= 12; $q++) : ?>
            <option value="<?php echo $q; ?>"><?php echo $q; ?></option>
        <?php endfor; ?>
    </select>
    <input type="submit" value="Mostrar">
</form>

<?php

if (empty($_GET["ano"])) {
    exit;
}

$data = $_GET["ano"] . "-" . $_GET["mes"];

$dia1 = date("w", strtotime($data . "-01"));

$dias = date("t", strtotime($data));

$linhas = ceil(($dia1 + $dias) / 7);

$dia1 = -$dia1;
$data_inicio = date("Y-m-d", strtotime($dia1 . " days", strtotime($data)));

$data_fim = date("Y-m-d", strtotime((($dia1 + ($linhas * 7) - 1)) . " days", strtotime($data)));

$lista = $reservas->getReservas($data_inicio, $data_fim);

?>

<hr />
<?php
include "calendario.php";
?>