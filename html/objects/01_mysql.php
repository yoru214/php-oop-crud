<?php

class MySQL {
    // Mysql Connection Object
    private $mysqli;

    // Initializes the object upon instantiation
    function __construct() {
        // Connects to the database
        $this->connect();
    }

    // Function that connects to the database and initializes the mysqli property
    private function connect() {
        $this->mysqli = new mysqli('db', 'kredo_demo', 'kredo_demo', 'kredo_demo');
    }

    // Function to load data result to object properties
    private function loadData($data) {
        foreach($data as $field => $value) {
            $this->$field = $value;
        }
    }

    // Gets data from databse by ID
    protected function selectByID($table, $id = null) {
        // if no id is passed then use the loaded ID value
        if(!isset($id)) {
            $id = $this->id;
        }

        // Queries to the database
        $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result(); 
        $data = $result->fetch_all(MYSQLI_ASSOC);  

        // make sure that there is only one result
        if (count($data) == 1) {
            // loads the result to the object properties
            $this->loadData($data[0]);
            // return false meaning no error
            return false;
        } elseif(count($data) == 0) {
            // returns an message regarding the error in logic
            return "Data no longer exists!";
        }
    }

    // Function to insert data to the database
    protected function insert($table,$data) {

        $parameters = str_repeat('?,', count($data) - 1) . '?';
        $fields = implode(",", array_keys($data));
        $sql = "INSERT INTO " . $table . " (" . $fields  . ") VALUES (" . $parameters . ")";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute(array_values($data));

        $this->id = mysqli_insert_id($this->mysqli);
        $this->selectByID($table);

    }

    // Function to save/update data to the database
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

    // Function that deletes data from the database having the id as the identifier
    protected function deleteByID($table) {
        $sql = "DELETE FROM " . $table . " WHERE id = " . $this->id;
        if ($this->mysqli->query($sql) === true) {
            return false;
        } else {
            return $this->mysqli->error;
        }
    }

    // Function that lists pets by type
    public function listAll($table, $type) {

        $sql = "SELECT * FROM " . $table ." WHERE type = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute([$type]);
        $result = $stmt->get_result(); 
        $data = $result->fetch_all(MYSQLI_ASSOC);  
        return $data;
    }

  
}