<?php
require_once 'objects/01_mysql.php';
require_once 'objects/02_pet.php';
require_once 'objects/03_cat.php';
require_once 'objects/04_dog.php';

class API {

    private string $page_title = "Yeahmman's Pet Hotel";

    function __construct() {

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
            case "cats":
                $data = $this->cats();
                break;
            case "dogs":
                $data = $this->dogs();
                break;
            case "add":
                $data = $this->add();
                break;
            case "edit":
                $data = $this->update();
                break;
            case "delete":
                $data = $this->delete();
                break;
            default:
                $data = $this->list();
                break;
        }  

        require_once("template/layout/header.php");
        require_once("template/" . $template. ".php");
        require_once("template/layout/footer.php");

    }

    function list() {
        return "";
    }

    function cats() {

        $cat = new Cat();
        return $cat->all();

    }

    function dogs() {
        $dog = new Dog();
        return $dog->all();

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
        if(isset($_POST["name"])) {
            if($_GET["type"] == "Cat"){
                $pet = new Cat();
            }
            if($_GET["type"] == "Dog"){
                $pet = new Dog();
            }
            if(isset($pet) && strlen(trim($_POST["name"])) > 0) {
                $pet->name($_POST["name"]);
                $pet->breed($_POST["breed"]);
                $pet->remarks($_POST["remarks"]);
                $pet->create();

                header('Location: /?page=edit&type='.$pet->type().'&id='.$pet->id());
            }
        }
    }

    function update() {
        if($_GET["type"] == "Cat"){
            $pet = new Cat();
        }
        if($_GET["type"] == "Dog"){
            $pet = new Dog();
        }

        $pet->read($_GET["id"]);


        if(isset($_POST["name"])) {
            if(isset($pet) && strlen(trim($_POST["name"])) > 0) {
                $pet->name($_POST["name"]);
                $pet->breed($_POST["breed"]);
                $pet->remarks($_POST["remarks"]);
                $pet->update();
            }
        }

        return $pet;
    }

    function delete() {
        if($_GET["type"] == "Cat"){
            $pet = new Cat();
        }
        if($_GET["type"] == "Dog"){
            $pet = new Dog();
        }

        $pet->read($_GET["id"]);

        if(isset($_POST["delete"])) {
            $location = '/?page='.strtolower($pet->type()).'s';
            $pet->delete();
            header('Location: '.$location);
        }

        

        return $pet;

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

