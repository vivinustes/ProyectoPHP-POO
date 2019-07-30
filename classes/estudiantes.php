<?php
class Estudiantes
{
    // table name definition and database connection
    public $db_conn;
    public $table_name = "estudiantes";
    // object properties
    public $id;
    public $nombres;
    public $apellidos;
    public $email;
    public $telefono;
    public $direccion;
    public $fecha;
    public $pregrado_id;
    public function __construct($db)
    {
        $this->db_conn = $db;
    }
    function create()
    {
        //write query
        $sql = "INSERT INTO " . $this->table_name . " SET nombres = ?, apellidos = ?, email = ?, telefono = ?, direccion = ?, fecha = ?, pregrado_id = ?";
        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(1, $this->nombres);
        $prep_state->bindParam(2, $this->apellidos);
        $prep_state->bindParam(3, $this->email);
        $prep_state->bindParam(4, $this->telefono);
        $prep_state->bindParam(5, $this->direccion);
        $prep_state->bindParam(6, $this->fecha);
        $prep_state->bindParam(7, $this->pregrado_id);
        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // for pagination
    public function countStudents()
    {
        $sql = "SELECT id FROM " . $this->table_name . "";
        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();
        $num = $prep_state->rowCount(); //Returns the number of rows affected by the last SQL statement
        return $num;
    }
    function getStudents($from_record_num, $records_per_page)
    {
        $sql = "SELECT id, nombres, apellidos, email, telefono, direccion, fecha, pregrado_id FROM " . $this->table_name . " ORDER BY nombres ASC LIMIT ?, ?";
        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT); //Represents the SQL INTEGER data type.
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);
        $prep_state->execute();
        return $prep_state;
        $db_conn = NULL;
    }
    // for edit user form when filling up
    function getStudent()
    {
        $sql = "SELECT nombres, apellidos, email, telefono, direccion, fecha, pregrado_id FROM " . $this->table_name . " WHERE id = :id";
        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $this->id);
        $prep_state->execute();
        $row = $prep_state->fetch(PDO::FETCH_ASSOC);
        $this->firstname = $row['nombres'];
        $this->apellidos = $row['apellidos'];
        $this->email = $row['email'];
        $this->telefono = $row['telefono'];
        $this->direccion = $row['direccion'];
        $this->fecha = $row['fecha'];
        $this->pregrado_id = $row['pregrado_id'];
    }
}