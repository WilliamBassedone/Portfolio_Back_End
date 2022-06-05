<?php

// CONEXÃO COM O BANCO DE DADOS
include "config.php";

// INCLUINDO CLASSES
include "classes/reservas.class.php";
include "classes/carros.class.php";

// INSTÂNCIA DAS CLASSES
$reservas = new Reservas($pdo);
$carros = new Carros($pdo);

// DADOS VINDO DO FORMULÁRIO
if (!empty($_POST["carro"])) {

    $carro = addslashes($_POST["carro"]);

    // CONVERTENDO DATAS DO FORMATO BRASILEIRO PARA FORMATO INTERNACIONAL
    $data_inicio = explode("/",  addslashes($_POST["data_inicio"]));
    $data_fim = explode("/",  addslashes($_POST["data_fim"]));
    $data_inicio = $data_inicio[2] . "-" . $data_inicio[1] . "-" . $data_inicio[0];
    $data_fim = $data_fim[2] . "-" . $data_fim[1] . "-" . $data_fim[0];

    $pessoa = addslashes($_POST["pessoa"]);

    // VERIFICANDO SE CARRO ESTÁ DISPONIVEL PARA ALUGUEL
    if ($reservas->verificarDisponibilidade($carro, $data_inicio, $data_fim)) {
        $reservas->reservar($carro, $data_inicio, $data_fim, $pessoa);
        header("Location: index.php");
    } else {
        echo "Este carro já está reservado neste período";
    }
}


?>

<h1>Adicionar Reserva</h1>

<form method="POST">
    Carro: <br />
    <select name="carro">
        <?php
        $lista = $carros->getCarros();
        foreach ($lista as $carro) :
        ?>
            <option value="<?php echo $carro["id"]; ?>"><?php echo $carro["nome"]; ?></option>
        <?php
        endforeach;
        ?>
    </select>
    <br /><br />
    Data de início: <br>
    <input type="text" name="data_inicio" />
    <br /><br />
    Data de fim: <br>
    <input type="text" name="data_fim" />
    <br /><br />
    Nome da pessoa: <br />
    <input type="text" name="pessoa" />
    <br /><br />
    <input type="submit" value="Reservar" />
</form>