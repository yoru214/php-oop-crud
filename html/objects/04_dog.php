<?php
class Dog extends Pet {
    // Polymorphism
    protected string $type = "Dog";

    public function sound() {
        return "woof!";
    }

    public function all() {
        return $this->list("Dog");
    }
}