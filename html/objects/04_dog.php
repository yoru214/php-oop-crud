<?php
class Dog extends Pet {
    // Polymorphism
    protected string $type = "Dog";

    // additional function, polymorphing Dog object from Pet object
    public function sound() {
        return "woof!";
    }

    // additional function, polymorphing Cat object from Pet object
    public function all() {
        // accessing inherited function
        return $this->list("Dog");
    }
}