<?php
include_once 'Database.php';
include_once 'Professor.php';

$database = new Database();
$db = $database->getConnection();

$professor = new Professor($db);

$professor->nome = $_POST['nome'];
$professor->disponibilidade_horario = $_POST['disponibilidade_horario'];
$professor->especialidade = $_POST['especialidade'];

if ($professor->create()) {
    echo $msg = "Professor_cadastrado_com_sucesso.";   
    header("location: index.php?txt=$msg");
    exit(0);
} else {
    echo $msg = "Não_foi_possível_cadastrar_o_professor.";   
    header("location: index.php?txt=$msg");
    exit(0);
}
?>
