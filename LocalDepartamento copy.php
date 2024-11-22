<?php
class LocalDepartamento {
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

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " SET local=:local, departamento=:departamento, especialidade=:especialidade, limite_vagas=:limite_vagas,
         horario_disponivel=:horario_disponivel, fase_estagio=:fase_estagio, professor_id=:professor_id";
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

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>
