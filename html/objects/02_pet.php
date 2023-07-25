<?php

// Inheritance
class Pet extends MySQL{

    protected int $id;

    protected string $name;

    protected string $type;

    protected string $breed;

    protected string $remarks;

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

    public function create() {

        $data["name"]=$this->name;
        $data["type"]=$this->type;
        $data["breed"]=$this->breed;
        $data["remarks"]=$this->remarks;
        $this->insert("pets", $data);

    }

    public function read($id) {
        $error = $this->selectByID("pets", $id);
        if($error) {
            echo $error;
        } else {
            $this->id = $id;
        }
    }
    public function update() {
        $data["name"]=$this->name;
        $data["type"]=$this->type;
        $data["breed"]=$this->breed;
        $data["remarks"]=$this->remarks;
        $this->save("pets",$data);
    }
    public function delete() {
        $this->deleteByID("pets");
    }


}