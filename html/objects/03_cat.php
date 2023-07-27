<?php
class Cat extends Pet {
    // Polymorphism
    protected string $type = "Cat";

    // additional function, polymorphing Cat object from Pet object
    public function sound() {
        return "meow";
    }

    // additional function, polymorphing Cat object from Pet object
    public function all() {
        // accessing inherited function
        return $this->list("Cat");
    }
}