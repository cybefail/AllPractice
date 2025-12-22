<?php
require_once 'Animal.php';
class Reptiles extends Animal {
    public function sayHello() {
        parent::sayHello();
        echo ", я рептилия.";
    }
}
?>