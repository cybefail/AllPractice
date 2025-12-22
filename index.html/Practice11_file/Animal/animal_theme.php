<?php
//ТЕМА
class Animal
{
    protected $height
    public $height;
    public $weight;
    public function say_contruct($height, $weight, $type){
        echo "Привет" Я $this->$type;
    }
}
public static $humor = false;

$animal = new Animal();
$animal->type = 'Лев'
$animal->height = 50;
$animal->weight = 80;

?>
<?php
<p>Вид: <?= $animal->Type ?></p>
<p>Рост: <?= $animal->height ?></p>
<p>Вес: <?= $animal->weight ?></p>
<p>Я говорю: <?= $animal->say() ?></p>
<p>Я говорю: <?= $animal->sayHello() ?></p>
<?php
$animal = 5; ?>
<p>Конец</p>

$tiger = new Animal(height: 70, weight: 200, type: "Тигр");
$tiger->type;
$tiger->height;
$tiger->weight;

class Bird extends Animal{
    public $wingspan;
    public function __construct($height, $weight, $type,
    $wingspan){
    parent::__construct(height: $height, weight: $weight, type: $type,
    $wingspan){
    $this-> $wingspan = $wingspan;
    }
    public function sayHello(): void{
    echo "Привет! Я $this->type";
    echo 'У меня '. self::$humor . ' юмор!';

    class Mammals extends Animal{
        public function sayHello(){
            parent::sayHello();
            echo ", я млекопитающее.";
        }
    }

    public static function getHumor(): string{
        return self::$humor
    }
    }
}
$animals = [];
$pinguin = new notFlyBird(40, 50, 'Пингвин', 100);
$animals[] = $pinguin;
$sparrow = new Bird(height: 10, weight: 100, type: "Воробей");
$sparrow->sayHello();
$sparrow->wingspan();
$ant = new Animal (height: 3, weight: 10, type: "Муравей");
$ant ->sayHello();
$monkey = new Mammals(50, 40, 'Мартышка');
$monkey ->sayHello();
foreach($animal as $animal){
    $animal ->sayHello();
    echo '<br>';
}
}
?>

