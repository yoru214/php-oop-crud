<?php
require_once 'objects/01_mysql.php';
require_once 'objects/02_pet.php';
require_once 'objects/03_cat.php';
require_once 'objects/04_dog.php';

class API {
    private $mysql;
    function __construct() {

        $this->mysql = new MySQL();
        $this->route();
    }

    function route() {
        $page = "";
        $template = "index";
        if(isset($_GET["page"])) {
            $page = $_GET["page"];
            $template = $_GET["page"];
        }
        $data = [];
        switch($page) {
            case "get":
                $data = $this->get();
                break;
            default:
                $data = $this->list();
                break;
        }  

        require_once("template/" . $template. ".php");

    }

    function list() {
        return $this->mysql->list("pets","Dog");
    }

    function get() {
        $type = $_GET["type"];
        $id = $_GET["id"];
        
        switch($type) {
            case "Dog":
                $pet = new Dog();
                $pet->read($id);
                return $pet;
                break;
            case "Cat":
                $pet = new Cat();
                $pet->read($id);
                return $pet();
                break;
        }
    }

    function add() {

    }

    function update() {

    }

    function delete() {

    }
}


new API();




// $pet = new Dog();
// $pet = new Cat();

// // Create
// $pet->name("Jazzy");
// $pet->breed("German Shepherd");
// $pet->remarks("Always sleeping");
// $pet->create();

// echo "</br> Create";
// echo "</br>";
// echo "ID: " . $pet->id();
// echo "</br>";
// echo "Name: " . $pet->name();
// echo "</br>";
// echo "Type: " . $pet->type();
// echo "</br>";
// echo "Breed: " . $pet->breed();
// echo "</br>";
// echo "Remarks: " . $pet->remarks();
// echo "</br>";
// echo "Sound: " . $pet->sound();
// echo "</br>";


// // Read
// $pet->read(5);

// echo "</br> Read";
// echo "</br>";
// echo "ID: " . $pet->id();
// echo "</br>";
// echo "Name: " . $pet->name();
// echo "</br>";
// echo "Type: " . $pet->type();
// echo "</br>";
// echo "Breed: " . $pet->breed();
// echo "</br>";
// echo "Remarks: " . $pet->remarks();
// echo "</br>";

// // Update
// $pet->name("Chico");
// $pet->update();
// echo "</br> Update";
// echo "</br>";
// echo "ID: " . $pet->id();
// echo "</br>";
// echo "Name: " . $pet->name();
// echo "</br>";
// echo "Type: " . $pet->type();
// echo "</br>";
// echo "Breed: " . $pet->breed();
// echo "</br>";
// echo "Remarks: " . $pet->remarks();
// echo "</br>";

// // Delete
// $pet->read(64);
// $pet->delete();

// echo "</br> Delete";
// echo "</br>";
// echo "ID: " . $pet->id();
// echo "</br>";
// echo "Name: " . $pet->name();
// echo "</br>";
// echo "Type: " . $pet->type();
// echo "</br>";
// echo "Breed: " . $pet->breed();
// echo "</br>";
// echo "Remarks: " . $pet->remarks();
// echo "</br>";

