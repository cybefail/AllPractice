<?php
class Student {
    public $id;
    public $name;
    public $age;
    public $course;
    public $group;

    public function __construct($id, $name, $age, $course, $group) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->course = $course;
        $this->group = $group;
    }
}


student