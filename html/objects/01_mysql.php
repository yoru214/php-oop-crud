<?php

class MySQL {
    // Encapsulation
    private $mysqli;
    // 
    protected int $id;
    function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->mysqli = new mysqli('db', 'kredo_demo', 'kredo_demo', 'kredo_demo');
    }
    // Abstraction
    private function loadData($data) {

        foreach($data as $field => $value) {
            $this->$field = $value;
        }
    }

    protected function insert($table,$data) {

        $parameters = str_repeat('?,', count($data) - 1) . '?';
        $fields = implode(",", array_keys($data));
        $sql = "INSERT INTO " . $table . " (" . $fields  . ") VALUES (" . $parameters . ")";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute(array_values($data));

        $this->id = mysqli_insert_id($this->mysqli);
        $this->selectByID($table);

    }

    protected function selectByID($table, $id = null) {

        if(!isset($id)) {
            $id = $this->id;
        }

        $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result(); 
        $data = $result->fetch_all(MYSQLI_ASSOC);  

        if (count($data) == 1) {
            $this->loadData($data[0]);
            return false;
        } elseif(count($data) == 0) {
            return "Data no longer exists!";
        }
    }

    protected function save($table,$data) {
        $fields = [];
        foreach ($data as $field => $value) {
            $fields[] = $field . " = ? ";
        }

        $sql = "UPDATE " . $table . " SET " . implode(",", $fields) . " WHERE id = " . $this->id;
        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute(array_values($data));
        $this->selectByID($table);

    }

    protected function deleteByID($table) {
        $sql = "DELETE FROM " . $table . " WHERE id = " . $this->id;
        if ($this->mysqli->query($sql) === true) {
            return false;
        } else {
            return $this->mysqli->error;
        }
    }

    public function list($table, $type) {

        $sql = "SELECT * FROM " . $table ;
        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result(); 
        $data = $result->fetch_all(MYSQLI_ASSOC);  
        return $data;
    }

  
}