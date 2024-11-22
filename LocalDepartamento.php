<?php
// LocalDepartamento.php ajustado
class LocalDepartamento
{
    private $conn;
    private $table = 'locais_estagio';

    public $id;
    public $local;
    public $departamento;
    public $limite_vagas;
    public $especialidade;
    public $horario_disponivel;
    public $fase_estagio;
    public $professor_id;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        // Validar se professor_id foi informado
        if (empty($this->professor_id)) {
            throw new Exception("Campo 'professor_id' é obrigatório para criar um registro.");
        }

        $query = "INSERT INTO " . $this->table . " SET 
            local=:local, 
            departamento=:departamento, 
            especialidade=:especialidade, 
            limite_vagas=:limite_vagas,
            horario_disponivel=:horario_disponivel, 
            fase_estagio=:fase_estagio, 
            professor_id=:professor_id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':local', $this->local);
        $stmt->bindParam(':departamento', $this->departamento);
        $stmt->bindParam(':especialidade', $this->especialidade);
        $stmt->bindParam(':limite_vagas', $this->limite_vagas);
        $stmt->bindParam(':horario_disponivel', $this->horario_disponivel);
        $stmt->bindParam(':fase_estagio', $this->fase_estagio);
        $stmt->bindParam(':professor_id', $this->professor_id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>

<?php
// processa_cadastro_departamento_estagio.php ajustado
include_once 'Database.php';
include_once 'LocalDepartamento.php';

$database = new Database();
$db = $database->getConnection();

$local_estagio = new LocalDepartamento($db);

try {
    // Validação de entrada
    if (!isset($_POST['professor_id']) || empty($_POST['professor_id'])) {
        throw new Exception("O campo 'professor_id' é obrigatório.");
    }

    $local_estagio->local = $_POST['local'];
    $local_estagio->departamento = $_POST['departamento'];
    $local_estagio->especialidade = $_POST['especialidade'];
    $local_estagio->limite_vagas = $_POST['limite_vagas'];
    $local_estagio->horario_disponivel = $_POST['horario_disponivel'];
    $local_estagio->fase_estagio = $_POST['fase_estagio'];
    $local_estagio->professor_id = $_POST['professor_id'];

    if ($local_estagio->create()) {
        $msg = "Local de estágio cadastrado com sucesso.";
        header("location: index.php?txt=$msg");
        exit(0);
    } else {
        throw new Exception("Não foi possível cadastrar o local de estágio.");
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    header("location: index.php?txt=$msg");
    exit(0);
}
?>
