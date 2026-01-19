<?php
//ГОТОВО
echo '<h2>Задание 1</h2>';
class User {
    public $firstName;
    public $lastName;
    public $email;
    public function __construct($firstName, $lastName, $email) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public function sayAboutMe() {
        echo "Меня зовут $this->firstName $this->lastName", '<br>';
    }
}
$user1 = new User("Иван", "Иванов", "mamut@rahal.com");
$user2 = new User("Илья", "Мазеллов", "mzzl@f.com");
$user1->sayAboutMe(); 
$user2->sayAboutMe(); 

echo '<h2>Задание 2</h2>';
class Car {
    private $brand;
    private $model;
    private $type;
    private $color;
    private $weight;

    public function __construct($brand, $model, $type, $color = "черный", $weight = 2676) {
        $this->brand = $brand;
        $this->model = $model;
        $this->type = $type;
        $this->color = $color;
        $this->weight = $weight;
    }

    public function getInfo() {
        echo "Модель: $this->brand $this->model, Тип: $this->type, Цвет: $this->color", '<br>';
    }

    public function getWeight() {
        return $this->weight;
    }
}
$car = new Car("Toyota", "Camry", "Седан");
$car->getInfo();
echo "Вес: " . $car->getWeight() , " кг", '<br>';

echo '<h2>Задание 3</h2>';
$cars = [
    ['brand' => 'BMW', 'model' => 'X5', 'type' => 'SUV', 'color' => 'белый', 'weight' => 2200],
    ['brand' => 'Audi', 'model' => 'A4', 'type' => 'седан', 'color' => 'черный', 'weight' => 1800],
    ['brand' => 'Mercedes', 'model' => 'C200', 'type' => 'седан', 'color' => 'синий', 'weight' => 1900],
    ['brand' => 'Toyota', 'model' => 'RAV4', 'type' => 'кроссовер', 'color' => 'зеленый', 'weight' => 2100],
    ['brand' => 'Honda', 'model' => 'Civic', 'type' => 'седан']
];
echo "<pre>";
echo "Массив машин:<br>";
print_r($cars);
echo "</pre>";

echo '<h2>Задание 4</h2>';
$objCars = [];
foreach ($cars as $car) {
    $color = $car['color'] ?? 'черный';
    $weight = $car['weight'] ?? 0;
    $objCars[] = new Car($car['brand'], $car['model'], $car['type'], $color, $weight);
}
echo "Созданы объекты класса Car:<br>";
foreach ($objCars as $objCar) {
    echo $objCar->getInfo();
}

echo '<h2>Задание 5</h2>';
echo $objCars[0]->getInfo();
echo $objCars[1]->getInfo();
echo $objCars[2]->getInfo();
echo $objCars[3]->getInfo();
echo $objCars[4]->getInfo();
?>