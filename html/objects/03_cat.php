<?php
class Cat extends Pet {
    // Polymorphism
    protected string $type = "Cat";

    public function sound() {
        return "meow";
    }
}