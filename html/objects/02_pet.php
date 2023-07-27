<?php

// Inheritance
class Pet extends MySQL{

    // Data properties the object is expected to hold
    protected int $id;

    protected string $name;

    protected string $type;

    protected string $breed;

    protected string $remarks;

    // functions to access and update object data properties
    public function id() {
        return $this->id;
    }

    public function type() {
        return $this->type;
    }

    public function name($name = null) {
        if(isset($name)) {
            $this->name = $name;
        }
        return $this->name;
    }

    public function breed($breed = null) {
        if(isset($breed)) {
            $this->breed = $breed;
        }
        return $this->breed;
    }

    public function remarks($remarks = null) {
        if(isset($remarks)) {
            $this->remarks = $remarks;
        }
        return $this->remarks;
    }

    // Function to create the object and invokes the insert to database function
    public function create() {

        $data["name"]=$this->name;
        $data["type"]=$this->type;
        $data["breed"]=$this->breed;
        $data["remarks"]=$this->remarks;

        // accessing inherited function
        $this->insert("pets", $data);

    }

    // function that will read data from the MySQL object by id
    public function read($id) {
        // accessing inherited function
        $error = $this->selectByID("pets", $id);
        if($error) {
            echo $error;
        } else {
            $this->id = $id;
        }
    }

    // Function that will update the data to the database
    public function update() {
        $data["name"]=$this->name;
        $data["type"]=$this->type;
        $data["breed"]=$this->breed;
        $data["remarks"]=$this->remarks;

        // accessing inherited function
        $this->save("pets",$data);
    }

    // Function to delete data from the database
    public function delete() {

        // accessing inherited function
        $this->deleteByID("pets");
    }

    
    public function list($type) {
        return $this->listAll("pets",$type);
    }

}