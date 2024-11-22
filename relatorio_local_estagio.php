<?php
        include_once 'Database.php';
        include_once 'LocalDepartamento.php';
        include_once 'Professor.php';
        include_once 'Local.php';
        ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilinho.css">
    <title>Relatório de Local de Estágio</title>
</head>
<body>
<a href="index.php">Voltar para o menu</a>
    <h1>Relatório de Local de Estágio</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Local</th>
            <th>Departamento</th>
            <th>Especialidade</th>
            <th>Limite de Vagas</th>
            <th>Horário Disponível</th>
            <th>Fase</th>
            <th>Supervisor Responsável</th>
        </tr>
        <?php

        $database = new Database();
        $db = $database->getConnection();

        $local_estagio = new LocalDepartamento($db);
        $stmt = $local_estagio->read();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Obtenha o nome do professor responsável
            $professor_id = $row['professor_id'];
            $professor = new Professor($db);
            $stmt_professor = $professor->readById($professor_id);
            //$professor_nome = $stmt_professor['nome'];

             // Obtenha o nome LOCAL
             $local_id = $row['local'];
             $local = new Local($db);
             $stmt_local = $local->readById($local_id);
             $local_nome = $stmt_local['nome'];


            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['local'] . "</td>";
            echo "<td>" . $row['departamento'] . "</td>";
            echo "<td>" . $row['especialidade'] . "</td>";
            echo "<td>" . $row['limite_vagas'] . "</td>";
            echo "<td>" . $row['horario_disponivel'] . "</td>";
            echo "<td>" . $row['fase_estagio'] . "</td>";
            echo "<td>" . $row['professor_id'] . "</td>";
            //echo "<td>" . $professor_nome . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
  
</body>
</html>
