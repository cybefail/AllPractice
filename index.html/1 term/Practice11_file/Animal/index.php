<?php
spl_autoload_register(function ($class_name) {
    $filename = $class_name . '.php';
    if (file_exists($filename)) {
        require_once $filename;
    }
});
$json = file_get_contents('animals.json');
$animalsData = json_decode($json, true);
$keeperConfigs = [
    ["name" => "Иван золо", "types" => ['Bird']],
    ["name" => "Рахал Мамут", "types" => ['Milkeater']],
    ["name" => "Владимир Владимирович", "types" => ['NotFlyBird']],
    ["name" => "Андрей Макан", "types" => ['Reptiles']],
    ["name" => "Легит чек", "types" => ['Insects']],
    ["name" => "ZXCМаксим", "types" => ['RareAnimals']],
    ["name" => "Дмитрий Нагиев", "types" => ['Fish']]
];
function createAnimal($data) {
    $type = $data['type'];
    $weight = $data['weight'] ?? 0;
    $height = $data['height'] ?? 0;
    $name = $data['name'] ?? '';
    $speed = $data['speed'] ?? 0;
    if (class_exists($type)) {
        return new $type($weight, $height, $name, $speed);
    }
    return new Animal($weight, $height, $name, $speed);
}
$animals = [];
foreach ($animalsData as $animalData) {
    $animals[] = createAnimal($animalData);
}
$keepers = [];
foreach ($keeperConfigs as $config) {
    $keepers[$config['name']] = [
        'keeper' => new ZooKeeper($config['name']),
        'types' => $config['types']
    ];
}
foreach ($animals as $animal) {
    foreach ($keepers as $keeperName => $keeperData) {
        foreach ($keeperData['types'] as $allowedType) {
            if ($animal instanceof $allowedType) {
                $keepers[$keeperName]['keeper']->addAnimal($animal);
                break 2;
            }
        }
    }
}
echo "<h2>Все животные:</h2>";
foreach ($animals as $animal) {
    $animal->sayHello();
    echo '<br>';
}
echo "<h3>Информация о смотрителях:</h3>";
foreach ($keepers as $keeperName => $keeperData) {
    echo "<strong>{$keeperName}:</strong><br>";
    $keeperData['keeper']->printMyAnimals();
    echo '<br><br>';
}
?>