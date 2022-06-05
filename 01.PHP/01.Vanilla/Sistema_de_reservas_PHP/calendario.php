<table border="1" width="100%">
    <tr>
        <th>Dom</th>
        <th>Seg</th>
        <th>Ter</th>
        <th>Qua</th>
        <th>Qui</th>
        <th>Sex</th>
        <th>Sab</th>
    </tr>
    <!-- LINHAS -->
    <?php for ($l = 0; $l < $linhas; $l++) : ?>
        <tr>
            <!-- COLUNAS - DIAS DA SEMANA 7-->
            <?php for ($q = 0; $q < 7; $q++) : ?>
                <?php
                // INCREMENTA DIAS A DATA '$data_inicio' A CADA VEZ QUE PASSA NO LAÇO DE REPETIÇÃO
                $dataAtualLoop = date("Y/m/d", strtotime(($q + ($l * 7)) . " days", strtotime($data_inicio)));
                ?>
                <td>
                    <?php
                    
                    echo date("d/m", strtotime($dataAtualLoop)) . "<br /><br />";
                    $dataAtualLoop = strtotime($dataAtualLoop);
                    
                    foreach ($lista as $item) {
                        $dr_inicio = strtotime($item["data_inicio"]);
                        $dr_fim = strtotime($item["data_fim"]);
                        if ($dataAtualLoop >= $dr_inicio && $dataAtualLoop <= $dr_fim) {
                            echo $item["pessoa"] . "(" . $item["id_carro"] . ")<br />";
                        }
                    }

                    ?>
                </td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>