<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Local de Estágio</title>
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
    <h1>Cadastro de Local de Estágio</h1>
    <form action="processa_cadastro_local.php" method="post">
        <label for="nome">Instituição:</label>
        <input type="text" id="instituicao" name="instituicao" required><br><br>
        <label for="nome">Especialidade:</label>
        <input type="text" id="especialidade" name="especialidade" required><br><br>
        <label for="nome">Departamento:</label>
        <input type="text" id="departamento" name="departamento" required><br><br>
        <label for="nome">Turno:</label>
        <input type="text" id="turno" name="turno" required><br><br>
        <label for="nome">Disponibilidade:</label>
        <input type="text" id="disponibilidade" name="disponibilidade" required><br><br>
        <label for="especialidade">Observação:</label>
        <textarea id="observacao" name="observacao" rows="4" cols="50"></textarea>
        <br><br>
        <input type="submit" value="Cadastrar">
    </form>

</body>

</html>