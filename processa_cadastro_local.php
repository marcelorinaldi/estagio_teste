<?php
include_once 'Database.php';
include_once 'Local.php';

$database = new Database();
$db = $database->getConnection();

$local  = new Local($db);

$local->instituicao = $_POST['instituicao'];
$local->especialidade = $_POST['especialidade'];
$local->departamento = $_POST['departamento'];
$local->turno = $_POST['turno'];
$local->disponibilidade = $_POST['disponibilidade'];
$local->observacao = $_POST['observacao'];

if ($local->create()) {
    $msg = "Local cadastrado com sucesso!";
    header("location: cadastro_local_estagio.php?txt=" . urlencode($msg));
    exit;
} else {
    $msg = "Não foi possível cadastrar o local. Verifique os dados e tente novamente.";
    header("location: cadastro_local_estagio.php?txt=" . urlencode($msg));
    exit;
}
?>
