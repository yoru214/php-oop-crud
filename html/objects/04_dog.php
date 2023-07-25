<?php
class Dog extends Pet {
    // Polymorphism
    protected string $type = "Dog";

    public function sound() {
        return "woof!";
    }
}