<?php
class Teacher {
    public $id;
    public $name;
    public $age;
    public $subjects;

    public function __construct($id, $name, $age, $subjects) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->subjects = $subjects;
    }
}
