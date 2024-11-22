<?php
include_once 'Database.php';
include_once 'Fase.php';

$database = new Database();
$db = $database->getConnection();

$fase = new Fase($db);
$fases = $fase->read();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script>
        // Exibe alerta com base no parâmetro 'txt' da URL
        function exibirAlerta() {
            const urlParams = new URLSearchParams(window.location.search);
            const msg = urlParams.get('txt');
            if (msg) {
                alert(msg);
            }
        }
    </script>
</head>

<body onload="exibirAlerta()">
    <a href="index.php">Voltar para o menu</a>
    <h1>Cadastro de Aluno</h1>

    <form action="processa_cadastro_aluno.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="disponibilidade_horario">Disponibilidade de Horário:</label>
        <select id="disponibilidade_horario" name="disponibilidade_horario" required>
            <option value="Manhã">Manhã</option>
            <option value="Tarde">Tarde</option>
            <option value="Noite">Noite</option>
            <option value="Manhã e Tarde">Manhã e Tarde</option>
            <option value="Manhã e Noite">Manhã e Noite</option>
            <option value="Tarde e Noite">Tarde e Noite</option>
        </select><br><br>

        <label for="fase_estagio">Fase do Estágio:</label>
        <select id="fase_estagio" name="fase_estagio" required>
            <option value="UC4">UC4</option>
            <option value="UC7">UC7</option>
            <option value="UC10">UC10</option>
            <option value="UC17">UC17</option>
            <?php
            while ($row = $fases->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required><br><br>

        <label for="turma">Turma:</label>
        <input type="text" id="turma" name="turma" required><br><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required><br><br>

        <label for="carga_horaria">Carga Horária:</label>
        <input type="text" id="carga_horaria" name="carga_horaria" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>