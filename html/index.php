<?php
require_once 'objects/01_mysql.php';
require_once 'objects/02_pet.php';
require_once 'objects/03_cat.php';
require_once 'objects/04_dog.php';

class App {

    private string $page_title = "Yeahmman's Pet Hotel";
    // initalizes the class
    function __construct() {

        $this->route();
    }

    // set the routs based on get variables
    private function route() {
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
        // loads the templates
        require_once("template/layout/header.php");
        require_once("template/" . $template. ".php");
        require_once("template/layout/footer.php");

    }

    // functions that serves as controllers
    private function list() {
        return "";
    }
    // loads the cat list page
    private function cats() {

        $cat = new Cat();
        return $cat->all();

    }
    // loads the dog list page
    private function dogs() {
        $dog = new Dog();
        return $dog->all();

    }
    // loads the view page for either the dog or cat
    private function get() {
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
    // loads the view to add dog or cats
    private function add() {
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
    // loads to page to update dogs or cats
    private function update() {
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
    // loads the page to delete dogs and cats
    private function delete() {
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

// instantiating the App class
$app = new App();
