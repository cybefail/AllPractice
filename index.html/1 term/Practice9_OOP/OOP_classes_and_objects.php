<?php
//пр9 задание 1
echo '<h2>Задание 1</h2>';
class User {
    public $firstName;
    public $lastName;
    public $email;

    public function sayAboutMe() {
        echo "Меня зовут $this->firstName $this->lastName", '<br>';
    }
}
$user1 = new User();
$user1->firstName = "Иван";
$user1->lastName = "Золо";
$user1->email = "ivan@zeolo2004.com";

$user2 = new User();
$user2->firstName = "Илья";
$user2->lastName = "Мазеллов";
$user2->email = "mzzl@f.com";

$user1->sayAboutMe(); 
$user2->sayAboutMe(); 

echo '<h2>Задание 2</h2>';
class Car {
    public $brand;
    public $model;
    public $type;
    public $color;
    public $weight;

    public function getInfo() {
        echo "Модель: $this->brand $this->model, Тип: $this->type, Цвет: $this->color", '<br>';
    }

    public function getWeight() {
        return $this->weight;
    }
}
$car = new Car();
$car->brand = "Toyota";
$car->model = "Camry";
$car->type = "Седан";
$car->color = "Черный";
$car->weight = 1500;

$car->getInfo(); 
echo "Вес: " . $car->getWeight() . " кг", '<br>'; 
?>

<?php
echo '<h2>Задание 3</h2>';
class RareCar {
    public $brand;
    public $model;
    public $type;
    public $color;
    public $weight;
    public $year;
    public $price;

    public function getWeight() {
        return $this->weight;
    }

    public function getPrice() {
        return $this->price;
    }
}

// Создание коллекции
$cars = [
    new RareCar(),
    new RareCar(),
    new RareCar(),
    new RareCar(),
    new RareCar()
];

$cars[0]->brand = "Ferrari"; $cars[0]->model = "F40"; $cars[0]->year = 1987; $cars[0]->price = 1000000;
$cars[1]->brand = "Lamborghini"; $cars[1]->model = "Countach"; $cars[1]->year = 1974; $cars[1]->price = 800000;
$cars[2]->brand = "Porsche"; $cars[2]->model = "911"; $cars[2]->year = 1963; $cars[2]->price = 500000;
$cars[3]->brand = "Bugatti"; $cars[3]->model = "Veyron"; $cars[3]->year = 2005; $cars[3]->price = 1500000;
$cars[4]->brand = "Aston Martin"; $cars[4]->model = "DB5"; $cars[4]->year = 1963; $cars[4]->price = 700000;

$totalPrice = 0;
foreach ($cars as $car) {
    $totalPrice += $car->getPrice();
}

echo "Общая стоимость: $totalPrice\n"; 
?>