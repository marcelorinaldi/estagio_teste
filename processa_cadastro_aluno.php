
<?php
include_once 'Database.php';
include_once 'Aluno.php';

$database = new Database();
$db = $database->getConnection();

$aluno = new Aluno($db);

$aluno->nome = $_POST['nome'];
$aluno->disponibilidade_horario = $_POST['disponibilidade_horario'];
$aluno->fase_estagio = $_POST['fase_estagio'];
$aluno->email = $_POST['email'];
$aluno->telefone = $_POST['telefone'];
$aluno->cpf = $_POST['cpf'];
$aluno->turma = $_POST['turma'];
$aluno->status = $_POST['status'];
$aluno->carga_horaria = $_POST['carga_horaria'];

if ($aluno->create()) {
    $msg = "Aluno cadastrado com sucesso!";
    header("location: cadastro_aluno.php?txt=" . urlencode($msg));
    exit;
} else {
    $msg = "Não foi possível cadastrar o aluno. Verifique os dados e tente novamente.";
    header("location: cadastro_aluno.php?txt=" . urlencode($msg));
    exit;
}
?>
