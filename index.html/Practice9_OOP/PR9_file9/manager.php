<?php
class Manager {
    public $id;
    public $name;
    public $age;
    public $positions;
    public $jobDuties;
    public function __construct($id, $name, $age, $positions, $jobDuties) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->positions = $positions;
        $this->jobDuties = $jobDuties;
    }
}

manager